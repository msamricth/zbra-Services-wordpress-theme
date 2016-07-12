<?php
/**
 * zbratheme Theme Customizer
 *
 * @package zbratheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */



function thebootstrapthemes_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
  $wp_customize->remove_section( 'colors');
  $wp_customize->remove_section( 'background_image');
}
add_action( 'customize_register', 'thebootstrapthemes_customize_register' );


function thebootstrapthemes_customizer_register( $wp_customize ) 
    {
      // Do stuff with $wp_customize, the WP_Customize_Manager object.

      $wp_customize->add_panel( 'theme_option', array(
        'priority' => 25,
        'title' => __( 'Theme Option', 'thebootstrapthemes' ),
        'description' => __( 'The Bootstrap Theme Options', 'thebootstrapthemes' ),
      ));


      /**********************************************/
      /*************** LOGO SECTION *****************/
      /**********************************************/     

      $wp_customize->add_section('theme_logo',array(
        'priority' => 30,
        'title' => __('Theme Logo','thebootstrapthemes'),
        'description' => 'Upload image of 200px width and 40px height for logo',
        'panel' => 'theme_option',
      ));

     $wp_customize->add_setting('logo_image',array(
      'sanitize_callback' => 'esc_url_raw',
      'default' =>  get_template_directory_uri().'/images/logo.png'
      ));
      

      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'logo_image',array(
        'label' => __('Edit Theme Logo','thebootstrapthemes'),
        'section' => 'theme_logo',
        'settings' => 'logo_image'
        )  
      ));      


      /**********************************************/
      /*************** HEADER TOP BAR SECTION ***************/
      /**********************************************/

      // $wp_customize->add_section('header_section',array(
      //   'priority' => 40,
      //   'title' => __('Topbar Header Section','thebootstrapthemes'),
      //   'description' => 'Configure Your Email and Telephone, and Social Icons',
      //   'panel' => 'theme_option'
      // ));

      /* ------ For Top Email Section ------ */

      // $wp_customize->add_setting(
      //   'top_email',
      //       array(
      //         'sanitize_callback' => 'esc_url_raw',
      //         'default' => 'info@example.com',
      //     )
      // );

      // $wp_customize->add_control(
      //   'top_email',
      //    array(
      //     'label' => 'Top Email Address Url',
      //     'section' => 'header_section',
      //     'settings' => 'top_email',
      //     'type' => 'text',
      //    )
      // );


      /* ------ For Top Phone Section ------ */

      // $wp_customize->add_setting(
      //   'top_phone',
      //     array(
      //       'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
      //       'default' => '(123)-123-1234',
      //     )
      // );

      // $wp_customize->add_control(
      //   'top_phone',
      //     array(
      //     'label' => 'Topbar Phone',
      //     'section' => 'header_section',
      //     'settings' => 'top_phone',
      //     'type' => 'text',
      //    )
      // );


      /* ------ For Top Social Icons Section ------ */

      // $wp_customize->add_setting('header_socialicon_display',array(
      //   'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
      //   'default' => ''
      // ));

      // $wp_customize->add_control(new WP_Customize_Control($wp_customize,'header_socialicon_display',array(
      //   'label' => __('Show social icons','thebootstrapthemes'),
      //   'section' => 'header_section',
      //   'settings' => 'header_socialicon_display',
      //   'type'=> 'checkbox',
      //   ))
      // );
      

      // $wp_customize->add_setting(
      //   'facebook_textbox1',
      //     array(
      //       'sanitize_callback' => 'esc_url_raw',
      //       'default' => '',
      //     )
      // );

      // $wp_customize->add_control(
      //   'facebook_textbox1',
      //     array(
      //       'label' => 'Facebook',
      //       'section' => 'header_section',
      //       'settings' => 'facebook_textbox1',
      //       'type' => 'text',
      //     )
      // );

      // $wp_customize->add_setting(
      //   'twitter_textbox1',
      //     array(
      //       'sanitize_callback' => 'esc_url_raw',
      //       'default' => '',
      //     )
      // );

      // $wp_customize->add_control(
      //   'twitter_textbox1',
      //    array(
      //     'label' => 'Twitter',
      //     'section' => 'header_section',
      //     'settings' => 'twitter_textbox1',
      //     'type' => 'text',
      //    )
      // );

      // $wp_customize->add_setting(
      //   'googleplus_textbox1',
      //     array(
      //       'sanitize_callback' => 'esc_url_raw',
      //       'default' => '',
      //     )
      // );

      // $wp_customize->add_control(
      //   'googleplus_textbox1',
      //     array(
      //     'label' => 'Googleplus',
      //     'section' => 'header_section',
      //     'settings' => 'googleplus_textbox1',
      //     'type' => 'text',
      //    )
      // );

      // $wp_customize->add_setting(
      //   'skype_textbox1',
      //     array(
      //       'sanitize_callback' => 'esc_url_raw',
      //     'default' => 'skype:yourskypeidhere?call',
      //     )
      // );
      
      // $wp_customize->add_control(
      //   'skype_textbox1',
      //     array(
      //       'label' => 'Skype',
      //       'section' => 'header_section',
      //       'settings' => 'skype_textbox1',
      //       'type' => 'text',
      //    )
      // );

      // $wp_customize->add_setting(
      //   'linkedin_textbox1',
      //       array(
      //         'sanitize_callback' => 'esc_url_raw',
      //         'default' => '',
      //     )
      // );

      // $wp_customize->add_control(
      //   'linkedin_textbox1',
      //    array(
      //     'label' => 'Linkedin',
      //     'section' => 'header_section',
      //     'settings' => 'linkedin_textbox1',
      //     'type' => 'text',
      //    )
      // );
      

      /**********************************************/
      /************* MAIN SLIDER SECTION *************/
      /**********************************************/     

      $wp_customize->add_section('main_slider_category',array(
        'priority' => 50,
        'title' => __('Slider Categories','thebootstrapthemes'),
        'description' => 'Select the Slide Category for Homepage.',
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting('slider_category_display',array(
        'sanitize_callback' => 'thebootstrapthemes_sanitize_category',
        'default' => ''
      ));

      $wp_customize->add_control(new thebootstrapthemes_Customize_Dropdown_Taxonomies_Control($wp_customize,'slider_category_display',array(
        'label' => __('Choose category','thebootstrapthemes'),
        'section' => 'main_slider_category',
        'settings' => 'slider_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));


      /**********************************************/
      /*************** WELCOME SECTION ***************/
      /**********************************************/

      $wp_customize->add_section('welcome_text',array(
        'priority' => 60,
        'title' => __('Welcome Section','thebootstrapthemes'),
        'description' => 'Write Some Words for Welcome Section in Homepage',
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'welcome_textbox1',
          array(
            'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
            'default' => 'Welcome to Train Theme',
          )
      );

      $wp_customize->add_control(
        'welcome_textbox1',
          array(
          'label' => 'Welcome Heading',
          'section' => 'welcome_text',
          'settings' => 'welcome_textbox1',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'welcome_textbox2',
          array(
            'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
            'default' => 'FREE RESPONSIVE, MULTIPURPOSE BUSINESS AND CORPORATE THEME PERFECT FOR ANY ONE.',
          )
      );

      $wp_customize->add_control(
        'welcome_textbox2',
          array(
          'label' => 'Welcome Second Heading',
          'section' => 'welcome_text',
          'settings' => 'welcome_textbox2',
          'type' => 'text',
         )
      );


      $wp_customize->add_setting( 
        'textarea_setting' ,
          array(
            'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
            'default' => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore Lorem ipsum dolor sit amet', 
        )); 
   
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'textarea_setting', array( 
        'label' => __( 'Welcome Text Content', 'thebootstrapthemes' ),
        'section' => 'welcome_text',
        'settings' => 'textarea_setting', 
        'type'     => 'textarea', 
        )));    


      $wp_customize->add_section('content' , array(
        'title' => __('Content','thebootstrapthemes'),
      ));


      $wp_customize->add_setting(
        'welcome_button',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => 'http://thebootstrapthemes.com',
          )
      );

      $wp_customize->add_control(
        'welcome_button',
         array(
          'label' => 'Welcome Button Link',
          'section' => 'welcome_text',
          'settings' => 'welcome_button',
          'type' => 'text',
         )
      );      


      /**********************************************/
      /*************** FEATURES SECTION ****************/
      /**********************************************/

      $wp_customize->add_section('features_category',array(
        'priority' => 70,
        'title' => __('Features Categories','thebootstrapthemes'),
        'description' => 'Select the Category for Features Section in Homepage',
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'features_title',
          array(
          'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
          'default' => 'Category Title',
          
          )
       );
      $wp_customize->add_control(
        'features_title',
          array(
          'label' => 'Title',
          'section' => 'features_category',
          'settings' => 'features_title',
           'type' => 'text',
         )
      );

      $wp_customize->add_setting('features_display',array(
        'sanitize_callback' => 'thebootstrapthemes_sanitize_category',
        'default' => ''
      ));

      $wp_customize->add_control(new thebootstrapthemes_Customize_Dropdown_Taxonomies_Control($wp_customize,'features_display',array(
        'label' => __('Choose category','thebootstrapthemes'),
        'section' => 'features_category',
        'settings' => 'features_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));



      /**********************************************/
      /*************** FOOTER SECTION ***************/
      /**********************************************/

       $wp_customize->add_section(
        'copyright_section',
          array(
            'priority' => 80,
            'title' => 'Copyright Info',
            'description' => 'Customize your Footer section.',
            'panel' => 'theme_option'
        )
      );


      /**********************************************/
      /*************** COPYRIGHTS SECTION **************/
      /**********************************************/
       
      $wp_customize->add_setting(
        'copyright_textbox',
          array(
            'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
            'default' => 'Copyright &copy; 2015 The Bootstrap Themes. All Rights Reserved.',
          )
      );

      $wp_customize->add_control(
        'copyright_textbox',
          array(
          'label' => 'Copyright text',
          'section' => 'copyright_section',
          'settings' => 'copyright_textbox',
          'type' => 'text',
         )
      );


      






      /**********************************************/
      /*************** SOCIAL SECTION ***************/
      /**********************************************/

       $wp_customize->add_section(
        'social_section',
          array(
            'priority' => 80,
            'title' => 'Social Info',
            'description' => 'Customize your Social Info',
            'panel' => 'theme_option'
        )
      );


      
      /**********************************************/
      /******* SOCIAL ICON HIDE/ DISPLAY SECTION ********/
      /**********************************************/

      // $wp_customize->add_setting('socialicon_display',array(
      //   'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
      //   'default' => ''
      // ));

      // $wp_customize->add_control(new WP_Customize_Control($wp_customize,'socialicon_display',array(
      //   'label' => __('Show social icons','thebootstrapthemes'),
      //   'section' => 'social_section',
      //   'settings' => 'socialicon_display',
      //   'type'=> 'checkbox',
      //   ))
      // );


      /**********************************************/
      /********** SOCIAL ICON LINKS SECTION ***********/
      /**********************************************/

      $wp_customize->add_setting(
        'facebook_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '',
          )
      );

      $wp_customize->add_control(
        'facebook_textbox',
          array(
            'label' => 'Facebook',
            'section' => 'social_section',
            'settings' => 'facebook_textbox',
            'type' => 'text',
          )
      );

      $wp_customize->add_setting(
        'twitter_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '',
          )
      );

      $wp_customize->add_control(
        'twitter_textbox',
         array(
          'label' => 'Twitter',
          'section' => 'social_section',
          'settings' => 'twitter_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'googleplus_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '',
          )
      );

      $wp_customize->add_control(
        'googleplus_textbox',
          array(
          'label' => 'Googleplus',
          'section' => 'social_section',
          'settings' => 'googleplus_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'linkedin_textbox',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => '',
          )
      );

      $wp_customize->add_control(
        'linkedin_textbox',
         array(
          'label' => 'Linkedin',
          'section' => 'social_section',
          'settings' => 'linkedin_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'pinterest_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
          'default' => '',
          )
      );
      
      $wp_customize->add_control(
        'pinterest_textbox',
          array(
            'label' => 'Pinterest',
            'section' => 'social_section',
            'settings' => 'pinterest_textbox',
            'type' => 'text',
         )
      );




      /* ------ For Email Section ------ */

      $wp_customize->add_setting(
         'top_email',
             array(
               'sanitize_callback' => 'esc_url_raw',
               'default' => 'info@example.com',
           )
       );

      $wp_customize->add_control(
        'top_email',
         array(
          'label' => 'Email Address ',
          'section' => 'social_section',
          'settings' => 'top_email',
          'type' => 'text',
         )
      );

      /* ------ For Email Section ------ */

      $wp_customize->add_setting(
         'top_phone',
             array(
               'sanitize_callback' => 'esc_url_raw',
               'default' => '123-456-7890',
           )
       );

      $wp_customize->add_control(
        'top_phone',
         array(
          'label' => 'Phone',
          'section' => 'social_section',
          'settings' => 'top_phone',
          'type' => 'text',
         )
      );



      /**********************************************/
      /***** ADJUSTMENT OF SIDEBAR POSITION SECTION *****/
      /**********************************************/
     
      // $wp_customize->add_panel( 'layout', array(
      //   'priority' => 35,
      //   'title' => __( 'Theme Sidebar Layout', 'thebootstrapthemes' ),
      //   'description' => __( '', 'thebootstrapthemes' ),
      // ));

      // $wp_customize->add_section('category_sidebar' , array(
      //   'priority' => 10,
      //   'title' => __('Category Sidebar','thebootstrapthemes'),
      //   'panel' => 'layout'
      // ));

      // $wp_customize->add_setting('category_sidebar_position', array(
      //   'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
      //     'default' => 'left'
      //   ));

      // $wp_customize->add_control('category_sidebar_position', array(
      //   'label'      => __('Category Sidebar position', 'thebootstrapthemes'),
      //   'section'    => 'category_sidebar',
      //   'settings'   => 'category_sidebar_position',
      //   'type'       => 'radio',
      //   'choices'    => array(
      //     'both'   => 'both',
      //     'left'   => 'left',
      //     'right'  => 'right',
      //   ),
      // ));


      /**********************************************/
      /********** SINGLE POST SIDEBAR SECTION ***********/
      /**********************************************/    

      // $wp_customize->add_section('single_post_sidebar' , array(
      //   'priority' => 20,
      //   'title' => __('Single Post Sidebar','thebootstrapthemes'),
      //   'panel' => 'layout'
      // ));


      // $wp_customize->add_setting('single_post_sidebar_position', array(
      //   'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
      //     'default' => 'left'
      // ));

      // $wp_customize->add_control('single_post_sidebar_position', array(
      //   'label'      => __('Single Post Sidebar position', 'thebootstrapthemes'),
      //   'section'    => 'single_post_sidebar',
      //   'settings'   => 'single_post_sidebar_position',
      //   'type'       => 'radio',
      //   'choices'    => array(
      //     'both'   => 'both',
      //     'left'   => 'left',
      //     'right'  => 'right',
      //   ),
      // ));


      /**********************************************/
      /********** SINGLE PAGE SIDEBAR SECTION ***********/
      /**********************************************/     

      // $wp_customize->add_section('single_page_sidebar' , array(
      //   'priority' => 30,
      //   'title' => __('Single Page Sidebar','thebootstrapthemes'),
      //   'panel' => 'layout'
      // ));


      // $wp_customize->add_setting('single_page_sidebar_position', array(
      //   'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
      //     'default' => 'left'
      // ));

      // $wp_customize->add_control('single_page_sidebar_position', array(
      //   'label'      => __('Single Page Sidebar position', 'thebootstrapthemes'),
      //   'section'    => 'single_page_sidebar',
      //   'settings'   => 'single_page_sidebar_position',
      //   'type'       => 'radio',
      //   'choices'    => array(
      //     'both'   => 'both',
      //     'left'   => 'left',
      //     'right'  => 'right',
      //   ),
      // ));


      /**********************************************/
      /******** SEARCH PAGE SIDEBAR SECTION *********/
      /**********************************************/     

      // $wp_customize->add_section('search_page_sidebar' , array(
      //   'priority' => 40,
      //   'title' => __('Search Page Sidebar','thebootstrapthemes'),
      //   'panel' => 'layout'
      // ));


      // $wp_customize->add_setting('search_page_sidebar_position', array(
      //   'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
      //     'default' => 'left'
      // ));

      // $wp_customize->add_control('search_page_sidebar_position', array(
      //   'label'      => __('Search Page Sidebar position', 'thebootstrapthemes'),
      //   'section'    => 'search_page_sidebar',
      //   'settings'   => 'search_page_sidebar_position',
      //   'type'       => 'radio',
      //   'choices'    => array(
      //     'both'   => 'both',
      //     'left'   => 'left',
      //     'right'  => 'right',
      //   ),
      // ));



      /**********************************************/
      /******** PAGE NOT FOUND SIDEBAR SECTION *********/
      /**********************************************/     

      // $wp_customize->add_section('page_not_found_sidebar' , array(
      //   'priority' => 50,
      //   'title' => __('Page Not Found Sidebar','thebootstrapthemes'),
      //   'panel' => 'layout'
      // ));


      // $wp_customize->add_setting('page_not_found_sidebar_position', array(
      //   'sanitize_callback' => 'thebootstrapthemes_sanitize_text',
      //     'default' => 'left'
      // ));

      // $wp_customize->add_control('page_not_found_sidebar_position', array(
      //   'label'      => __('Page Not Found Sidebar position', 'thebootstrapthemes'),
      //   'section'    => 'page_not_found_sidebar',
      //   'settings'   => 'page_not_found_sidebar_position',
      //   'type'       => 'radio',
      //   'choices'    => array(
      //     'both'   => 'both',
      //     'left'   => 'left',
      //     'right'  => 'right',
      //   ),
      // ));      

      
    }

add_action( 'customize_register', 'thebootstrapthemes_customizer_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function thebootstrapthemes_customize_preview_js() {
  wp_enqueue_script( 'thebootstrapthemes_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'thebootstrapthemes_customize_preview_js' );

function thebootstrapthemes_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function thebootstrapthemes_sanitize_textarea( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function thebootstrapthemes_sanitize_category($input){
  $output=intval($input);
  return $output;

}