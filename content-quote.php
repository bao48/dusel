<?php
/********************************************************/
/* Template for quote post */
/********************************************************/
?>
<article <?php post_class('frontPagePosts row-eq-height'); ?> id="post-<?php the_ID(); ?>">
    
        <figure class="featuredImgFront">
             <a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
        </figure>
    
    
    <header>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
</article>
<hr />

