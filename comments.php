<?php
// Prevent the direct loading of this file
if(!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == 'comments.php') {
	die(__('You cannot access this file directly.', 'sprinklewithsalt-framework'));
}

// Check if post is password protected
if (post_password_required()) : ?>
	<p>
    	<?php _e('This post is password protected. Enter the password to view the comments.', 'sprinklewithsalt-framework'); ?>
     	<?php return; ?>.
    </p>
    
<?php endif;

if (have_comments()) : ?>
        	<div class = "commentHeader">
            	<h3><?php comments_number('No comments... ', 'One comment... ', '% comments... '); ?></h3><h4>read or <a href="">add your own</a></h4>
            </div>
            <ol class="commentList">
            	<?php wp_list_comments('callback=sprinklewithsalt_comments'); ?>
            </ol>

<?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
	<p><?php _e('Comments are closed.', 'sprinklewithsalt-framework'); ?></p>
<?php endif;

// Display comment form
?>
<div id="respond" class="commentRespond">

	<?php comment_form();?>
    
</div>