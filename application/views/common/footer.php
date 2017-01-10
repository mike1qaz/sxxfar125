  		
    <script type="text/javascript">
		
	</script>
    <?php if(isset($js_arr)) {?>
    	<?php foreach($js_arr as $js) {?>
    		<script src="/static/js/<?php echo $js;?>"></script>
    	<?php }?>
    <?php }?>  	
  	</body>
</html>

