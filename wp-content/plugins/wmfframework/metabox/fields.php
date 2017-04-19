<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '_wmfslider_';

global $meta_boxes_wmfslider;

$meta_boxes_wmfslider = array();

// 1st meta box
$meta_boxes_wmfslider[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'sliderfields',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Slider', 'wmft2d' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'wmfslider' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		
		
		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name'             => __( 'Slider Images', 'wmft2d' ),
			'id'               => "{$prefix}imgadv",
			'type'             => 'image_advanced',
			'max_file_uploads' => 50,
		),
		

	)
);


// 1st meta box
$meta_boxes_wmfslider2[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'sliderfields2',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Slider Circle Icon', 'wmft2d' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'wmfslider' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => false,

	// List of meta fields
	'fields' => array(
		// RADIO BUTTONS
		array(
			'name'    => __( 'Activate?', 'wmft2d' ),
			'id'      => "{$prefix}radio",
			'type'    => 'radio',
			'desc'  => __( 'Have to enabled for work.', 'wmft2d' ),
			'options' => array(
				'1' => __( 'Enable', 'wmft2d' ),
				'0' => __( 'Disable', 'wmft2d' ),
			),
		),
		// TEXT
		array(
			'name'  => __( 'Icon Name', 'wmft2d' ),
			'id'    => "{$prefix}text",
			'desc'  => __( 'Please write icon name here like sample above. You can find icon names from <a href="http://fontawesome.io/3.2.1/icons/" target="_blank">http://fontawesome.io/3.2.1/icons/</a>', 'wmft2d' ),
			'type'  => 'text',
			'std'   => __( 'icon-cloud', 'wmft2d' ),
			'clone' => false,
		),
		// COLOR
		array(
			'name' => __( 'Icon Box BG Color', 'wmft2d' ),
			'id'   => "{$prefix}iconbgcolor",
			'type' => 'color',
			'desc'  => __( 'Circle top icon box background.', 'wmft2d' ),
		),
		// COLOR
		array(
			'name' => __( 'Icon Color', 'wmft2d' ),
			'id'   => "{$prefix}iconcolor",
			'type' => 'color',
			'desc'  => __( 'Circle top icon box icon color.', 'wmft2d' ),
		),
		// COLOR
		array(
			'name' => __( 'Icon Border Color', 'wmft2d' ),
			'id'   => "{$prefix}iconcolorb",
			'type' => 'color',
			'desc'  => __( 'Circle top icon box border color.', 'wmft2d' ),
		),
		
		// TEXT
		array(
			'name'  => __( 'Icon Box Link URL', 'wmft2d' ),
			'id'    => "{$prefix}link",
			'desc'  => __( 'If want to include a link please fill box above. Ex:http://www.yoursite.com', 'wmft2d' ),
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
		
		// SELECT BOX
		array(
			'name'     => __( 'Link Target', 'wmft2d' ),
			'id'       => "{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'_blank' => __( '_blank', 'wmft2d' ),
				'_parent' => __( '_parent', 'wmft2d' ),
				'_self' => __( '_self', 'wmft2d' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '_blank',
			'placeholder' => __( 'Select a target', 'wmft2d' ),
		),

	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function wmf_slider_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes_wmfslider;
	foreach ( $meta_boxes_wmfslider as $meta_box_wmfslider )
	{
		new RW_Meta_Box( $meta_box_wmfslider );
	}
	
	global $meta_boxes_wmfslider2;
	foreach ( $meta_boxes_wmfslider2 as $meta_box_wmfslider2 )
	{
		new RW_Meta_Box( $meta_box_wmfslider2 );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'wmf_slider_register_meta_boxes' );





//Gallery
$prefixn = '_wmfgallery_';

global $meta_boxes_wmfgallery;

$meta_boxes_wmfgallery = array();

// 1st meta box
$meta_boxes_wmfgallery[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'galleryfields',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Gallery', 'wmft2d' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'wmfgallery' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		
		
		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name'             => __( 'Gallery Images', 'wmft2d' ),
			'id'               => "{$prefixn}imgadv",
			'type'             => 'image_advanced',
			'max_file_uploads' => 50,
		),
		

	)
);




// 1st meta box
$meta_boxes_wmfgallery2[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'galleryfields2',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Portfolio Box Settings', 'wmft2d' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'wmfgallery' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => false,

	// List of meta fields
	'fields' => array(
		
		// COLOR
		array(
			'name' => __( 'Portfolio Box BG Color', 'wmft2d' ),
			'id'   => "{$prefixn}pbbgcolor",
			'type' => 'color',
			'desc'  => __( 'Background color for portfolio box', 'wmft2d' ),
		),
		// COLOR
		array(
			'name' => __( 'Portfolio Box Text Color', 'wmft2d' ),
			'id'   => "{$prefixn}pbcolor",
			'type' => 'color',
			'desc'  => __( 'Text color for color for portfolio box', 'wmft2d' ),
		),
		
		// SLIDER
		array(
			'name' => __( 'Portfolio Box Border Radius', 'wmft2d' ),
			'id'   => "{$prefixn}pbradius",
			'type' => 'slider',
			'desc'  => __( 'Border radius for portfolio box', 'wmft2d' ),
			'prefix' => '',
			'suffix' => __( ' px', 'wmft2d' ),
			'js_options' => array(
				'min'   => 0,
				'max'   => 10,
				'step'  => 1,
			),
		),

	)
);





/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function wmf_gallery_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes_wmfgallery;
	foreach ( $meta_boxes_wmfgallery as $meta_box_wmfgallery )
	{
		new RW_Meta_Box( $meta_box_wmfgallery );
	}
	
	global $meta_boxes_wmfgallery2;
	foreach ( $meta_boxes_wmfgallery2 as $meta_box_wmfgallery2 )
	{
		new RW_Meta_Box( $meta_box_wmfgallery2 );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'wmf_gallery_register_meta_boxes' );
