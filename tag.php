<?php get_header(); ?>

    <div class="searchResultBar">
    	<h4>tagged</h4>
        <hr />
    	<h2><?php single_tag_title(); ?></h2>
    </div>

<div class="row">
    
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
                <h4><a href=""><?php previous_posts_link('NEXT &rarr;'); ?></a></h4>
            </div>
        </div>
        
    <a href="#" class="mobile-navigation"></a>
    <div class="rwd-sidebar"></div> <!--end rwd-top-nav-->
        
	</div>
    </div>
</div>
<hr />

<?php get_footer(); ?>


