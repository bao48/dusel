<?php
/*
	Template Name: Full Width
*/
?>


<?php get_header(); ?>

<div class="row">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    
    	
        
	<?php endwhile; ?>
    <?php endif; ?>


        <div class="noCarousel">
        <!-- MAIN SIDEBAR -->
        
        <div class="fullPgPosts col-sm-12">
        	
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            
            <?php if (has_post_thumbnail()) : ?>
            
                <figure class="featuredImgFront">
                     <?php the_post_thumbnail(); ?>
                </figure>
        
            <?php endif; ?>
            
            <article class="frontPagePosts row-eq-height">
                <header>
                    <h2><?php the_title(); ?></h2>
                    <h4 class="detailsFront">
                        
                        <?php 
                        
                            if (comments_open() && !post_password_required()) {
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


        </article>
        
        <hr />
        
        <?php endwhile; else : ?>
		
		<article>
        	<h3>No posts were found</h3>
		</article>
        
        <?php endif; ?>
                    
        
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