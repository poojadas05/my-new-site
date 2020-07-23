<?php
/**
 * foodie Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package foodie Lite
 */

if ( ! function_exists( 'foodie_blog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function foodie_blog_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on foodie, use a find and replace
	 * to change 'foodie-blog' to the name of your theme in all the template files.
	 */
    load_theme_textdomain( 'foodie-blog', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'foodie-blog-related', 200, 125, true ); //related

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'foodie-blog' ),
   ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
   ) );

  if ( foodie_blog_is_wc_active() ) {
    add_theme_support( 'woocommerce' );
  }

	// Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'foodie_blog_custom_background_args', array(
    'default-color' => '#eee',
    'default-image' => '',
    ) ) );
}
endif;
add_action( 'after_setup_theme', 'foodie_blog_setup' );

function foodie_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'foodie_blog_content_width', 678 );
}
add_action( 'after_setup_theme', 'foodie_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function foodie_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'foodie-blog' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
   ) );

    // First Top Widget 
  register_sidebar( array(
    'name'          => __( 'Top Widget 1', 'foodie-blog' ),
    'description'   => __( 'First Top Widget Column', 'foodie-blog' ),
    'id'            => 'top-widget-first',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );


    // Second Top Widget 
  register_sidebar( array(
    'name'          => __( 'Top Widget 2', 'foodie-blog' ),
    'description'   => __( 'Second Top Widget Column', 'foodie-blog' ),
    'id'            => 'top-widget-second',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );

    // Third Top Widget 
  register_sidebar( array(
    'name'          => __( 'Top Widget 3', 'foodie-blog' ),
    'description'   => __( 'Third Top Widget Column', 'foodie-blog' ),
    'id'            => 'top-widget-third',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );


    // First Footer 
  register_sidebar( array(
    'name'          => __( 'Footer 1', 'foodie-blog' ),
    'description'   => __( 'First footer column', 'foodie-blog' ),
    'id'            => 'footer-first',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );

	// Second Footer 
  register_sidebar( array(
    'name'          => __( 'Footer 2', 'foodie-blog' ),
    'description'   => __( 'Second footer column', 'foodie-blog' ),
    'id'            => 'footer-second',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );

	// Third Footer 
  register_sidebar( array(
    'name'          => __( 'Footer 3', 'foodie-blog' ),
    'description'   => __( 'Third footer column', 'foodie-blog' ),
    'id'            => 'footer-third',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );

  if ( foodie_blog_is_wc_active() ) {
        // Register WooCommerce Shop and Single Product Sidebar
    register_sidebar( array(
      'name' => __('Shop Page Sidebar', 'foodie-blog' ),
      'description'   => __( 'Appears on Shop main page and product archive pages.', 'foodie-blog' ),
      'id' => 'shop-sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title"><span>',
      'after_title' => '</span></h3>',
      ) );
    register_sidebar( array(
      'name' => __('Single Product Sidebar', 'foodie-blog' ),
      'description'   => __( 'Appears on single product pages.', 'foodie-blog' ),
      'id' => 'product-sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title"><span>',
      'after_title' => '</span></h3>',
      ) );
  }
}
add_action( 'widgets_init', 'foodie_blog_widgets_init' );

function foodie_blog_custom_sidebar() {
    // Default sidebar.
  $sidebar = 'sidebar';

    // Woocommerce.
  if ( foodie_blog_is_wc_active() ) {
    if ( is_shop() || is_product_category() ) {
      $sidebar = 'shop-sidebar';
    }
    if ( is_product() ) {
      $sidebar = 'product-sidebar';
    }
  }

  return $sidebar;
}

/**
 * Enqueue scripts and styles.
 */
function foodie_blog_scripts() {
	wp_enqueue_style( 'foodie-blog-style', get_stylesheet_uri() );

	$handle = 'foodie-blog-style';

    // WooCommerce
  if ( foodie_blog_is_wc_active() ) {
    if ( is_woocommerce() || is_cart() || is_checkout() ) {
      wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/css/woocommerce2.css' );
      $handle = 'woocommerce';
    }
  }

  wp_enqueue_script( 'foodie-blog-customscripts', get_template_directory_uri() . '/js/customscripts.js',array('jquery'),'',true); 

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'foodie_blog_scripts' );

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


/**
 * Copyrights
 */
if ( ! function_exists( 'foodie_blog_copyrights_credit' ) ) {
  function foodie_blog_copyrights_credit() { 
    global $foodieblog_options
    ?>
    <!--start copyrights-->
    <div class="copyrights">
      <div class="container">
        <div class="row" id="copyright-note">
          <span>

            <?php
            $foodie_blog_copyright_text = get_theme_mod('foodie_blog_copyright_text', 'Copyright 2017 - Powered By WordPress. ');
            echo $foodie_blog_copyright_text;
            ?>
          </span>
        </div>
      </div>
    </div>
    <!--end copyrights-->
    <?php }
  }

/**
 * Custom Comments template
 */
if ( ! function_exists( 'foodie_blog_comments' ) ) {
	function foodie_blog_comment($comment, $args, $depth) { ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div id="comment-<?php comment_ID(); ?>" style="position:relative;" itemscope itemtype="http://schema.org/UserComments">
    <div class="comment-author vcard">
     <?php echo get_avatar( $comment->comment_author_email, 70 ); ?>
     <div class="comment-metadata">
      <?php printf('<span class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</span>', get_comment_author_link()) ?>
      <span class="comment-meta">
        <?php edit_comment_link(__('(Edit)', 'foodie-blog'),'  ','') ?>
      </span>
    </div>
  </div>
  <?php if ($comment->comment_approved == '0') : ?>
  <em><?php _e('Your comment is awaiting moderation.', 'foodie-blog') ?></em>
  <br />
<?php endif; ?>
<div class="commentmetadata" itemprop="commentText">
 <?php comment_text() ?>
 <time><?php comment_date(get_option( 'date_format' )); ?></time>
 <span class="reply">
  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</span>
</div>
</div>
</li>
<?php }
}

/*
 * Excerpt
 */
function foodie_blog_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/**
 * Shorthand function to check for more tag in post.
 *
 * @return bool|int
 */
function foodie_blog_post_has_moretag() {
  return strpos( get_the_content(), '<!--more-->' );
}

if ( ! function_exists( 'foodie_blog_readmore' ) ) {
    /**
     * Display a "read more" link.
     */
    function foodie_blog_readmore() {
      ?>
      <div class="readMore">
        <a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
          <?php _e( 'Read More', 'foodie-blog' ); ?>
        </a>
      </div>
      <?php 
    }
  }

/**
 * Breadcrumbs
 */
if (!function_exists('foodie_blog_the_breadcrumb')) {
  function foodie_blog_the_breadcrumb() {
    if ( is_front_page() ) {
      return;
    }
    echo '<span typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="';
    echo esc_url( home_url() );
    echo '">'.esc_html(sprintf( __( "Home", 'foodie-blog' )));
    echo '</a></span><span><i class="foodie-icon icon-angle-double-right"></i></span>';
    if (is_single()) {
      $categories = get_the_category();
      if ( $categories ) {
        $level = 0;
        $hierarchy_arr = array();
        foreach ( $categories as $cat ) {
          $anc = get_ancestors( $cat->term_id, 'category' );
          $count_anc = count( $anc );
          if (  0 < $count_anc && $level < $count_anc ) {
            $level = $count_anc;
            $hierarchy_arr = array_reverse( $anc );
            array_push( $hierarchy_arr, $cat->term_id );
          }
        }
        if ( empty( $hierarchy_arr ) ) {
          $category = $categories[0];
          echo '<span typeof="v:Breadcrumb"><a href="'. esc_url( get_category_link( $category->term_id ) ).'" rel="v:url" property="v:title">'.esc_html( $category->name ).'</a></span><span><i class="foodie-icon icon-angle-double-right"></i></span>';
        } else {
          foreach ( $hierarchy_arr as $cat_id ) {
            $category = get_term_by( 'id', $cat_id, 'category' );
            echo '<span typeof="v:Breadcrumb"><a href="'. esc_url( get_category_link( $category->term_id ) ).'" rel="v:url" property="v:title">'.esc_html( $category->name ).'</a></span><span><i class="foodie-icon icon-angle-double-right"></i></span>';
          }
        }
      }
      echo "<span><span>";
      the_title();
      echo "</span></span>";
    } elseif (is_page()) {
      $parent_id  = wp_get_post_parent_id( get_the_ID() );
      if ( $parent_id ) {
        $breadcrumbs = array();
        while ( $parent_id ) {
          $page = get_page( $parent_id );
          $breadcrumbs[] = '<span typeof="v:Breadcrumb"><a href="'.esc_url( get_permalink( $page->ID ) ).'" rel="v:url" property="v:title">'.esc_html( get_the_title($page->ID) ). '</a></span><span><i class="foodie-icon icon-angle-double-right"></i></span>';
          $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse( $breadcrumbs );
        foreach ( $breadcrumbs as $crumb ) { echo $crumb; }
      }
      echo "<span><span>";
      the_title();
      echo "</span></span>";
    } elseif (is_category()) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $this_cat_id = $cat_obj->term_id;
      $hierarchy_arr = get_ancestors( $this_cat_id, 'category' );
      if ( $hierarchy_arr ) {
        $hierarchy_arr = array_reverse( $hierarchy_arr );
        foreach ( $hierarchy_arr as $cat_id ) {
          $category = get_term_by( 'id', $cat_id, 'category' );
          echo '<span typeof="v:Breadcrumb"><a href="'.esc_url( get_category_link( $category->term_id ) ).'" rel="v:url" property="v:title">'.esc_html( $category->name ).'</a></span><span><i class="foodie-icon icon-angle-double-right"></i></span>';
        }
      }
      echo "<span><span>";
      single_cat_title();
      echo "</span></span>";
    } elseif (is_author()) {
      echo "<span><span>";
      if(get_query_var('author_name')) :
        $curauth = get_user_by('slug', get_query_var('author_name'));
      else :
        $curauth = get_userdata(get_query_var('author'));
      endif;
      echo esc_html( $curauth->nickname );
      echo "</span></span>";
    } elseif (is_search()) {
      echo "<span><span>";
      the_search_query();
      echo "</span></span>";
    } elseif (is_tag()) {
      echo "<span><span>";
      single_tag_title();
      echo "</span></span>";
    }
  }
}


/*
 * Google Fonts
 */
function foodie_blog_fonts_url() {
  $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Monda, translate this to 'off'. Do not translate
    * into your own language.
    */
    $monda = _x( 'on', 'Monda font: on or off', 'foodie-blog' );

    if ( 'off' !== $monda ) {
      $font_families = array();

      if ( 'off' !== $monda ) {
        $font_families[] = urldecode('Roboto:300,400,500,700,900');
      }

      $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
            //'subset' => urlencode( 'latin,latin-ext' ),
        );

      $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
  }

  function foodie_blog_scripts_styles() {
    wp_enqueue_style( 'theme-slug-fonts', foodie_blog_fonts_url(), array(), null );
  }
  add_action( 'wp_enqueue_scripts', 'foodie_blog_scripts_styles' );

/**
 * WP Mega Menu Plugin Support
 */
function foodie_blog_megamenu_parent_element( $selector ) {
  return '.primary-navigation .container';
}
add_filter( 'wpmm_container_selector', 'foodie_blog_megamenu_parent_element' );

/**
 * Determines whether the WooCommerce plugin is active or not.
 * @return bool
 */
function foodie_blog_is_wc_active() {
  if ( is_multisite() ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    return is_plugin_active( 'woocommerce/woocommerce.php' );
  } else {
    return in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
  }
}

/**
 * WooCommerce
 */
if ( foodie_blog_is_wc_active() ) {
  if ( !function_exists( 'foodieblog_loop_columns' )) {
        /**
         * Change number or products per row to 3
         *
         * @return int
         */
        function foodieblog_loop_columns() {
            return 3; // 3 products per row
          }
        }
        add_filter( 'loop_shop_columns', 'foodieblog_loop_columns' );

    /**
     * Redefine woocommerce_output_related_products()
     */
    function woocommerce_output_related_products() {
      $args = array(
        'posts_per_page' => 3,
        'columns' => 3,
        );
        woocommerce_related_products($args); // Display 3 products in rows of 1
      }

      global $pagenow;
      if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
        /**
         * Define WooCommerce image sizes.
         */
        function foodie_blog_woocommerce_image_dimensions() {
          $catalog = array(
                'width'     => '210',   // px
                'height'    => '155',   // px
                'crop'      => 1        // true
                );
          $single = array(
                'width'     => '326',   // px
                'height'    => '444',   // px
                'crop'      => 1        // true
                );
          $thumbnail = array(
                'width'     => '74',    // px
                'height'    => '74',   // px
                'crop'      => 0        // false
                );
            // Image sizes
            update_option( 'shop_catalog_image_size', $catalog );       // Product category thumbs
            update_option( 'shop_single_image_size', $single );         // Single product image
            update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
          }
          add_action( 'init', 'foodie_blog_woocommerce_image_dimensions', 1 );
        }


    /**
     * Change the number of product thumbnails to show per row to 4.
     *
     * @return int
     */
    function foodie_blog_woocommerce_thumb_cols() {
     return 4; // .last class applied to every 4th thumbnail
   }
   add_filter( 'woocommerce_product_thumbnails_columns', 'foodie_blog_woocommerce_thumb_cols' );


    /**
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param $fragments
     *
     * @return mixed
     */
    function foodie_blog_header_add_to_cart_fragment( $fragments ) {
      global $woocommerce;
      ob_start(); ?>

      <a class="cart-contents" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'foodie-blog' ); ?>"><?php echo sprintf( _n( '%d item', '%d items', $woocommerce->cart->cart_contents_count, 'foodie-blog' ), $woocommerce->cart->cart_contents_count );?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>

      <?php $fragments['a.cart-contents'] = ob_get_clean();
      return $fragments;
    }
    add_filter( 'add_to_cart_fragments', 'foodie_blog_header_add_to_cart_fragment' );

    /**
     * Optimize WooCommerce Scripts
     * Updated for WooCommerce 2.0+
     * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
     */
    function foodie_blog_manage_woocommerce_styles() {
        //remove generator meta tag
      remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

        //first check that woo exists to prevent fatal errors
      if ( function_exists( 'is_woocommerce' ) ) {
            //dequeue scripts and styles
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
          wp_dequeue_style( 'woocommerce-layout' );
          wp_dequeue_style( 'woocommerce-smallscreen' );
          wp_dequeue_style( 'woocommerce-general' );
                wp_dequeue_style( 'wc-bto-styles' ); //Composites Styles
                wp_dequeue_script( 'wc-add-to-cart' );
                wp_dequeue_script( 'wc-cart-fragments' );
                wp_dequeue_script( 'woocommerce' );
                wp_dequeue_script( 'jquery-blockui' );
                wp_dequeue_script( 'jquery-placeholder' );
              }
            }
          }
          add_action( 'wp_enqueue_scripts', 'foodie_blog_manage_woocommerce_styles', 99 );

    // Remove WooCommerce generator tag.
          remove_action('wp_head', 'wc_generator_tag');
        }

/**
 * Post Layout for Archives
 */
if ( ! function_exists( 'foodie_blog_archive_post' ) ) {
    /**
     * Display a post of specific layout.
     * 
     * @param string $layout
     */
    function foodie_blog_archive_post( $layout = '' ) { 
       ?>
      <article class="post excerpt">
       
       <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-blogs-container-thumbnails">
       <?php } else { ?>
        <div class="post-blogs-container">
       <?php } ?>
     
        <?php if ( empty($foodie_blog_full_posts) ) : ?>


        <?php if ( has_post_thumbnail() ) { ?>
        <div class="featured-thumbnail-container">
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
      <?php the_post_thumbnail( 'full' ); ?>
          </a>
        </div>
        <?php } ?>
        <div class="thumbnail-post-content">
        <h2 class="title">
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>

    <span class="entry-meta">
      <?php echo get_the_date(); ?>
   <?php
        if ( is_sticky() && is_home() && ! is_paged() ) {
          printf( ' / <span class="sticky-text">%s</span>', __( 'Featured', 'foodie-blog' ) );
        } ?>
    </span>
        <div class="post-content">
          <?php echo foodie_blog_excerpt(50); ?>...
        </div>
      <?php else : ?>
      <?php if (foodie_blog_post_has_moretag()) : ?>
      <?php foodie_blog_readmore(); ?>
      </div>
    </div>
    <?php endif; ?>
  <?php endif; ?>

</article>
<?php }
}





/**
 * Justintadlock customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );


/**
 * Compare page CSS
 */

function foodie_blog_comparepage_css($hook) {
  if ( 'appearance_page_foodie-blog-info' != $hook ) {
    return;
  }
  wp_enqueue_style( 'foodie-blog-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'foodie_blog_comparepage_css' );

/**
 * Compare page content
 */

add_action('admin_menu', 'foodie_blog_themepage');
function foodie_blog_themepage(){
  $theme_info = add_theme_page( __('Foodie Blog','foodie-blog'), __('Foodie Blog','foodie-blog'), 'manage_options', 'foodie-blog-info.php', 'foodie_blog_info_page' );
}

function foodie_blog_info_page() {
  $user = wp_get_current_user();
  ?>
  <div class="wrap about-wrap foodie-blog-add-css">
    <div>
      <h1>
        <?php echo __('Welcome to Foodie Blog!','foodie-blog'); ?>
      </h1>

      <div class="feature-section three-col">
        <div class="col">
          <div class="widgets-holder-wrap">
            <h3><?php echo __("Contact Support", "foodie-blog"); ?></h3>
            <p><?php echo __("Getting started with a new theme can be difficult, if you have issues with Foodie Blog then throw us an email.", "foodie-blog"); ?></p>
            <p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/help-contact/', 'foodie-blog'); ?>" class="button button-primary">
              <?php echo __("Contact Support", "foodie-blog"); ?>
            </a></p>
          </div>
        </div>
        <div class="col">
          <div class="widgets-holder-wrap">
            <h3><?php echo __("Review Foodie Blog", "foodie-blog"); ?></h3>
            <p><?php echo __("Nothing motivates us more than feedback, are you are enjoying Foodie Blog? We would love to hear what you think!", "foodie-blog"); ?></p>
            <p><a target="blank" href="<?php echo esc_url('https://wordpress.org/support/theme/foodie-blog/reviews/', 'foodie-blog'); ?>" class="button button-primary">
              <?php echo __("Submit A Review", "foodie-blog"); ?>
            </a></p>
          </div>
        </div>
        <div class="col">
          <div class="widgets-holder-wrap">
            <h3><?php echo __("Premium Edition", "foodie-blog"); ?></h3>
            <p><?php echo __("If you enjoy Foodie Blog and want to take your website to the next step, then check out our premium edition here.", "foodie-blog"); ?></p>
            <p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/foodie-blog/', 'foodie-blog'); ?>" class="button button-primary">
              <?php echo __("Read More", "foodie-blog"); ?>
            </a></p>
          </div>
        </div>
      </div>
    </div>
    <hr>

    <h2><?php echo __("Free Vs Premium","foodie-blog"); ?></h2>
    <div class="foodie-blog-button-container">
      <a target="blank" href="<?php echo esc_url('https://superbthemes.com/foodie-blog/', 'foodie-blog'); ?>" class="button button-primary">
        <?php echo __("Read Full Description", "foodie-blog"); ?>
      </a>
      <a target="blank" href="<?php echo esc_url('https://superbthemes.com/demo/foodie-blog/', 'foodie-blog'); ?>" class="button button-primary">
        <?php echo __("View Theme Demo", "foodie-blog"); ?>
      </a>
    </div>


    <table class="wp-list-table widefat">
      <thead>
        <tr>
          <th><strong><?php echo __("Theme Feature", "foodie-blog"); ?></strong></th>
          <th><strong><?php echo __("Basic Version", "foodie-blog"); ?></strong></th>
          <th><strong><?php echo __("Premium Version", "foodie-blog"); ?></strong></th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo __("Header Background Color  ", "foodie-blog"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Header Logo & Text ", "foodie-blog"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Header Button Text & Link", "foodie-blog"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Header Button Colors", "foodie-blog"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Navigation Text Color", "foodie-blog"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Background Image", "foodie-blog"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide Header Text", "foodie-blog"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Premium Support", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
                <tr>
          <td><?php echo __("Fully SEO Optimized", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Easy Google Fonts", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Pagespeed & SEO Plugin", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Security Plugin", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Only Show Header On Front Page", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Header Height", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Only Show Widgets On Front Page", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Copyright Text", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("2x Header Buttons", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Header Buttons Colors", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Logo/Image Above Title In Header", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Right/Left Sidebar", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide/Show Author Section", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide/Show Related Posts Section  ", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide/Show Breadcrumbs", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide/Show Tags Section", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Right/Next or Numbered Pagination", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Customize Footer Colors", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Customize Page/Post Colors", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr> 
        <tr>
          <td><?php echo __("Customize Blog Post Feed Colors", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Customize All Navigation Colors", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Top Widgets Colors", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr> 
        <tr>
          <td><?php echo __("Customize Sidebar Colors", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
                <tr>
          <td><?php echo __("Importable Demo Content", "foodie-blog"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "foodie-blog"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "foodie-blog"); ?>" /></span></td>
        </tr>
      </tbody>
    </table>
    <div class="foodie-blog-button-container">
      <a target="blank" href="<?php echo esc_url('https://superbthemes.com/foodie-blog/', 'foodie-blog'); ?>" class="button button-primary">
        <?php echo __("GO PREMIUM", "foodie-blog"); ?>
      </a>

    </div>

  </div>
  <?php
}


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Foodie Blog for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/tgm/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/tgm/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'foodie_blog_register_required_plugins' );

function foodie_blog_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

    array(
      'name'      => 'Superb Helper',
      'slug'      => 'superb-helper',
      'required'  => false,
    ),

  );

  /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings.
   */
  $config = array(
    'id'           => 'foodie-blog',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
  );

  tgmpa( $plugins, $config );
}
