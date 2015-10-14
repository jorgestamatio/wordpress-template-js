<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['otto_metabox'] = array(
		'id'         => 'otto_metabox',
		'title'      => __( 'Settings', 'cmb' ),
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'    => __( 'Text color', 'cmb' ),
				'desc'    => __( '(default black)', 'cmb' ),
				'id'      => $prefix . 'text_color',
				'type'    => 'colorpicker',
				'default' => '#111111'
			),
			array(
				'name'    => __( 'Background color', 'cmb' ),
				'desc'    => __( '(default black)', 'cmb' ),
				'id'      => $prefix . 'bg_color',
				'type'    => 'colorpicker',
				'default' => '#111111'
			),
			array(
				'name' => __( 'Background Image', 'cmb' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb' ),
				'id'   => $prefix . 'bg_image',
				'type' => 'file',
			),
			array(
				'name'    => __( 'Background attachment', 'cmb' ),
				'desc'    => __( '(default scroll)', 'cmb' ),
				'id'      => $prefix . 'bg_attachment',
				'type'    => 'select',
				'options' => array(
					'scroll' => __( 'Scroll', 'cmb' ),
					'fixed'   => __( 'Fixed', 'cmb' ),
				),
			),
		),
	);

	$meta_boxes['project_metabox'] = array(
		'id'         => 'otto_metabox',
		'title'      => __( 'Settings', 'cmb' ),
		'pages'      => array( 'project' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			// array(
			// 	'name' => __( 'Website URL', 'cmb' ),
			// 	// 'desc' => __( 'http://', 'cmb' ),
			// 	'id'   => $prefix . 'url',
			// 	'type' => 'text_url',
			// 	'protocols' => array('http', 'https'), // Array of allowed protocols
			// 	// 'repeatable' => true,
			// ),
			// array(
			// 	'name' => __( 'Site preview', 'cmb' ),
			// 	'desc' => __( 'Desktop', 'cmb' ),
			// 	'id'   => $prefix . 'site_preview',
			// 	'type' => 'checkbox',
			// ),
			// array(
			// 	'name' => __( 'Site preview', 'cmb' ),
			// 	'desc' => __( 'Mobile', 'cmb' ),
			// 	'id'   => $prefix . 'site_preview_mobile',
			// 	'type' => 'checkbox',
			// ),
			array(
				'name'    => __( 'Titre de navigation', 'cmb' ),
				'desc'    => __( 'Titre sur la navigation', 'cmb' ),
				'id'      => $prefix . 'project_title_nav',
				'type'    => 'text',
				// 'type'    => 'textarea',
			),
			array(
				'name'    => __( 'Resum&eacute;', 'cmb' ),
				'desc'    => __( 'Resume du projet', 'cmb' ),
				'id'      => $prefix . 'project_resume',
				'type'    => 'wysiwyg',
				// 'type'    => 'textarea',
				'options' => array( 'textarea_rows' => 5, ),
			),
			array(
				'name'    => __( 'Infos', 'cmb' ),
				'desc'    => __( 'Credits du projet', 'cmb' ),
				'id'      => $prefix . 'project_info',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),
			// array(
			// 	'name'    => __( 'Project type', 'cmb' ),
			// 	'desc'    => __( 'select project type', 'cmb' ),
			// 	'id'      => $prefix . 'project_layout',
			// 	'type'    => 'select',
			// 	'options' => array(
			// 		'standard' => __( 'Simple', 'cmb' ),
			// 		'two_col'   => __( 'Two columns', 'cmb' ),
			// 	),
			// ),
			// array(
			// 	'id'          => $prefix . 'repeat_group',
			// 	'type'        => 'group',
			// 	'description' => __( 'Generates reusable form entries', 'cmb' ),
			// 	'options'     => array(
			// 		'group_title'   => __( 'Entry {#}', 'cmb' ), // {#} gets replaced by row number
			// 		'add_button'    => __( 'Add Another Entry', 'cmb' ),
			// 		'remove_button' => __( 'Remove Entry', 'cmb' ),
			// 		'sortable'      => true, // beta
			// 	),
			// 	// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
			// 	'fields'      => array(
			// 		array(
			// 			'name' => 'Entry Title',
			// 			'id'   => 'title',
			// 			'type' => 'text',
			// 			// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
			// 		),
			// 		array(
			// 			'name' => 'Description',
			// 			'description' => 'Write a short description for this entry',
			// 			'id'   => 'description',
			// 			'type' => 'textarea_small',
			// 		),
			// 	),
			// ),
		),
	);

	$meta_boxes['post_metabox'] = array(
		'id'         => 'otto_metabox',
		'title'      => __( 'Settings', 'cmb' ),
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Infos', 'cmb' ),
				'desc'    => __( 'Credits du projet', 'cmb' ),
				'id'      => $prefix . 'post_info',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 15, ),
			),
		
		),
	);

	$meta_boxes['zo_image_metabox'] = array(
		'id'         => 'otto_metabox',
		'title'      => __( 'Settings', 'cmb' ),
		'pages'      => array( 'zo_image' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name' => __( 'Slug of project', 'cmb' ),
				'id'   => $prefix . 'link_to',
				'type' => 'text',
			),
			
			// array(
			// 	'name' => __( 'ZO Image', 'cmb' ),
			// 	'desc' => __( 'Upload an image or enter a URL.', 'cmb' ),
			// 	'id'   => $prefix . 'bg_image',
			// 	'type' => 'file',
			// ),
			
		),
	);


	/**
	 * Metabox for the user profile screen
	 */
	$meta_boxes['user_edit'] = array(
		'id'         => 'user_edit',
		'title'      => __( 'User Profile Metabox', 'cmb' ),
		'pages'      => array( 'user' ), // Tells CMB to use user_meta vs post_meta
		'show_names' => true,
		'cmb_styles' => false, // Show cmb bundled styles.. not needed on user profile page
		'fields'     => array(
			// array(
			// 	'name'     => __( 'Extra Info', 'cmb' ),
			// 	'desc'     => __( 'field description (optional)', 'cmb' ),
			// 	'id'       => $prefix . 'exta_info',
			// 	'type'     => 'title',
			// 	'on_front' => false,
			// ),
			// array(
			// 	'name'    => __( 'Avatar', 'cmb' ),
			// 	'desc'    => __( 'field description (optional)', 'cmb' ),
			// 	'id'      => $prefix . 'avatar',
			// 	'type'    => 'file',
			// 	'save_id' => true,
			// ),
			// array(
			// 	'name' => __( 'Facebook URL', 'cmb' ),
			// 	'desc' => __( 'field description (optional)', 'cmb' ),
			// 	'id'   => $prefix . 'facebookurl',
			// 	'type' => 'text_url',
			// ),
			// array(
			// 	'name' => __( 'Twitter URL', 'cmb' ),
			// 	'desc' => __( 'field description (optional)', 'cmb' ),
			// 	'id'   => $prefix . 'twitterurl',
			// 	'type' => 'text_url',
			// ),
			// array(
			// 	'name' => __( 'Google+ URL', 'cmb' ),
			// 	'desc' => __( 'field description (optional)', 'cmb' ),
			// 	'id'   => $prefix . 'googleplusurl',
			// 	'type' => 'text_url',
			// ),
			// array(
			// 	'name' => __( 'Linkedin URL', 'cmb' ),
			// 	'desc' => __( 'field description (optional)', 'cmb' ),
			// 	'id'   => $prefix . 'linkedinurl',
			// 	'type' => 'text_url',
			// ),
			// array(
			// 	'name' => __( 'User Field', 'cmb' ),
			// 	'desc' => __( 'field description (optional)', 'cmb' ),
			// 	'id'   => $prefix . 'user_text_field',
			// 	'type' => 'text',
			// ),
		)
	);

	

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'metabox/init.php';

}
