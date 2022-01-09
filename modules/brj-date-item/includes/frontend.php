<?php
$time = strtotime( $settings->date );
$day_int = date( 'j', $time );
$day_of_week = date( 'D', $time );
$tag = $settings->link ? 'a' : 'div';
$desc = $settings->description ? "<div class='item-desc'>{$settings->description}</div>" : '';
echo <<<EOT
<{$tag} class="brj-date-item" {$module->attr( 'href', $settings->link )}>
	<div class="item-date-thumb">
		<div class="date-day">{$day_of_week}</div>
		<div class="date-number">{$day_int}</div>
	</div>
	<div class="item-content">
		<div class="item-title">{$settings->title}</div>
		{$desc}
	</div>
</{$tag}>
EOT;
?>