<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">管理后台</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <span style="font-color:#000000;">欢迎你，管理员</span>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/logout">退出</a></li>
            
          </ul>
        </div>
      </div>
 </nav>
 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <span>DashBoard</span>
          <ul class="nav nav-sidebar">
            <li><a href="/admin/"  data-menu="index">后台管理</a></li>
          </ul>
          
          <span>订单管理</span>
          <ul class="nav nav-sidebar">
            <li><a href="/admin/order_manage" data-menu="order_manage">订单管理</a></li>
          </ul>
          <span>免费合同管理</span>
          <ul class="nav nav-sidebar">
            <li><a href="/admin/add_contract" data-menu="add_contract">新建</a></li>
            <li><a href="/admin/list_contract" data-menu="list_contract">管理合同</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">