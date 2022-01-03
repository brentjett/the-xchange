<ol class="brj-date-list">
<?php
foreach( $settings->list_items as $item ) {
	$time = strtotime( $item->date );
	$day_int = date( 'j', $time );
	$day_of_week = date( 'D', $time );
echo <<<EOT
<li class="date-item">
	<a>
		<div class="item-date-thumb">
			<div class="date-day">{$day_of_week}</div>
			<div class="date-number">{$day_int}</div>
		</div>
		<div class="item-content">
			<div class="item-title">{$item->title}</div>
			<div class="item-desc">{$item->description}</div>
		</div>
	</a>
</li>
EOT;
}
?>
</ol>