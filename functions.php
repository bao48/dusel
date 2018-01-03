<?php


/******************************************************/
/* Define Constants */
/******************************************************/
define('THEMEROOT', get_stylesheet_directory_uri()); /* gets path to stylesheet and assigns it to THEMEROOT */
define('IMAGES', THEMEROOT . '/img');

/******************************************************/
/* Menus */
/******************************************************/
function register_my_menus () {
	register_nav_menus(array(
		'menu' => __('Menu', 'sprinklewithsalt-framework')
	));
}

add_action('init', 'register_my_menus');

/******************************************************/
/* Register Sidebars */
/******************************************************/
if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name' => __('Main Sidebar', 'sprinklewithsalt-framework'),
			'id' => 'main-sidebar',
			'description' => __('The main sidebar area', 'sprinklewithsalt-framework'),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div><hr />',
			'before_title' => '<h3 class="title-widget">',
			'after_title' => '</h3>'
	));
	
	register_sidebar(
		array(
			'name' => __('Left Footer', 'sprinklewithsalt-framework'),
			'id' => 'left-footer',
			'description' => __('The left footer area', 'sprinklewithsalt-framework'),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	));
	
	register_sidebar(
		array(
			'name' => __('Right Footer', 'sprinklewithsalt-framework'),
			'id' => 'right-footer',
			'description' => __('The right footer area', 'sprinklewithsalt-framework'),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	));
	
	register_sidebar(
		array(
			'name' => __('Middle Footer', 'sprinklewithsalt-framework'),
			'id' => 'middle-footer',
			'description' => __('The middle footer area', 'sprinklewithsalt-framework'),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	));
	
	register_sidebar(
		array(
			'name' => __('Whole Width Footer', 'sprinklewithsalt-framework'),
			'id' => 'whole-footer',
			'description' => __('The whole width footer area', 'sprinklewithsalt-framework'),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	));

}

/******************************************************/
/* Add Theme Support for Post Thumbnails*/
/******************************************************/
if (function_exists('add_theme_support')) {
	add_theme_support('post-formats', array('quote', 'gallery'));
	add_theme_support('post-thumbnails', array('post', 'page'));
	
	set_post_thumbnail_size(960, 540, true);
}

add_post_type_support( 'page', 'excerpt' ); 


/* Changing excerpt length
function new_excerpt_length($length) {
	return 100;
}
add_filter('excerpt_length', 'new_excerpt_length');*/

// Changing excerpt more
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

if (class_exists('MultiPostThumbnails')) { 
	new MultiPostThumbnails(array( 
		'label' => 'Secondary Image', 
		'id' => 'secondary-image', 
		'post_type' => 'post' 
 	)); 
} 

/******************************************************/
/* Load JS Files */
/******************************************************/
function sprinklewithsalt_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	
	if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>

		<li class="pingback" id="comment-<?php comment_ID(); ?>">
        <article <?php comment_class('commentContent'); ?>>
            
                <header class="commentData">
                    <h4>Pingback</h4> | <h5><?php comment_author_link(); ?></h5>
                </header>
                
            </article>
        	
    
    <?php elseif (get_comment_type() == 'comment') : ?>
    
        <li id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class('commentContent'); ?>>
            
                <header class="commentData">
                    <h4><?php comment_author_link(); ?> on </h4> <h5><?php comment_date(); ?> at <?php comment_time(); ?> says</h5>
                    <figure class="commentImg">
                    	<?php
							$avatar_size = 50;
							if ($comment->comment_parent != 0) {
								$avatar_size = 45;
							}
							
							echo get_avatar($comment, $avatar_size);
						
						?>
                    </figure>
                   
                </header>
                
                <p>                    
				<?php if ($comment->comment_approved =='0') : ?>
                    
                    	<h4 class="awaiting-moderation">Your comment is awaiting moderation.</h4>

                <?php endif;
						comment_text(); ?>
                    
                 </p>
                <h5><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max-depth' => $args['max-depth']))); ?></h5>
            </article>
    
    <?php endif;
}

/******************************************************/
/* Custom Comment Form */
/******************************************************/
function sprinklewithsalt_custom_comment_form() {
	$defaults['comment_notes_before'] = '';
	$defaults['id_form'] = 'commentForm';
	$defaults['class_form'] = 'commentForm';
	$defaults['comment_field'] = '<p><textarea name="comment" id="comment" rows="10"></textarea></p>';
	$defaults['title_reply'] = '<h4>LEAVE A REPLY</h4>';
    $defaults['title_reply_to'] = '<h4>Leave a Reply to %s</h4>';
	
	return $defaults;
}

add_filter('comment_form_defaults', 'sprinklewithsalt_custom_comment_form');

function sprinklewithsalt_custom_comment_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : ' ');
	
	$fields = array(
		'author' => '<p>' .
					'<input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" '. $aria_req .' />'.
					'<label for="author">' . __('Name ', 'sprinklewithsalt-framework') . ' '. ($req ? '{required}' : '') . '</label>'.
					'</p>',
		'email' => '<p>' .
					'<input type="text" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" '. $aria_req .' />'.
					'<label for="email">' . __('Email ', 'sprinklewithsalt-framework') . ' '. ($req ? '{required}' : '') . '</label>'.
					'</p>',
		'url' => '<p>' .
					'<input type="text" id="url" name="url" value=""' . esc_attr($commenter['comment_author_url']) . '" />'.
					'<label for="url">' . __('Website', 'sprinklewithsalt-framework') . '</label>'.
					'</p>'
	);
	return $fields;
}


add_filter('comment_form_default_fields','sprinklewithsalt_custom_comment_fields');




/******************************************************/
/* Load JS Files */
/******************************************************/
function add_theme_scripts() {
	wp_enqueue_script('bootstrap', THEMEROOT . '/js/bootstrap.js', array('jquery'), '1.1', true);
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', false ,'1.1' ,'all');
 	wp_enqueue_style('style', get_stylesheet_uri() );
	wp_enqueue_script('scripts', THEMEROOT . '/js/scripts.js', array('jquery'), '1.1', true);
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

?>