<?php


add_image_size( "lcdlg-preview", 300, 300, true);


                                                                                                                                                                                             
function lcdlg_color_customizer($wp_customize){                                                                                                                                              

		$wp_customize->add_section( 'couleurs_bandeau', array(
			'title'          => 'LCDLG - Haut de page'
    	 ));                                                                                                                                                         
		$wp_customize->add_section( 'couleurs_player_fixe', array(
			'title'          => 'LCDLG - Lecteur fixe'
    	 ));                                                                                                                                                         
		$wp_customize->add_section( 'couleurs_player_page', array(
			'title'          => 'LCDLG - Lecteurs de page'
    	 ));                                                                                                                                                         
		$wp_customize->add_section( 'premiere_page', array(
			'title'          => 'LCDLG - Première page'
    	 )); 

    	 
		$wp_customize->add_setting('lcdlg-image-premiere-page', array(
        'default'           => get_stylesheet_directory_uri() . '/images/front-page.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
		));
		
		 $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'lcdlg-image-premiere-page', array(
			'label'    => "Image de la première page",
			'section'  => 'premiere_page',
			'settings' => 'lcdlg-image-premiere-page',
		))); 
   
        $wp_customize->add_setting( 'main_bg_color' , array(                                                                                                                                
                'default' => '#ffffff',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'main_bg_color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur d'arrière-plan du centre de la page",                                                                                                                       
                        'section'    => 'colors',                                                                                                                                          
                        'settings'   => 'main_bg_color',                                                                                                                                    
                ) )                                                                                                                                                                          
        );       
        
        $wp_customize->add_setting( 'masthead_color' , array(                                                                                                                                
                'default' => '#676b08',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'masthead_color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond de l'entête",                                                                                                                       
                        'section'    => 'couleurs_bandeau',                                                                                                                                          
                        'settings'   => 'masthead_color',                                                                                                                                    
                ) )                                                                                                                                                                          
        );       
        
        $wp_customize->add_setting( 'menu_bg_color' , array(                                                                                                                                
                'default' => '#2b2d00',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'menu_bg_color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond du menu",                                                                                                                       
                        'section'    => 'couleurs_bandeau',                                                                                                                                          
                        'settings'   => 'menu_bg_color',                                                                                                                                    
                ) )
        );       
        
        $wp_customize->add_setting( 'menu_bg_active_color' , array(                                                                                                                                
                'default' => '#181900',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'menu_bg_active_color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond du menu actif",                                                                                                                       
                        'section'    => 'couleurs_bandeau',                                                                                                                                          
                        'settings'   => 'menu_bg_active_color',                                                                                                                                    
                ) )                                                                                                                                                                          
        );        

		$wp_customize->add_setting( 'menu_bg_survol_color' , array(                                                                                                                                
                'default' => '#202100',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'menu_bg_survol_color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond du menu au survol",                                                                                                                       
                        'section'    => 'couleurs_bandeau',                                                                                                                                          
                        'settings'   => 'menu_bg_survol_color',                                                                                                                                    
                ) )                                                                                                                                                                          
        ); 
        
		$wp_customize->add_setting( 'telecommande-main-bg-color' , array(                                                                                                                                
                'default' => '#505306',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'telecommande-main-bg-color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond principal",                                                                                                                       
                        'section'    => 'couleurs_player_page',                                                                                                                                          
                        'settings'   => 'telecommande-main-bg-color',                                                                                                                                    
                ) )                                                                                                                                                                          
        ); 

		$wp_customize->add_setting( 'telecommande-main-txt-color' , array(                                                                                                                                
                'default' => '#ffffff',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'telecommande-main-txt-color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de texte",                                                                                                                       
                        'section'    => 'couleurs_player_page',                                                                                                                                          
                        'settings'   => 'telecommande-main-txt-color',                                                                                                                                    
                ) )                                                                                                                                                                          
        ); 
        
		$wp_customize->add_setting( 'telecommande-button-bg-color' , array(                                                                                                                                
                'default' => '#676b08',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'telecommande-button-bg-color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond des boutons",                                                                                                                       
                        'section'    => 'couleurs_player_page',                                                                                                                                          
                        'settings'   => 'telecommande-button-bg-color',                                                                                                                                    
                ) )                                                                                                                                                                          
        ); 
        
		$wp_customize->add_setting( 'telecommande-button-bg-active-color' , array(                                                                                                                                
                'default' => '#787c09',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'telecommande-button-bg-active-color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond des boutons actifs",                                                                                                                       
                        'section'    => 'couleurs_player_page',                                                                                                                                          
                        'settings'   => 'telecommande-button-bg-active-color',                                                                                                                                    
                ) )                                                                                                                                                                          
        );
        
        $wp_customize->add_setting( 'bandeaubas-bg-color-sides' , array(                                                                                                                                
                'default' => '#676b08',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'bandeaubas-bg-color-sides',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond des côtés du bandeau bas",                                                                                                                       
                        'section'    => 'couleurs_player_fixe',                                                                                                                                          
                        'settings'   => 'bandeaubas-bg-color-sides',                                                                                                                                    
                ) )                                                                                                                                                                          
        );
        
		$wp_customize->add_setting( 'bandeaubas-bg-color' , array(                                                                                                                                
                'default' => '#2b2d00',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'bandeaubas-bg-color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond du bandeau bas",                                                                                                                       
                        'section'    => 'couleurs_player_fixe',                                                                                                                                          
                        'settings'   => 'bandeaubas-bg-color',                                                                                                                                    
                ) )                                                                                                                                                                          
        );
        
		$wp_customize->add_setting( 'bandeaubas-title-color' , array(                                                                                                                                
                'default' => '#ffffff',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'bandeaubas-title-color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur du titre",                                                                                                                       
                        'section'    => 'couleurs_player_fixe',                                                                                                                                          
                        'settings'   => 'bandeaubas-title-color',                                                                                                                                    
                ) )                                                                                                                                                                          
        );
        
		$wp_customize->add_setting( 'bandeaubas-bar-color-fond' , array(                                                                                                                                
                'default' => '#505306',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'bandeaubas-bar-color-fond',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond de la barre de progression",                                                                                                                       
                        'section'    => 'couleurs_player_fixe',                                                                                                                                          
                        'settings'   => 'bandeaubas-bar-color-fond',                                                                                                                                    
                ) )                                                                                                                                                                          
        );
        
			$wp_customize->add_setting( 'bandeaubas-bar-color-progress' , array(                                                                                                                                
                'default' => '#ffffff',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'bandeaubas-bar-color-progress',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur de fond de la barre de progression",                                                                                                                       
                        'section'    => 'couleurs_player_fixe',                                                                                                                                          
                        'settings'   => 'bandeaubas-bar-color-progress',                                                                                                                                    
                ) )                                                                                                                                                                          
        );
        
		$wp_customize->add_setting( 'bandeaubas-time-color' , array(                                                                                                                                
                'default' => '#ffffff',                                                                                                                                                      
                'sanitize_callback' => 'sanitize_hex_color',                                                                                                                                 
        ));                                                                                                                                                                                  
                                                                                                                                                                                             
        $wp_customize->add_control(                                                                                                                                                          
                new WP_Customize_Color_Control(                                                                                                                                              
                $wp_customize,                                                                                                                                                               
                'bandeaubas-time-color',                                                                                                                                                                
                array(                                                                                                                                                                       
                        'label'      => "Couleur des durées",                                                                                                                       
                        'section'    => 'couleurs_player_fixe',                                                                                                                                          
                        'settings'   => 'bandeaubas-time-color',                                                                                                                                    
                ) )                                                                                                                                                                          
        );
}                                                                                                                                                                                            
add_action('customize_register', 'lcdlg_color_customizer');


