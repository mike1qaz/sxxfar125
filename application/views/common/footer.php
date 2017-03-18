	<!--bottom footer-->
		<div id="bottom-footer" class="hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-left">
							&copy; 首法. All rights reserved
                            
						</div>
					</div>

					<div class="col-md-8">
						<div class="footer-right">
                            <ul class="list-unstyled list-inline pull-right">
                                <li><a href="#home">首页</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#service">Service</a></li>
                                <li><a href="#portfolo">Portfolio</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div>  		
    <?php if(isset($js_arr)) {?>
    	<?php foreach($js_arr as $js) {?>
    		<script src="/static/js/<?php echo $js;?>"></script>
    	<?php }?>
    <?php }?>  	
  	</body>
</html>

