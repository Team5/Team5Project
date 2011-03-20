<div id = "about_left_links">

<?php
	$menuitems = array(
		"about" => "UCC History",
		"about/office" => "Provider Office",
		"about/facts" => "UCC Facts & Figures",
		"about/maps" => "Campus Maps"
	);
?>
<ul>
<? foreach ($menuitems as $url => $title): ?>
		<li>
	<? $attributes = 'class="menuitem" ' . ($url == $left_choice ? 'id="left_selected"' : ''); ?>
	<?= anchor($url, $title, $attributes) ?>
	</li>
<? endforeach ?>

</ul>
</div>