<?php
/**
 * Additional shortcodes for the theme.
 * 
 * To create new shortcode, get for example the shortcode [sample] already written.
 * Replace it with your code for shortcode and for other shortcodes, duplicate the first
 * and continue following.
 * 
 * CONVENTIONS: 
 * - The name of function MUST be: yiw_sc_SHORTCODENAME_func.
 * - All html output of shortcode, must be passed by an hook: apply_filters( 'yiw_sc_SHORTCODENAME_html', $html ).
 * NB: SHORTCODENAME is the name of shortcode and must be written in lowercase.    
 * 
 * For example, we'll add new shortcode [sample], so:
 * - the function must be: yiw_sc_sample_func().
 * - the hooks to use will be: apply_filters( 'yiw_sc_sample_html', $html ).   
 * 
 * @package WordPress
 * @subpackage YIW Themes
 * @since 1.0 
 */    
 
 
/** 
 * testimonials   
 * 
 * @description
 *    Show all post on testimonials post types    
 * 
 * @example
 *   [testimonials items=""]
 *   
 * @params
 *      items - number of item to show   
 * 
**/

function yiw_sc_testimonials_func($atts, $content = null) {        
    extract(shortcode_atts(array(
        "items" => null
    ), $atts));    

    wp_reset_query();    

    $args = array(
        'post_type' => 'bl_testimonials'  
    );

    $args['posts_per_page'] = ( !is_null( $items ) ) ? $items : -1;

    $tests = new WP_Query( $args );   

    $html = '';

    if( !$tests->have_posts() ) return $html;

    //loop         
    $html = '';
    while( $tests->have_posts() ) : $tests->the_post();

        $title = the_title( '<span class="title special-font">', '</span>', false );
        $website = get_post_meta( get_the_ID(), '_testimonial_website', true ); 
        $label = get_post_meta( get_the_ID(), '_testimonial_label', true ) ? get_post_meta( get_the_ID(), '_testimonial_label', true ) : str_replace('http://', '', $website); 
        if ( ! empty( $website ) )
            $website = "<a href=\"" . esc_url( $website ) . "\">". $label  ."</a>"; 
        else
            $website = $label;    
        
        $thumb = get_the_post_thumbnail( null, 'testimonial-page-thumb' );
        $class_thumb = ( has_post_thumbnail() && ! empty( $thumb ) ) ? '' : ' no-thumb';  

        $html .= '<div class="testimonials-list' . $class_thumb . ' group">'; 

        $html .= '  <div class="thumb-testimonial group">';    
        $html .= '      <div class="sphere">' . $thumb . '</div>';   
        //$html .= '      <div class="shadow-thumb"></div>'; 
        $html .= '      <p class="name-testimonial group">' . $title . '<span class="website">' . $website . '</span></p>'; 
        $html .= '  </div>'; 

        $content = wpautop( get_the_content() );

        $html .= '  <div class="the-post group">';    
        $html .= '      ' . $content; 
        $html .= '  </div>';               

        $html .= '</div>';

    endwhile;          

    return apply_filters( 'yiw_sc_testimonials_html', $html );
}       
add_shortcode("testimonials", "yiw_sc_testimonials_func");       
 
           

/**
 * Testimonials slider
 * -------------------------------------------------------------------- */

