<?php
/**
 * zbratheme functions and definitions
 *
 * @package zbratheme
 * @package zbratheme
 */

if ( ! function_exists( 'thebootstrapthemes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thebootstrapthemes_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on thebootstrapthemes, use a find and replace
	 * to change 'thebootstrapthemes' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'thebootstrapthemes', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 571, 373, true );
	add_image_size( 'slider-thumb', 492, 318, array( 'center', 'center') ); // Homepage blog Images
	add_image_size( 'home-thumb', 360, 240, array( 'center', 'center') ); // Homepage blog Images
	add_image_size( 'portfolio-thumb', 860, 620, false ); // Archive Pages
	add_image_size( 'single-thumb', 860, 620, false ); // Single Pages


	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'thebootstrapthemes' ),
		'secondary' => esc_html__( 'Footer Menu', 'thebootstrapthemes' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'thebootstrapthemes_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( "custom-header", 
		array(
		'default-color' => 'ffffff',
		'default-image' => '',
			)  
		);
	add_editor_style() ;
}
endif; // thebootstrapthemes_setup
add_action( 'after_setup_theme', 'thebootstrapthemes_setup' );




/**
 * Enqueue scripts and styles.
 */
function thebootstrapthemes_scripts() {
	wp_enqueue_style( 'thebootstrapthemes-bootstrap', get_template_directory_uri().'/css/bootstrap.min.css' );	
	wp_enqueue_style( 'thebootstrapthemes-fontawesome', get_template_directory_uri().'/css/font-awesome.min.css' );
	wp_enqueue_style( 'thebootstrapthemes-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'thebootstrapthemes-jquery-min', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'thebootstrapthemes-paralax', get_template_directory_uri() . '/js/paralax.js', array(), '1.0.0', true );
	wp_enqueue_script( 'thebootstrapthemes-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'thebootstrapthemes-scripts', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thebootstrapthemes_scripts' );





/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) $content_width = 900;
function thebootstrapthemes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thebootstrapthemes_content_width', 640 );

}
add_action( 'after_setup_theme', 'thebootstrapthemes_content_width', 0 );


function thebootstrapthemes_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'front_page_template', 'thebootstrapthemes_filter_front_page_template' );





/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thebootstrapthemes_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thebootstrapthemes' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'thebootstrapthemes_widgets_init' );





if ( ! function_exists( 'thebootstrapthemes_pagination_bars' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function thebootstrapthemes_pagination_bars() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 1 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 2,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '<span aria-hidden="true">&laquo;</span>', 'thebootstrapthemes' ),
			'next_text' => __( '<span aria-hidden="true">&raquo;</span>', 'thebootstrapthemes' ),
	        'type'      => 'list',
		) );

		if ( $links ) :

		?>
		<ul class="pagination" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'thebootstrapthemes' ); ?></h1>
				<?php echo $links; ?>
		</nav><!-- .navigation -->
		<?php
		endif;
	}
endif;





if ( ! function_exists( 'thebootstrapthemes_post_nav' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function thebootstrapthemes_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'thebootstrapthemes' ); ?></h1>
			<div class="nav-links">
				<?php
					previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'thebootstrapthemes' ) );
					next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'thebootstrapthemes' ) );
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
endif;





if ( ! function_exists( 'thebootstrapthemes_entry_meta' ) ) :
	function thebootstrapthemes_entry_meta() {
		if ( is_sticky() && is_home() && ! is_paged() )
			echo '<span class="featured-post">' . __( 'Sticky', 'thebootstrapthemes' ) . '</span>';

		if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
			thebootstrapthemes_entry_meta();

		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'thebootstrapthemes' ) );
		if ( $categories_list ) {
			echo '<span class="categories-links">' . $categories_list . '</span>';
		}

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'thebootstrapthemes' ) );
		if ( $tag_list ) {
			echo '<span class="tags-links">' . $tag_list . '</span>';
		}

		// Post author
		if ( 'post' == get_post_type() ) {
			printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'thebootstrapthemes' ), get_the_author() ) ),
				get_the_author()
			);
		}
	}
endif;





if ( ! function_exists( 'thebootstrapthemes_posted_on' ) ) :
	function thebootstrapthemes_posted_on( $echo = true ) {
		if ( has_post_format( array( 'chat', 'status' ) ) )
			$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'thebootstrapthemes' );
		else
			$format_prefix = '%2$s';

		$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
			esc_url( get_permalink() ),
			esc_attr( sprintf( __( 'Permalink to %s', 'thebootstrapthemes' ), the_title_attribute( 'echo=0' ) ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
		);

		if ( $echo )
			echo $date;

		return $date;
	}
endif;




if ( ! function_exists( 'thebootstrapthemes_get_link_url' ) ) :
function thebootstrapthemes_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;




if ( ! function_exists( 'thebootstrapthemes_getPostViews' ) ) :
	// function to display number of posts.
	function thebootstrapthemes_getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 View";
	    }
	    return $count.'';
	}
endif;



if ( ! function_exists( 'thebootstrapthemes_setPostViews' ) ) :
// function to count views.
function thebootstrapthemes_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
endif;

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'thebootstrapthemes_posts_column_views');
add_action('manage_posts_custom_column', 'thebootstrapthemes_posts_custom_column_views',5,2);
function thebootstrapthemes_posts_column_views($defaults){
    $defaults['post_views'] = __('', 'thebootstrapthemes');
    return $defaults;
}
function thebootstrapthemes_posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo thebootstrapthemes_getPostViews(get_the_ID());
    }
}




add_filter( 'widget_tag_cloud_args', 'thebootstrapthemes_tag_cloud_args' );
function thebootstrapthemes_tag_cloud_args( $args ) {
	$args['number'] = 10; // Your extra arguments go here
	$args['largest'] = 18;
	$args['smallest'] = 12;
	$args['unit'] = 'px';
	return $args;
}




function thebootstrapthemes_excerpt($limit) {
  	$excerpt = explode(' ', get_the_excerpt(), $limit);
  	if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    	$excerpt = implode(" ",$excerpt).'...';
  	} else {
    	$excerpt = implode(" ",$excerpt);
  	} 
  		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  	return $excerpt;
}

function thebootstrapthemes_content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    } 
	    $content = preg_replace('/\[.+\]/','', $content);
	    $content = apply_filters('the_content', $content); 
	    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}





if ( ! function_exists( 'thebootstrapthemes_share' ) ) :
function thebootstrapthemes_share() {
	global $post;
	echo ' 		
		<li><a href="http://www.facebook.com/share.php?u=';the_permalink(); echo'&t=';the_title(); echo'"><i class="fa fa-facebook"></i></a></li>

		<li><a href="http://twitter.com/home?status=';the_title(); echo' - ';echo home_url()."/?p=".$post->ID; echo'"><i class="fa fa-twitter"></i></a></li>

      	<li><a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=';the_permalink(); echo'&title=';the_title(); echo'"><i class="fa fa-google-plus"></i></a></li>

      	<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=';the_permalink(); echo'&title=';the_title();echo'"><i class="fa fa-linkedin"></i></a></li>

      	<li><a href="http://pinterest.com/pin/create/button/?url=';urlencode(get_permalink($post->ID)); echo'&title=';the_title();echo'"><i class="fa fa-pinterest"></i></a></li>

		

		<li><a href="javascript:window.print();"></a></li>';
}
endif;






function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}



function thebootstrapthemes_allow_skype_protocol( $protocols ){
    $protocols[] = 'skype';
    return $protocols;
}
add_filter( 'kses_allowed_protocols' , 'thebootstrapthemes_allow_skype_protocol' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/class.php';

//require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';