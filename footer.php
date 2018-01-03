
    <footer>
        <!-- LightWidget WIDGET -->
        
        <div class="row">
        	
            <div class="col-sm-4">
            	
            	<?php get_sidebar('left-footer'); ?>
            
            </div>
            
            <div class="col-sm-4">
            	
                <?php get_sidebar('middle-footer'); ?>
                
            </div>   
                     
            <div class="col-sm-4">
            	
                <?php get_sidebar('right-footer'); ?>
            	
            </div>            
            
        </div>
        
                <?php get_sidebar('whole-footer'); ?>
        
    	<div class="footerInner">
            <div class="copyright">
                <h4>&copy; <a href="http://www.sprinklewithsalt.com"><?php bloginfo('name'); ?></a> | <?php echo date('Y'); ?></h4>
            </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>

</body>
</html>