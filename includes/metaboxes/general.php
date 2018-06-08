<?php
namespace GO_WP\MetaBoxes\General;
/**
 * Metaboxes that appear on more than one post type around the site
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};
	// NOTE: Uncomment to activate metabox
	add_action( 'cmb2_init',  $n( 'artwork_options' ) );
	
	//add_action( 'cmb2_init', $n('go_register_conditionals_demo_metabox') );	
	
}
/**
 * Example metabox
 * See https://github.com/WebDevStudios/CMB2/wiki/Field-Types for
 * more information on creating metaboxes and field types.
 */
function artwork_options() {
	$prefix = 'artwork_';
	$cmb = new_cmb2_box( array(
		'id'        	=> $prefix . 'metabox',
		'title'     	=> __( 'Artwork Metadata', 'cmb2' ),
		'priority'  	=> 'high',
		'show_names'	=> true,
		'object_types'	=> array( 'artwork' )
	) );

	$cmb->add_field( array(
		'name'	=> __( 'Year', 'cmb2' ),
		'desc'  => __( 'Year of Work', 'cmb2' ),
		'id'  	=> $prefix . 'year',
		'type'	=> 'text'
	) );

	$cmb->add_field( array(
		'name'    => esc_html__( 'Medium', 'cmb2' ),
		'desc'    => esc_html__( 'Type of medium', 'cmb2' ),
		'id'      => $prefix . 'medium',
		'type'    => 'radio',
		'options' => array(
			'Oil on canvas'	=> esc_html__( 'Oil on canvas', 'cmb2' ),
			'Oil on panel' 	=> esc_html__( 'Oil on panel', 'cmb2' ),
			'Oil on collaged map and panel' => esc_html__( 'Oil on collaged map and panel', 'cmb2' ),
		),
	) );	
	
	
}

function go_register_conditionals_demo_metabox() {
	// Start with an underscore to hide fields from custom fields list.
	$prefix = 'go';
	/**
	 * Sample metabox to demonstrate the different conditions you can set.
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => 'Test Metabox',
		'object_types'  => array( 'page' ), // Post type.
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Address',
		'desc'       => 'Write down an address for showing the other address options',
		'id'         => $prefix . 'address',
		'type'       => 'text',
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Zipcode',
		'id'         => $prefix . 'zipcode',
		'type'       => 'text_medium',
		'attributes' => array(
			'required'            => true, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'address',
		),
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Country',
		'id'         => $prefix . 'country',
		'type'       => 'text_medium',
		'attributes' => array(
			'required'            => true, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'address',
		),
	) );
	$cmb_demo->add_field( array(
		'name' => 'Checkbox',
		'id'   => $prefix . 'checkbox',
		'type' => 'checkbox',
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Show if checked',
		'id'         => $prefix . 'show_if_checked',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'checkbox',
			// Works too: 'data-conditional-value' => 'on'.
		),
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Show if unchecked',
		'id'         => $prefix . 'show_if_unchecked',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id'    => $prefix . 'checkbox',
			'data-conditional-value' => 'off',
		),
	) );
	$cmb_demo->add_field( array(
		'name'             => 'Reason',
		'id'               => $prefix . 'reason',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'one'   => 'Reason 1',
			'two'   => 'Reason 2',
			'three' => 'Reason 3',
			'other' => 'Other reason',
		),
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Other reason detail',
		'desc'       => 'Write down the reason',
		'id'         => $prefix . 'other_reason_detail',
		'type'       => 'textarea',
		'attributes' => array(
			'required'               => true, // Will be required only if visible.
			'data-conditional-id'    => $prefix . 'reason',
			'data-conditional-value' => 'other',
		),
	) );
	$cmb_demo->add_field( array(
		'name'             => 'Reason 2',
		'id'               => $prefix . 'reason_2',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'one'            => 'Reason 1',
			'two'            => 'Reason 2',
			'three'          => 'Reason 3',
			'other_price'    => 'Other reason based on the price',
			'other_quality'  => 'Other reason based on the quality',
		),
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Other reason detail',
		'desc'       => 'Write down the reason',
		'id'         => $prefix . 'other_reason_detail_2',
		'type'       => 'textarea',
		'attributes' => array(
			'required'               => true, // Will be required only if visible.
			'data-conditional-id'    => $prefix . 'reason_2',
			'data-conditional-value' => wp_json_encode( array( 'other_price', 'other_quality' ) ),
		),
	) );
	$cmb_demo->add_field( array(
		'name'             => 'Sizes',
		'id'               => $prefix . 'sizes',
		'type'             => 'radio',
		'show_option_none' => true,
		'options'          => array(
		    'xs'     => 'XS',
		    's'      => 'S',
		    'm'      => 'M',
		    'l'      => 'L',
		    'xl'     => 'XL',
		    'custom' => 'Custom',
		),
		'attributes'       => array(
			'required'       => 'required',
		),
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Custom description',
		'desc'       => 'Write a description for your custom size',
		'id'         => $prefix . 'size_custom_description',
		'type'       => 'textarea',
		'required'   => true,
		'attributes' => array(
			'required'               => true, // Will be required only if visible.
			'data-conditional-id'    => $prefix . 'sizes',
			'data-conditional-value' => 'custom',
		),
	) );
	// Example using conditionals with multi-check checkboxes.
	$cmb_demo->add_field( array(
		'name'    => __( 'Test Multi Checkbox', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'multi-checkbox',
		'type'    => 'multicheck',
		'options' => array(
			'check1' => __( 'Check One', 'cmb2' ),
			'check2' => __( 'Check Two', 'cmb2' ),
			'check3' => __( 'Check Three', 'cmb2' ),
		),
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Multi-check: Shown if *any* checkbox is checked',
		'id'         => $prefix . 'multi-check-detail-test-no-value',
		'type'       => 'text',
		'attributes' => array(
			'required'            => true, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'multi-checkbox',
		),
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Multi-check: Only shown if checkbox 2 is checked',
		'id'         => $prefix . 'multi-check-detail-test-string',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id'    => $prefix . 'multi-checkbox',
			'data-conditional-value' => 'check2',
		),
	) );
	$cmb_demo->add_field( array(
		'name'       => 'Multi-check : Shown if either checkbox 1 *or* 3 is checked',
		'id'         => $prefix . 'multi-check-detail-test-array',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id'    => $prefix . 'multi-checkbox',
			'data-conditional-value' => wp_json_encode( array( 'check1', 'check3' ) ),
		),
	) );
	// Example conditionals within a group.
	$group_id = $cmb_demo->add_field( array(
		'id'          => $prefix . 'repeatable-group',
		'type'        => 'group',
		'description' => 'Repeatable group',
		'options'     => array(
			'group_title'   => 'Entry {#}', // Since version 1.1.4, {#} gets replaced by row number.
			'add_button'    => 'Add Another Entry',
			'remove_button' => 'Remove Entry',
			'sortable'      => true, // Beta.
		),
	) );
	$cmb_demo->add_group_field( $group_id, array(
		'name' => 'Checkbox in group',
		'id'   => 'checkbox',
		'type' => 'checkbox',
	) );
	$cmb_demo->add_group_field( $group_id, array(
		'name'       => 'Dependant field',
		'id'         => 'dependant',
		'type'       => 'text_small',
		'attributes' => array(
			'required'               => true, // Will be required only if visible.
			'data-conditional-id'    => wp_json_encode( array( $group_id, 'checkbox' ) ),
			'data-conditional-value' => 'on',
		),
	) );
}