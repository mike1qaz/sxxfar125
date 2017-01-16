<div class="page-header"><h4>订单管理</h4></div>
<table class="table table-striped table-bordered" id="orders">
	<thead>
		<tr><th>序号</th><th>订单编号</th><td>下单人</td><th>订单状态</th><th>下单时间</th></tr>
	</thead>
	<tbody>
	</tbody>
</table>
<div class="row mt15">
	<div class="pagination right">
    	<a href="#" class="first" data-action="first">&laquo;</a>
    	<a href="#" class="previous" data-action="previous">&lsaquo;</a>
    	<input id="max_page" type="text" data-max-page="5" />
    	<a href="#" class="next" data-action="next">&rsaquo;</a>
    	<a href="#" class="last" data-action="last">&raquo;</a>
	</div>
	<div class="clearfix"></div>
</div>
<script id="tpl" type="text/x-jquery-tmpl">
<tr>
	<td>${index}</td>
	<td>${order_code}</td>
	<td>${user_id}</td>
	<td>${status}</td>
	<td>${created_time}%</td>
</tr>
</script>