<?php get_header(); ?>

<div class="row">
<?php if(get_option($shortname.'_disable_slideshow','') == "Yes") { /* change to != if want slideshow*/
				
				$slider_arr = array();
				$x = 0;
				$args = array(
					 'post_type' => 'post',
					 'meta_key' => 'ex_show_in_slideshow',
					 'meta_value' => 'Yes',
					 'posts_per_page' => 10
					 );
				query_posts($args);
				while (have_posts()) : the_post();
				
					if (has_post_thumbnail()) {
				if($x == 0) { ?>
          <figure class="featuredImgFront">
          <div class="carousel carouselTop slide">
            
            <div class="carousel-inner">
                        <div class="item active">
					<?php } else { ?>
                        <div class="item">
					<?php } ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(' img-responsive'); ?></a>
						
					</div><!--//slide_box-->
				
				<?php array_push($slider_arr,get_the_ID()); ?>
				<?php $x++; 
                }
                
				 endwhile; ?>

		<?php if(count($slider_arr) != 0) { ?>
				                                    							
                    </div>
                            
                    <a class="carousel-control left" data-slide="prev">
                        <span class = "icon-prev"></span>
                    </a>
                    
                    <a class="carousel-control right" data-slide="next">
                        <span class = "icon-next"></span>
                    </a>
           <ol class = "carousel-indicators">
           
           <?php while($x!=0) : ?>
			   <li></li>
			<?php $x--;
		   	endwhile; ?>
            </ol>
            
        </div>
        </figure>        
        <hr />
                    <?php
					
		} wp_reset_query();  } ?>
    
			
    <div class="noCarousel">
    <!-- MAIN SIDEBAR -->
    <div class="mainSidebar col-sm-4">
    
        <?php get_sidebar(); ?>
        
    </div>
    
    <div class="posts col-sm-8">
    
    	<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        
        		
                <?php get_template_part('content', get_post_format()); ?> <!--loads content.php or content-blah.php-->
                
         <?php endwhile; else : ?>
        
        <h1><?php _e('No posts were found', 'sprinklewithsalt-framework') ?></h1>

        <hr />
        
    	<?php endif; ?>
        
        <div class="nav-postsFrontBottom">
            <div class="prev">
                <h4><?php next_posts_link('&larr; PREVIOUS'); ?></h4>
            </div>
            <div class="next">
                <h4><?php previous_posts_link('NEXT &rarr;'); ?></h4>
            </div>
        </div>
        
    <a href="#" class="mobile-navigation"></a>
    <div class="rwd-sidebar"></div> <!--end rwd-top-nav-->
        
	</div>
    </div>
</div>
<hr />

<?php get_footer(); ?>