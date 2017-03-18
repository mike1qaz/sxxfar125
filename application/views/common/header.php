<!DOCTYPE html>
<html lang="zh-CN">
  	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<link rel="icon" href="/favicon.ico">
    	<title><?php echo $page_title?></title>
    	<base href = "<?php echo site_url();?>">
    	<link href="/static/css/bootstrap.min.css" rel="stylesheet">
    	
    	<?php if(isset($css_arr)) {?>
    		<?php foreach($css_arr as $css) {?>
    			<link href="/static/css/<?php echo $css;?> " rel="stylesheet">
    		<?php }?>
    	<?php }?>
    	<script src="/static/js/jquery-1.12.0.js"></script>
    	<script src="/static/js/bootstrap.js"></script>
    </head>
    <body id="top" data-spy="scroll">
    <header id="home">
		<!--main-nav-->
		<div id="main-nav">

			<nav class="navbar">
				<div class="container">

					<div class="navbar-header">
						<a href="index.html" class="navbar-brand">首法LOGO</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
							<span class="sr-only">Toggle</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="navbar-collapse collapse" id="ftheme">

						<ul class="nav navbar-nav navbar-right">
							<li><a href="#home">首页</a></li>
							<li><a href="#about">风险体检</a></li>
							<li><a href="#service">知识产权</a></li>
							<li><a href="#portfolio">免费合同</a></li>
							<li><a href="#contact">投融资</a></li>
							<li class="hidden-sm hidden-xs">
	                            <a href="#" id="ss"><i class="fa fa-search" aria-hidden="true"></i></a>
	                        </li>
						</ul>

					</div>

					<div class="search-form">
	                    <form>
	                        <input type="text" id="s" size="40" placeholder="Search..." />
	                    </form>
	                </div>

				</div>
			</nav>
		</div>

	</header>
	