function yiw_sc_testimonials_slider_func($atts, $content = null) {        
    extract(shortcode_atts(array(
        "items" => -1,
        'timeout' => 8000,
        'speed' => 500
    ), $atts));
    
    //wp_reset_query();
    
    $args = array(
        'post_type' => 'bl_testimonials',
        'posts_per_page' => $items
    );
    
    $tests = new WP_Query( $args );   
    
    $first = true;
    $html = $thumbs = '';
    
    //loop           
   	$html = '<div class="cites group">';
   	$thumbs = '<ul class="testimonials group">';
    
    while( $tests->have_posts() ) : $tests->the_post();
        
        $html .= '<div class="text">' . wpautop( get_the_content() ) . '</div>';
        
        $class_li = ( $first ) ? ' class="active"' : '';
    
       	$title = the_title( '<h4>', '</h4>', false );
        $website = get_post_meta( get_the_ID(), '_testimonial_website', true ); 
        $website = "<a href=\"" . esc_url( $website ) . "\" class=\"website\">$website</a>";  
        
    	$thumbs.='
    		<li'.$class_li.'>
    				<div class="sphere">'.get_the_post_thumbnail( null, 'testimonial-thumb' ).'</div>
    	            <div class="shadow-thumb"></div>
    				'.$title.$website.'
    		</li>';
    	
    	$first = false;
    
    endwhile;          
        
    $thumbs.="</ul>";
    $html.="</div>";
    
    $script = '                                                              
        <script type="text/javascript">
            
            jQuery(document).ready(function($){
                $(".cites").cycle({
                    fx: "scrollRight",
                    width: "100%",
                    slideResize: true,
                    fit: 1,
                    timeout: '.$timeout.',
                    speed: '.$speed.',
                    containerResize: false,
                    animOut: {
                        opacity:0
                    },
                    animIn: {
                        opacity:1
                    },
                    before: function(currSlideElement, nextSlideElement, options, forwardFlag) {
                        var i = $(nextSlideElement).index();
                        $("ul.testimonials li").removeClass("active");
                        $("ul.testimonials li:eq("+i+")").addClass("active");
                        if ( typeof Cufon != "undefined" )
                            Cufon.refresh();
                    }
                });
                
                $("ul.testimonials li").click(function(){
                    var i = $(this).index();
                    $(".cites").cycle(i);       
                    $("ul.testimonials li").removeClass("active");
                    $("ul.testimonials li:eq("+i+")").addClass("active");
                    if ( typeof Cufon != "undefined" )
                        Cufon.refresh();
                });
            });
            
        </script>
    ';
    
    wp_reset_query();
    
    return apply_filters( 'yiw_sc_testimonials_slider_html', $html.do_shortcode('[border]').$thumbs.$script );
}   
add_shortcode( 'testimonials_slider', 'yiw_sc_testimonials_slider_func' );


function yiw_sc_last_news_func($atts, $content = null) {  
    extract(shortcode_atts(array(
        "items" => 2,
        'show_date' => 'yes',
        'show_author' => 'yes',
        'show_content' => 'yes',
        'show_thumb' => 'yes',
        'excerpt' => 15,
        'popular' => false,
        'offset' => 0
    ), $atts));    
    
    $args = array( 'post_type' => 'post', 'posts_per_page' => $items, 'offset' => 0 );
    if( $popular ) $args['orderby'] = 'comment_count';
    $posts_news = new WP_Query( $args );
             
    ob_start();   
    
    $i = 0;
    
    echo '<div class="last-news group">';  
    
        while( $posts_news->have_posts() ) : $posts_news->the_post();
    ?>
    
    <div class="box-post group<?php if ( $show_thumb == 'yes' ) echo ' thumbnail' ?>">
        <?php 
            if ( $show_thumb == 'yes' ) {
                $img = '';
                if( has_post_thumbnail() )
                {
                    $img = get_the_post_thumbnail( get_the_ID(), 'recent-posts-thumb' );
                }
                else
                {
                    $img = '<img src="' . get_template_directory_uri() . '/images/no_image_recentposts.jpg" width="86" height="86" alt="No Image" />';
                } 
                
                echo "<div class=\"box-post-thumb\">$img</div>";
            }
            
            $lenght = create_function( '', "return $excerpt;" );
            add_filter('excerpt_length', $lenght );
        ?>                                                                         
        <div class="box-post-body group">
            <div class="news_title"><a class="title" href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></div>
            <?php if( $show_content    == 'yes' ) : ?><div class="news_excerpt"><?php the_excerpt(); ?></div><?php endif ?> 
            <p class="meta">
                <?php if( $show_date   == 'yes' ) : ?><span class="date"><?php echo get_the_date() ?></span><?php endif ?>
                <?php if( $show_author == 'yes' ) : ?><span class="author"><?php _e( 'by', 'yiw' ) ?> <?php the_author() ?></span><?php endif ?>
            </p>
        </div>
    </div>
     
    <?php endwhile; ?>        
    
    </div>     
    
    <?php   
    remove_filter('excerpt_length', $lenght );
    
    $html = ob_get_clean();
    
    return apply_filters( 'yiw_sc_last_news_html', $html );
}
add_shortcode( 'last_news', 'yiw_sc_last_news_func' );

