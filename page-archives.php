<?php
/*
	Template Name: Archives Page
*/

?>


<?php get_header(); ?>

<div class="row">


        <div class="noCarousel">
        <!-- MAIN SIDEBAR -->
        <div class="mainSidebar col-sm-4">
        	
            <?php get_sidebar(); ?>
            
        </div>
        
        <div class="posts col-sm-8">
        	            
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
                        
                        <?php wp_get_archives('type=month'); ?>
                                       
                        <ul>
                        	<?php wp_list_categories('title_li='); ?>
                        </ul>         
                    </div>
                </div>
            </div>


        </article>
        
        <hr />
        
		
		<article>
        	<h3>No posts were found</h3>
		</article>                    
        
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