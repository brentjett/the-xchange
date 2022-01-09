<?php
class BRJDateItemModule extends FLBuilderModule {
	public function __construct() {
		parent::__construct( [
			'name'            => __( 'Event Item', 'the-xchange' ),
			'description'     => __( 'A single event item', 'the-xchange' ),
			'category'        => __( 'Basic', 'the-xchange' ),
			'partial_refresh' => true,
		] );
	}
	
	public function attr( $name, $value ) {
		return $value ? $name . '="' . $value . '"' : '';
	}
}

FLBuilder::register_module( 'BRJDateItemModule', [
	'general' => [
		'title' => __( 'General', 'the-xchange' ),
		'sections' => [
			'general' => [
				'title' => '',
				'fields' => [
					'title' => [
						'type' => 'text',
						'label' => __( 'Title', 'the-xchange' ),
						'placeholder' => __( 'Event', 'the-xchange' ),
					],
					'description' => [
						'type' => 'textarea',
						'label' => __( 'Description', 'the-xchange' ),
						'rows' => 4,
						'placeholder' => 'Event Details. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper.'
					],
					'date' => [
						'type' => 'date',
						'label' => __( 'Date', 'the-xchange' ),
					],
					'link' => [
						'type' => 'link',
						'label' => __( 'Link', 'the-xchange' ),
						'placeholder'   => __( 'http://www.example.com', 'the-xchange' ),
						'show_target'   => true,
						'show_nofollow' => true,
					],
				]
			]
		]
	]
] );