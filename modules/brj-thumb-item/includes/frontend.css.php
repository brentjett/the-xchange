<?php
// Thumbnail Aspect Ratio
FLBuilderCSS::rule( [
	'selector' => ".fl-builder-content .fl-node-$id .thumbnail-item-image",
	'enabled'  => $settings->aspect_ratio,
	'props'    => [
		'aspect-ratio' => $settings->aspect_ratio,
	],
] );