function yiw_sc_works_func($atts, $content = null) {  
    extract(shortcode_atts(array(
        "post_type" => 'portfolio',
        'cat' => '',
        "items" => -1
    ), $atts));    
    
    if ( isset( $atts['post_types'] ) )
        $post_type = $atts['post_types']; 
    
    $args = array( 'post_type' => $post_type, 'posts_per_page' => $items ); 
    
    if ( $post_type == 'bl_gallery' ) {
        $tax = 'category-photo';
    } else if ( function_exists( 'yiw_portfolio' ) ) {
        $portfolio = yiw_portfolio($post_type);
        $tax = sanitize_title( $portfolio['tax'] );
    } else {
        $tax = 'category-project';
    }
    
    if ( ! empty( $cat ) ) {
        $cat = array_map( 'trim', explode( ',', $cat ) );
        if ( count($cat) == 1 ) $cat = $cat[0];
        $args['tax_query'] = array(
            array(
                'taxonomy' => $tax,
                'field' => 'slug',
                'terms' => $cat
            )
        );
    }
    
    $posts = new WP_Query( $args );
    
    if ( ! $posts->have_posts() )
        return;
        
    $no_slider = false;
    if ( $posts->post_count <= 1 )
        $no_slider = true;
             
    ob_start();  
    
    echo '<div class="works-slider flexslider';
    if ( $no_slider ) echo ' no-slider';
    echo '"><ul class="slides">';  
    
        while( $posts->have_posts() ) : $posts->the_post();    
        
        $post_thumbnail_id = get_post_thumbnail_id();
        $url_image = wp_get_attachment_image_src( $post_thumbnail_id, 'works-slider-widgets'  );
    ?>
    
        <li class="box-work">
            <a href="<?php the_permalink() ?>"><?php 
                $img = '';
                if( has_post_thumbnail() )
                    $img = '<img src="' . $url_image[0] . '" alt="" />';
                else
                    $img = '<img src="' . get_template_directory_uri() . '/images/no-image-425x170.png" alt="No Image" />';
                
                echo "<div class=\"box-work-thumb\">$img</div>";
            ?></a>
            <div class="box-work-body">
                <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                <?php the_terms( get_the_ID(), $tax, '<p class="categories">', ', ', '</p>' ) ?>    
            </div>
        </li>
     
    <?php endwhile; ?>        
    
        </ul>
    </div>       
        
    <!--<div class="works-slider-sc widgets-controls">
        <a href="#" class="prev"><?php _e( 'Prev', 'yiw' ) ?></a>
        <a href="#" class="next"><?php _e( 'Next', 'yiw' ) ?></a>
    </div>-->
    
    <?php if ( ! $no_slider ) : ?>
    <script type="text/javascript">
        jQuery(document).ready(function($){     
            $('.works-slider').flexslider({
                animation: "slide",
                directionNav: true,             
                controlNav: false,             
                keyboardNav: false
            });
//             $('.works-slider').cycle({
//                 fx: 'scrollHorz',
//                 next: '.works-slider-sc .next',
//                 prev: '.works-slider-sc .prev'
//             });
        });
    </script>
    <?php endif; ?>
    
    <?php   
    
    $html = ob_get_clean();
    wp_reset_query();
    
    return apply_filters( 'yiw_sc_works_html', $html );
}
add_shortcode( 'works', 'yiw_sc_works_func' );

function yiw_sc_sidebar_func($atts, $content = null) {  
    extract(shortcode_atts(array(
        "name" => '',
        'class' => ''
    ), $atts));    
    
    ob_start();  
    
    $classes = array( 'post-sidebar' );
    
    if ( ! empty( $class ) )
        $classes[] = $class;
    
    $class = ' class="' . implode( ' ', $classes ) . '"';
    
    echo '<div' . $class . '>';
    dynamic_sidebar($name);           
    echo '</div>';
    
    $html = ob_get_clean();
    
    return apply_filters( 'yiw_sc_sidebar_html', $html );
}
add_shortcode( 'sidebar', 'yiw_sc_sidebar_func' );

function yiw_sc_page_func($atts, $content = null) {  
    extract(shortcode_atts(array(
        "id" => '',
        'title' => ''
    ), $atts));    
    
    if ( empty( $id ) && empty( $title ) )
        return;
    
    if ( empty( $id ) && ! empty( $title ) ) {
        $page = get_page_by_title( $title );
        $id = $page->ID;
    }
    
    if ( empty( $content ) )
        $content = get_the_title( $id );
    
    ob_start(); ?> 
    
    <a href="<?php echo get_permalink( $id ) ?>"><?php echo $content ?></a>
    
    <?php $html = ob_get_clean();
    
    return apply_filters( 'yiw_sc_page_html', $html );
}
add_shortcode( 'page', 'yiw_sc_page_func' );


