<?php

class BRJScriptureModule extends FLBuilderModule {
  public function __construct() {
	parent::__construct( [
		'name'            => __( 'Scripture', 'the-xchange' ),
		'description'     => __( 'Display a passage of scripture', 'the-xchange' ),
		'category'        => __( 'Basic', 'the-xchange' ),
		'partial_refresh' => true,
	] );
  }
}

FLBuilder::register_module( 'BRJScriptureModule', [
	'general' => [
		'title' => __( 'General', 'the-xchange' ),
		'sections' => [
			'general' => [
				'title' => '',
				'fields' => [
					'passage' => array(
						'type'         => 'text',
						'label'        => __( 'Passage', 'fl-builder' ),
					),
				]
			]
		]
	]
] );