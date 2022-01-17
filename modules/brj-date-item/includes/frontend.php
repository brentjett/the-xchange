<?php
$m = $module;
$s = $settings;

// Wrapper Element
$tag = $s->link ? 'a' : 'div';
$attrs = [
	'href' => $s->link,
	'class' => 'brj-date-item'
];
$link_attrs = $m::get_link_attributes( 'link', $s );

// Date Thumbnail
$time = strtotime( $s->date );
$day_int = date( 'j', $time );
$day_of_week = date( 'D', $time );

$desc = $s->description ? "<div class='item-desc'>{$s->description}</div>" : '';

echo <<<EOT
<{$tag} {$m::do_attributes( $attrs, $link_attrs )}>
	<div class="item-date-thumb">
		<div class="date-day">{$day_of_week}</div>
		<div class="date-number">{$day_int}</div>
	</div>
	<div class="item-content">
		<div class="item-title">{$s->title}</div>
		{$desc}
	</div>
</{$tag}>
EOT;
?>