function lcdlg_enqueue_styles() {

    $parent_style = 'suits-style'; 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'lcdlg_enqueue_styles' );

function excerpt($limit) {  
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' [...]';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).' [...]';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

function lcdlg_setup() {

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 940, 9999 );
}
add_action( 'after_setup_theme', 'lcdlg_setup', 11);

add_action( 'wp_head', 'wpse33072_wp_head', 1 );
/**
 * Remove feed links from wp_head
 */
function wpse33072_wp_head()
{
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
}

function lcdlg_widgets_init() {
	register_sidebar( array(
		'name'          => 'Barre latérale cachée',
		'id'            => 'sidebar-hidden',
		'description'   => 'Barre latérale cachée, mais qui sert à des trucs',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

		register_sidebar( array(
		'name'          => 'Première page (gauche)',
		'id'            => 'widgets-front-page-one',
		'description'   => 'Contenu dynamique de la partie gauche de la première page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

			register_sidebar( array(
		'name'          => 'Première page (droite)',
		'id'            => 'widgets-front-page-two',
		'description'   => 'Contenu dynamique de la partie droite de la première page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'lcdlg_widgets_init' );

function show_post($path) {
  $post = get_page_by_path($path);
  $content = apply_filters('the_content', $post->post_content);
  if ( has_post_thumbnail( $post->ID ) ) {
        echo "<div class=\"lcdlg-main-image\">". get_the_post_thumbnail( $post->ID, 'large' ) . "</div>";
    }?>
		
  <div class="entry-content">
  <?php echo $content; ?>
  </div>
  
  <?php if (is_user_logged_in()) { ?>
    <footer class="entry-meta">
		<span class="edit-link">
			<a class="post-edit-link" href="<?php echo get_edit_post_link($post->ID); ?>">Modifier le texte principal</a>
		</span>
	</footer>
	<?php }
}


function my_custom_rss_init(){
	add_feed('podcasts', 'my_custom_rss');
}
add_action('init', 'my_custom_rss_init');

/* Filter the type, this hook wil set the correct HTTP header for Content-type. */
function my_custom_rss_content_type( $content_type, $type ) {
	if ( 'podcasts' === $type ) {
		return feed_content_type( 'rss2' );
	}
	return $content_type;
}
add_filter( 'feed_content_type', 'my_custom_rss_content_type', 10, 2 );

/* Show the RSS Feed on domain.com/?feed=podcasts or domain.com/feed/podcasts. */
function my_custom_rss() {
	get_template_part( 'feed', 'podcasts' );
}
//$wp_rewrite->flush_rules( $hard );


// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Accueil';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        //echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        //echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
        } else {
            $img_src = get_stylesheet_directory_uri() . '/images/lecridelagirafe-1400.png';
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>
 
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>
 
<?php
    } else if (is_front_page()) {
    ?>
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="Collectif réuni autour d’une même envie : faire ensemble et partager des créations sonores et radiophoniques."/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>
    <?php 
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);


function lcdlg_js() {
?>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/common.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/player.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/jquery.jplayer.js"></script>
	<?php
}

add_action('wp_head', 'lcdlg_js', 5000);

function lcdlg_jscss_embed() {
?>
    <link rel='stylesheet' id='suits-style-css'  href='http://lecridelagirafe.org/wp-content/themes/suits/style.css?ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='child-style-css'  href='http://lecridelagirafe.org/wp-content/themes/le-cri-de-la-girafe/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='suits-fonts-css'  href='//fonts.googleapis.com/css?family=Lato%3A300%2C400&#038;subset=latin%2Clatin-ext' type='text/css' media='all' />
    
		<script type='text/javascript' src='http://lecridelagirafe.org/wp-includes/js/jquery/jquery.js'></script>
		<script type='text/javascript' src='http://lecridelagirafe.org/wp-includes/js/jquery/jquery-migrate.min.js'></script>
		<script type='text/javascript' src='http://lecridelagirafe.org/wp-includes/js/wp-embed.min.js?ver=4.9.4'></script>
    <script type="text/javascript" src="http://lecridelagirafe.org/wp-content/themes/le-cri-de-la-girafe/common.js"></script>
    <script type="text/javascript" src="http://lecridelagirafe.org/wp-content/themes/le-cri-de-la-girafe/player.js"></script>
		<script type="text/javascript" src="http://lecridelagirafe.org/wp-content/themes/le-cri-de-la-girafe/jquery.jplayer.js"></script>
<?php 
}

add_action('embed_head', 'lcdlg_jscss_embed', 5000);

?>
