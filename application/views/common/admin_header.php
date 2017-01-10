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
    	<link href="/static/css/bootstrap.css" rel="stylesheet">
    	<link href="/static/css/common.css" rel="stylesheet">
    	<?php if(isset($css_arr)) {?>
    		<?php foreach($css_arr as $css) {?>
    			<link href="/static/css/<?php echo $css;?> " rel="stylesheet">
    		<?php }?>
    	<?php }?>
    	<script src="/static/js/jquery-1.12.0.js"></script>
    	<script src="/static/js/bootstrap.js"></script>
    	<script type="text/javascript">
        var NBLF = NBLF || {};
    </script>
    </head>
    <body>
	
