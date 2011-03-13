<?php
 /**
  * item/course View
  *
  * Provides individual course info
  *
  * @todo Should be a lot nicer, no longer a table but dog ugly still
  * @param Course $course Course Object
  *
  */
?>
<? if(isset($course)): ?>
    <h2><?=$course->title?></h2>
    <p>Start date: <?=$course->start_date?></p>
    <p>End date: <?=$course->end_date?></p>
    <p id="price"></p>
    <p><?=str_replace("\n","<br/>", $course->description)?></p>
<? else:?>
    <h2>No course with that id</h2>
<? endif;?>

<script type="text/javascript">
    var p = document.getElementById('price');
    var price = <?=$course->price?>;

    var euro   = price / 100;
    var change = price % 100;

    p.innerHTML = "&euro;" + (euro + change/100).toFixed(2);
</script>