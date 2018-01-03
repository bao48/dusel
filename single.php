<?php get_header(); ?>

<div class="row">

    <?php if (!has_post_thumbnail()) : ?>
    
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
    
    <?php endif; ?>
        <div class="noCarousel">
        <!-- MAIN SIDEBAR -->
        <div class="mainSidebar col-sm-4">
        	
            <?php get_sidebar(); ?>
            
        </div>
        
        <div class="posts col-sm-8">
        	
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            
            <?php if (has_post_thumbnail() && $x == 0) : ?>
            
                <figure class="featuredImgFront">
                     <?php the_post_thumbnail(); ?>
                </figure>
        
            <?php endif; ?>
            
            <article class="frontPagePosts row-eq-height">
                <header>
                    <h2 class="title"><?php the_title(); ?></h2>
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
                <div class="frontContainer">
                    <div class="frontLeft">
                        <div class="content">
                        
                            <?php the_content(); ?>
                        
                    </div>
                </div>
            </div>
            
            <?php if (has_tag()) : ?>
            
            	<div class="tagContainer">
                    <div class="tagTitle"><a href="">Tags</a></div>
						<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                </div>           	
			
			<?php endif; ?>



            <?php if (has_category()) : ?>
            
            <div class="categoryContainer">
            	<div class="categoryTitle"><a href="">Filed in</a></div>
				<?php the_category(); ?>
            </div>         	
			
			<?php endif; ?>


        </article>
        
        <hr />
        
        <?php endwhile; else : ?>
		
		<article>
        	<h3>No posts were found</h3>
		</article>
        
        <?php endif; ?>
                    
        <div class="nav-postsFrontBottom">
            <div class="prev">
                <h4><?php previous_post_link('&larr; %link', 'PREVIOUS POST', 'false'); ?></h4>
            </div>
            <div class="next">
                <h4><?php next_post_link('%link &rarr;', 'NEXT POST', 'false'); ?></h4>
            </div>
        </div>

        <div class="commentContainer" id="comments">
			<?php comments_template('', true); ?>
        </div>
            
        <a href="#" class="mobile-navigation"></a>
		<div class="rwd-sidebar"></div> <!--end rwd-top-nav-->
        </div>
        </div>
    </div>
	<hr />        

<?php get_footer(); ?>