function yiw_sc_recentpost_func($atts, $content = null) 
{
    extract(shortcode_atts(array(
        'cat_name'   => null,
        'more_text'  => null,
        'items' => 3,
        'popular' => false,
        'show_thumb' => 'yes',
        'excerpt' => 10,
        'date' => 'true'
    ), $atts));
    
    global $icons_name;
    
    $args = array(
       'posts_per_page' => $items,
       'orderby' => 'date'
    );                            
    
    //if(!is_null($cat_name)) $args['category_name'] = $cat_name;
    if( $popular ) $args['orderby'] = 'comment_count';
    
    $args['order'] = 'DESC'; 
    
    $myposts = new WP_Query( $args );    
                    
    $html = "\n";       
    $html .= '<div class="last-news group">'."\n";
    
    add_filter('excerpt_length', create_function('$a',"return $excerpt;") );
    
    $i = 0;
    
    if( $myposts->have_posts() ) : while( $myposts->have_posts() && $i < $items ) : $myposts->the_post();  
         
        $img = '';
        if(has_post_thumbnail())
        {
            $img = get_the_post_thumbnail( get_the_ID(), 'recent-posts-thumb' );
        }
        else
        {
            $img = '<img src="'.get_template_directory_uri().'/images/no_image_recentposts.jpg" alt="No Image" />'; 
        }        
        
        $class = '';
        if ( $show_thumb == 'yes' )           
            $class = ' thumbnail';
              
        $html .= '<div class="box-post group'.$class.'">'."\n";
        if ( $show_thumb == 'yes' )                         
            $html .= "    <div class=\"box-post-thumb\">$img</div>\n"; 
            
        $html .= "    <div class=\"box-post-body group\">\n";
            $html .= the_title( '<div class="news_title"><a href="'.get_permalink().'" title="'.get_the_title().'" class="title">', '</a></div>', false );
            $html .= ( $date == "true" ) ? '<p class="meta"><span class="date">' . get_the_date() . '</span></p>' : '<div class="news_excerpt"><p>' . get_the_excerpt() . '</p></div>';
        $html .= '</div>'."\n";  
        
        $html .= '</div>'."\n";          
        
        //$html .= '</div>';
        
        $i++;
    
    endwhile; endif; 
    
    $html .= '</div>';
    
    //$myposts->rewind_posts();
    
    //unset($myposts);   
    
    remove_filter('excerpt_length', create_function('$a',"return $excerpt;") );
    
    return apply_filters( 'yiw_sc_recentpost_html', $html );
}     

/** 
 * READ MORE 
 * 
 * @description
 *    Show the general read more button   
 * 
 * @example
 *   [read_more href=""]label[/read_more]
**/
function yiw_sc_read_more_func($atts, $content = null) 
{
    extract(shortcode_atts(array(
        'href' => '#'
    ), $atts));     
	
	$content = do_shortcode( $content );   
    
    $html = "<a class=\"read-more\" href=\"$href\">$content</a>";          
    
    return apply_filters( 'yiw_sc_read_more_html', $html );
}           
add_shortcode('read_more', 'yiw_sc_read_more_func');

/**
 * TINYMCE
 **/
 
