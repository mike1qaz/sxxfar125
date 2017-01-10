/**
 * 分页组件
 * @author  terrydai
 * @date  2013/4/17
 * @return {[type]}            [description]
 */
(function( X , template , $ , window ,undefined){

	//config默认参数
	var defaults = {

		container: '',//目标节点

		url: '',
		type: 'POST',
		params: {},
		autoLoad: true,//自动加载
		plugins: [],

		//根据数据
		total: 0,
		dataSize: 0,

		//分页配置
		start: 0,
		pageSize: 10,
		pageSizeList: [10, 25, 50, 100, 300], //提供其他分页选项

		beforeLoad: function(){},//数据加载前
		onLoad: function(data){}//数据加载后
	};

	var initTempates = ['<table class="pagination">',
		'<tr>',
			'<td class="pagination-init">',
				'<a class="pagination-refresh pagination-btn pagination-active">刷新数据</a>',
			'</td>',
		'</tr>',
	'</table>'].join('');
	
	var templates =  ['<table class="pagination">',
		'<tr>',
			'<td>',
			'<select class="pagination-select">',
				'<% for(var i=0; i< pageSizeList.length; i++){%>',
				'<option value="<%=pageSizeList[i]%>"  <%=pageSizeList[i]==params.limit&&"selected=\\"selected\\""%>><%=pageSizeList[i]%></option>',
				'<% }%>',
			'</select>',
			'<span class="x-sep"></span>',
			'<a class="pagi-first pagination-btn <%=pageNumber>1?"pagination-active":"pagination-disable"%>" data-number="1">|&lt;</a>',
			'<a class="pagi-prev pagination-btn <%=pageNumber>1?"pagination-active":"pagination-disable"%>" data-inc="-1">&lt;</a>',
			'<span class="pagination-m1 ">第<%=pageNumber%>页，共<%=totalPageNumber%>页</span>',
			'<a class="pagi-next pagination-btn <%=pageNumber<totalPageNumber?"pagination-active":"pagination-disable"%>" data-inc="1">&gt;</a>',
			'<a class="pagi-last pagination-btn <%=pageNumber<totalPageNumber?"pagination-active":"pagination-disable"%>" data-number="<%=totalPageNumber%>">&gt;|</a>',

			'<span class="x-sep"></span>',
			'<a class="pagi-refresh pagination-btn pagination-active">刷新</a>',
			//'<a class="pagination-settings pagination-btn pagination-active">设置</a>',
			'</td>',
			'<td style="text-align: right; ">',
			'<%if(total){%>',
				'<span class="pagination-m2">显示第<%=params.start+1%>到<%=end%>条，共<%=total%>条记录</span>',
			'<%}else{%>',
				'没有记录',
			'<%}%>',
			'</td>',
		'</tr>',
	'</table>'].join('');

	var pagination = function( opts){
		return new pagination.prototype.init( opts);
	};

	pagination.prototype = {
		constructor: pagination,

		//初始化函数
		init: function( opts){
			var that = this, 
				//深复制
				options = $.extend({} , defaults , opts),
				container = options.container;

			//引用
			options.params = opts.params || {};

			//写入分页参数
			if(!options.params.limit){
				options.params.limit = options.pageSize;
				options.params.start = options.start;
			}

			//保存到this
			that.options = options;

			//初始化
			container.html( initTempates);

			//增加alias
			that.reload = that.load;

			//自动下载
			if(that.options.autoLoad){
				that.load();

			//让用户自己触发下载
			}else {
				$('.pagination-refresh', container).click(function(){
					that.load();
				});
			}
		},

		//reload: load, //后绑定

		//ajax加载
		load: function(){
			var that = this,
				options = that.options;
			//如果存在活动的ajax对象则终止
			that.ajax && that.ajax.status !== 200 && that.ajax.abort();
			
			//加载数据
			that.ajax = X.ajax({
				type: options.type,
				url: options.url,
				data: options.params,
				beforeSend: function(){
					options.beforeLoad && options.beforeLoad.call(that);	
				},
				retOk: function( msg , ret){
					//调用回调
					options.onLoad && options.onLoad.call(that , ret);
					//刷新分页
					that.render({
						total: ret.count,
						dataSize: ret.list.length
					});
				}
			});
		},

		//根据配置文件刷新分页
		render: function(opts){
			var that = this,
				options = that.options,
				container = options.container;

 			if( opts ){
 				// 合并
				for ( i in opts) {
					options[i] = opts[i];
				};
 			}

 			//handler data
 			options.pageNumber = Math.ceil( (options.params.start +1)/options.params.limit);
			options.totalPageNumber = Math.ceil( options.total / options.params.limit);
            options.totalPageNumber = options.totalPageNumber == 0 ? 1 : options.totalPageNumber;
			options.end =  options.params.start +  options.dataSize;

			var render = template.version >= '2.0' ? template.compile(templates) : template(templates);
			
			$(container).html(render(options));
			
			that._bindEvents();
		},

		//绑定事件
		_bindEvents: function(){
			var that = this,
				options = that.options,
				container = options.container;

			//绑定事件
 			$('.pagi-first,.pagi-prev,.pagi-next,.pagi-last,.pagi-refresh' , container)
 			.bind('click', function(){
 				var anchor = $(this) , 
 					number = anchor.attr('data-number'),
 					inc = anchor.attr('data-inc');

 				if( anchor.hasClass('pagination-disable')){
 					return;
 				}

 				if( number !== undefined){
 					options.params.start = (parseInt( number) -1) * options.params.limit;
 				}
 				if( inc !== undefined){
 					options.params.start += options.params.limit * parseInt(inc);
 				}
 				that.load();
			});

 			$('.pagination-select' , container)
			.bind('change' ,function(){
				var select = $(this),
					size = parseInt(select.val());
				
				options.params.limit = size;
				options.params.start = 0;
				that.load();
			});
			return this;
		}
	};

	pagination.prototype.init.prototype = pagination.prototype;

	X.pagination = pagination;
})( NBLF, template , $ , window , undefined);