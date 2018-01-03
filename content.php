<?php
/********************************************************/
/* Template for standard post */
/********************************************************/
?>
<article <?php post_class('frontPagePosts row-eq-height'); ?> id="post-<?php the_ID(); ?>">
    
    <?php if (has_post_thumbnail()) : ?>
    
        <figure class="featuredImgFront">
             <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </figure>
    
    <?php else :
	
    if (!has_post_thumbnail()) : ?>
    
        <figure class="featuredImgFront">
             <div class="carousel carouselTop slide">
        
        		<div class="carousel-inner">
             <?php
			 
			 	$gallery_atts = array(
					'post_parent' => $post->ID,
					'post_mime_type' => 'image'
				);
				
				$gallery_images = get_children($gallery_atts);
				
				if (!empty($gallery_images)) {
					$gallery_count = count($gallery_images);
					
					for($x=0; $x < $gallery_count; $x++) {
						$first_image = array_shift($gallery_images);
						$display_first_image = wp_get_attachment_image($first_image->ID);
						
						if ($x==0) {
					?>
			
                   
                            
                        <div class="item active">
                            <?php echo $display_first_image; ?>
                        </div>
                        
                        <?php } else { ?>
                        <div class="item">
                            <?php echo  $display_first_image; ?>
                        </div>                        
                        <?php } ?>
                        
                        <?php } ?>
                    
                    </div>
                            
                              <a class="carousel-control left" data-slide="prev">
                                  <span class = "icon-prev"></span>
                              </a>
                              
                              <a class="carousel-control right" data-slide="next">
                                  <span class = "icon-next"></span>
                              </a>
                            
                             <ol class = "carousel-indicators">
							 <?php
							 $x=0;
							 	while ($x < $gallery_count) {
									echo '<li></li>';
									$x++;
								}
							?>
							                           

                            </ol>
                            
                        </div>
                    
                    <?php
				}
				
			 ?>
        </figure>
    
    <?php endif;	
	
	endif; ?>
    
    <header>
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <h4 class="detailsFront">
            <?php the_date(get_option('date_format')); ?>
            
            <?php 
            
                if (comments_open() && !post_password_required()) {
                    echo ' | ';
                    comments_popup_link('0', '1 comment', '% comments', '');
                }
            
            ?>
        
        </h4>
    </header>
   
   <?php if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'secondary-image')) : ?>

    <div class="frontLeft col-sm-8">
    
    	<?php the_excerpt(); 
		?>
		<h3><a href="<?php the_permalink(); ?>">Continue Reading...</a></h3>
	
	
    </div>

        
       <div class="frontRight col-sm-4">

		
		<?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image'); ?>
        
        <?php echo '<h3><a href="">Recipe</a></h3>' ?>
        
        </div>
        
		
        <?php else : ?>
   
       <div class="frontLeft">
    
    	<?php the_excerpt(); 
		?>
		<h3><a href="<?php the_permalink(); ?>">Continue Reading...</a></h3>
	
    </div>     
        
		<?php endif; ?>
</article>
<hr />

