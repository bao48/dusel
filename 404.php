<?php
/*
	Template Name: Full Width
*/
?>


<?php get_header(); ?>

<div class="row">

        <div class="noCarousel">
        <!-- MAIN SIDEBAR -->
        
        <div class="fullPgPosts col-sm-12">
        
            
            <article class="frontPagePosts row-eq-height">
                <header>
                    <h2>PAGE NOT FOUND</h2>
                </header>
                <div class="frontContainer">
                    <div class="frontLeft">
                        <div class="content">
                        
                            <div class="content">
                            	<div class="notFound">404</div>
                                <div class="HnotFound">
                                    <h3>IF YOU'RE LOOKING FOR THE PIE...</h3>
                                    <h4>I already ate all of it.</h4>
                                </div>
                                <h4 class="notFoundHead">Otherwise, you may be able to find what you're looking for via this search bar</h4>
                                <?php get_search_form(); ?>
                                <h4 class="notFoundHead">Or via some of my favorite and most popular posts</h4>
                               
                        </div>                        
                    </div>
                </div>
            </div>


        </article>
        
        <hr />
                    
        
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