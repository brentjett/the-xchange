<?php
$m = $module;
$s = $settings;

// Wrapper Element
$tag = $s->link ? 'a' : 'div';
$attrs = [
	'class' => [ 'thumbnail-item', $s->kind ]
];
$link_attrs = $m::get_link_attributes( 'link', $s );

// Author
$byline = sprintf( "By <span class='author-name'>%s</span>", $s->author );
$author = $s->author ? "<div class='item-author'>{$byline}</div>" : '';
$desc = $s->description ? "<div class='item-description'>{$s->description}</div>" : '';

// Thumbnail
$img_css = '';
if ( isset( $s->thumb_src ) ) {
	$img_css .= sprintf( "background-image: url(%s);", $s->thumb_src );
}

echo <<<EOT
<{$tag} {$m::do_attributes( $attrs, $link_attrs )}>
	<div class="thumbnail-item-image" style="{$img_css}"></div>
	<div class="thumbnail-item-content">
		<div class="item-title">{$s->title}</div>
		{$author}
		{$desc}
	</div>
</{$tag}>
EOT;
?>