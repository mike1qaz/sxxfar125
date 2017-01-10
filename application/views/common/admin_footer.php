  		 </div>
      </div>
    </div>
    <script type="text/javascript">
		var current_menu = "<?php echo $left_menu;?>";
		$(".nav-sidebar a").each(function() {
			var obj_parent = $(this).parent();
			if($(this).attr("data-menu") == current_menu && obj_parent.attr("class") == undefined) {
				obj_parent.addClass("active");
			} else {
				obj_parent.removeClass("active");
			}
		});
	</script>
    <?php if(isset($js_arr)) {?>
    	<?php foreach($js_arr as $js) {?>
    		<script src="/static/js/<?php echo $js;?>"></script>
    	<?php }?>
    <?php }?>
    	
  	</body>
</html>

