<?php
class BRJThumbnailItemModule extends BRJUtilityModule {
	public function __construct() {
		parent::__construct( [
			'name'            => __( 'Thumbnail Item', 'the-xchange' ),
			'enabled'         => false, /* Use via aliases below */
			'partial_refresh' => true,
		] );
	}
}

FLBuilder::register_module( 'BRJThumbnailItemModule', [
	'general' => [
		'title' => __( 'General', 'the-xchange' ),
		'sections' => [
			'general' => [
				'title' => '',
				'fields' => [
					'kind' => [
						'type' => 'select',
						'label' => __( 'Type', 'the-xchange' ),
						'options' => [
							''        => __( 'Generic', 'the-xchange' ),
							'book'    => __( 'Book', 'the-xchange' ),
							'song'    => __( 'Song', 'the-xchange' ),
							'podcast' => __( 'Podcast', 'the-xchange' ),
						],
					],
					'title' => [
						'type' => 'text',
						'label' => __( 'Title', 'the-xchange' ),
						'placeholder' => __( 'Title', 'the-xchange' ),
						'preview' => [
							'type' => 'text',
							'selector' => '.item-title',
						]
					],
					'author' => [
						'type' => 'text',
						'label' => __( 'Author / Artist', 'the-xchange' ),
						'placeholder' => __( 'John Smith', 'the-xchange' ),
						'preview' => [
							'type' => 'text',
							'selector' => '.author-name',
						]
					],
					'description' => [
						'type' => 'textarea',
						'label' => __( 'Description', 'the-xchange' ),
						'rows' => 4,
					],
					'link' => [
						'type' => 'link',
						'label' => __( 'Link', 'the-xchange' ),
						'placeholder'   => __( 'http://www.example.com', 'the-xchange' ),
						'show_target'   => true,
						'show_nofollow' => true,
					],
				]
			],
			'thumbnail' => [
				'title' => __( 'Thumbnail', 'the-xchange' ),
				'fields' => [
					'aspect_ratio' => [
						'type' => 'select',
						'label' => __( 'Aspect Ratio', 'the-xchange' ),
						'options' => [
							'' => __( 'Square (default)', 'the-xchange' ),
							'1/1.6' => __( 'Book', 'the-xchange' ),
							'3/4' => __( 'Poster (3:4)', 'the-xchange' ),
							'16/9' => __( 'Video (16:9)', 'the-xchange' ),
							'4/5' => __( '4:5', 'the-xchange' ),
						],
						'preview' => [
							'type' => 'css',
							'selector' => '.thumbnail-item-image',
							'property' => 'aspect-ratio',
						]
					],
					'thumb' => [
						'type' => 'photo',
						'label' => __( 'Thumbnail', 'the-xchange' ),
						'show_remove' => true,
						'preview' => [
							'type' => 'refresh',
						]
					],
				],
			],
		]
	]
] );

$default_alias = [
	'module' => 'brj-thumb-item',
	'category' => __( 'Basic', 'the-xchange' ),
	'settings' => [],
];

FLBuilder::register_module_alias( 'brj-book-item', array_merge( $default_alias, [
	'name'     => __( 'Book', 'the-xchange' ),
	'settings' => [
		'kind' => 'book'
	],
] ) );

FLBuilder::register_module_alias( 'brj-song-item', array_merge( $default_alias, [
	'name'     => __( 'Song', 'the-xchange' ),
	'settings' => [
		'kind' => 'song'
	],
] ) );

FLBuilder::register_module_alias( 'brj-podcast-item', array_merge( $default_alias, [
	'name'     => __( 'Podcast', 'the-xchange' ),
	'settings' => [
		'kind' => 'podcast'
	],
] ) );