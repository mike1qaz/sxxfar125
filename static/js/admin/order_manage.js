$(document).ready(function() {
	var getData = function(page) {
		var url = "/admin/order_data";
	    $.ajax({
	    	type: 'POST',
	    	url: url ,
	    	data: {page: page} ,
	    	success: function(data){
	    		if(data.ret == 0) {
	    			$("#max_page").attr("data-max-page", data.data.page_count);
	    			if(page == 1) {
	    				$('.pagination').jqPagination({
	    					paged: function(page) {
	    					// do something with the page variable
	    						getData(page);
	    			    	},
	    			    	page_string:"第{current_page}页，共{max_page}页"
	    				});
	    			}
	    			var h = $("#tpl").tmpl(data.data.list);
	    			//alert(h);
	    			$("#orders tbody").empty().append(h);
	    		}
	    	} ,
	    	dataType: "json"
	    });
	}
	getData(1);
})