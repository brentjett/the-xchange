<?php

class BRJDateListModule extends FLBuilderModule {
  public function __construct() {
	parent::__construct( [
		'name'            => __( 'Event List', 'the-xchange' ),
		'description'     => __( 'A list of events', 'the-xchange' ),
		'category'        => __( 'Basic', 'the-xchange' ),
		'partial_refresh' => true,
	] );
  }
}

FLBuilder::register_module( 'BRJDateListModule', [
	'general' => [
		'title' => __( 'General', 'the-xchange' ),
		'sections' => [
			'general' => [
				'title' => __( 'Items', 'the-xchange' ),
				'fields' => [
					'list_items' => array(
						'type'         => 'form',
						'label'        => __( 'Event', 'fl-builder' ),
						'form'         => 'brj_data_list_form', // ID from registered form below
						'preview_text' => 'title', // Name of a field to use for the preview text
						'multiple'     => true,
					),
				]
			]
		]
	]
] );

FLBuilder::register_settings_form( 'brj_data_list_form', [
	'title' => __( 'Add Event Item', 'the-xchange' ),
	'tabs' => [
		'general' => [
			'title' => __( 'General', 'the-xchange' ),
			'sections' => [
				'general' => [
					'title' => '',
					'fields' => [
						'title' => [
							'type' => 'text',
							'label' => __( 'Title', 'the-xchange' ),
							'default' => 'Event Item'
						],
						'description' => [
							'type' => 'textarea',
							'label' => __( 'Description', 'the-xchange' ),
							'rows' => 4,
							'default' => 'Event Details. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper.'
						],
						'date' => [
							'type' => 'date',
							'label' => __( 'Date', 'the-xchange' ),
						],
					]
				]
			]
		]
	]
] );