function yiw_add_tinymce_shortcodes( $sc ) {
    $sc['last_news'] = array(
        'name' => __( 'Last News', 'yiw' ), 
        'content' => false,  
        'parameters' => array(      // la lista dei parametri da poter utilizzare nello shortcode
            array(
                'name' => __( 'Items', 'yiw' ),
                'id' => 'items',
                'type' => 'text',      
                'desc' => __( 'The number of items to display', 'yiw' ),  
                'std' => '3'
            ),
            array(
                'name' => __( 'Show Thumb?', 'yiw' ),  
                'id' => 'show_thumb',
                'type' => 'select',
                'options' => array(
                    'yes' => __( 'Yes', 'yiw' ),
                    'no' => __( 'No', 'yiw' )
                ),
                'std' => 'yes'
            ),
            array(
                'name' => __( 'Show Content?', 'yiw' ),  
                'id' => 'show_content',
                'type' => 'select',
                'options' => array(
                    'yes' => __( 'Yes', 'yiw' ),
                    'no' => __( 'No', 'yiw' )
                ),
                'std' => 'true'
            ),
            array(
                'name' => __( 'Show Author?', 'yiw' ),  
                'id' => 'show_author',
                'type' => 'select',
                'options' => array(
                    'yes' => __( 'Yes', 'yiw' ),
                    'no' => __( 'No', 'yiw' )
                ),
                'std' => 'true'
            ),
            array(
                'name' => __( 'Show Date?', 'yiw' ),  
                'id' => 'show_date',
                'type' => 'select',
                'options' => array(
                    'yes' => __( 'Yes', 'yiw' ),
                    'no' => __( 'No', 'yiw' )
                ),
                'std' => 'true'
            ),    
            array(
                'name' => __( 'Excerpt', 'yiw' ),  
                'id' => 'excerpt',
                'type' => 'text',
                'std' => 10
            ),
        )
    );
    
    $sc['works'] = array(
        'name' => __( 'Works Slider', 'yiw' ), 
        'content' => false,  
        'parameters' => array(      // la lista dei parametri da poter utilizzare nello shortcode   
            array(
                'name' => __( 'Post type', 'yiw' ),  
                'id' => 'post_types',
                'type' => 'select',
                'options' => array(
                    'portfolio' => __( 'Portfolio', 'yiw' ),
                    'gallery' => __( 'Gallery', 'yiw' )
                ),
                'std' => 'bl_portfolio'
            ),   
            array(
                'name' => __( 'Items', 'yiw' ),
                'id' => 'items',
                'type' => 'text',      
                'desc' => __( 'The number of items to display. Leave -1 to show all posts.', 'yiw' ),  
                'std' => -1
            ),
        )
    );            
    
    $sc['sidebar'] = array(
        'name' => __( 'Show sidebar', 'yiw' ), 
        'content' => false,  
        'desc' => __( 'With this shortcode, you can show a sidebar in the page or the post, that you always manage from "Widgets" admin page.', 'yiw' ),
        'parameters' => array(      // la lista dei parametri da poter utilizzare nello shortcode   
            array(
                'name' => __( 'Name sidebar', 'yiw' ),  
                'id' => 'name',
                'type' => 'select',
                'options' => yiw_sidebars_dropdown_array(false),
                'std' => 'bl_portfolio'
            ),
        )
    );
    
    return $sc;    
} 
add_filter( 'yiw_shortcodes', 'yiw_add_tinymce_shortcodes' );

/**
 * NEWSLETTER FORM
 *
 * @description
 *    Show a newsletter form
 *
 * @example
 *   [newsletter_form action="" label="" [label_submit=""] ]
 *
 * @params
 *   action   - the action of form
 *   label    - the label of input text
 *   label_submit - the label of submit button
 *
 **/
function yiw_sc_newsletter_form_func($atts, $content = null) {
    extract(shortcode_atts(array(
        "description" => yiw_get_option( 'newsletter_form_description' ),
        "title" => yiw_get_option( 'newsletter_form_title' ),
        'action' => yiw_get_option( 'newsletter_form_action' ),
        'email' => yiw_get_option( 'newsletter_form_email' ),
        'email_label' => yiw_get_option( 'newsletter_form_label_email' ),
        'submit' => yiw_get_option( 'newsletter_form_label_submit' ),
        'hidden_fields' => yiw_get_option( 'newsletter_form_label_hidden_fields' ),
        'method' => yiw_get_option( 'newsletter_form_method' )
    ), $atts));

    $html = '';

    $html .= '<div class="newsletter-section group">';

    $html .= '<p class="description special-font">';
    $html .= yiw_string_( '<strong>', $title, '</strong>', false );
    $html .= yiw_string_( ' ', $description, '', false );
    $html .= '</p>';

    $html .= '<form method="' . $method . '" action="' . $action . '">';

    $html .= '<fieldset>';

    $html .= '<ul class="group">';

    $html .= '<li>';
    $html .= '<label for="' . $email . '">' . $email_label . '</label>';
    $html .= '<input type="text" name="' . $email . '" id="' . $email . '" class="email-field text-field autoclear" />';
    $html .= '</li>';

    $html .= '<li>';
    // hidden fileds
    if ( $hidden_fields != '' ) {
        $hidden_fields = explode( '&', $hidden_fields );
        foreach ( $hidden_fields as $field ) {
            list( $id_field, $value_field ) = explode( '=', $field );
            $html .= '<input type="hidden" name="' . $id_field . '" value="' . $value_field . '" />';
        }
    }
    $html .= wp_nonce_field('mc_submit_signup_form', '_mc_submit_signup_form_nonce', false, false);
    $html .= '<input type="submit" value="' . $submit . '" class="submit-field" />';
    $html .= '</li>';

    $html .= '</ul>';

    $html .= '</fieldset>';

    $html .= '</form>';

    $html .= '</div>';

    return apply_filters( 'yiw_sc_newsletter_form_func', $html );
}
add_shortcode("newsletter_form", "yiw_sc_newsletter_form_func");