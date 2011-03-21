<?php
 /**
  * item/course View
  *
  * Provides individual course info
  *
  * @todo Should be a lot nicer, probably not a table so!
  * @param Course $course Course Object
  *
  */
?>
<? if(isset($course)): ?>
<h2><?=$course->title?></h2>
<?=anchor('courses/apply/', 'Apply for this course')?>
<table>
    <tr>
        <th>Start Date</th>
        <td><?=$course->start_date?></td>
    </tr>
    <tr>
        <th>End Date</th>
        <td><?=$course->end_date?></td>
    </tr>
    <tr>
        <th>Places</th>
        <td><?=($course->enrolled_max - $course->enrolled_count)?></td>
    </tr>
    <tr>
        <th>Price</th>
        <td id="price"></td>
    </tr>
</table>
<?=str_replace("\n","<br/>", $course->description)?>

<? else:?>
<h2>No course with that id</h2>
<? endif;?>

<script type="text/javascript">
    var td = document.getElementById('price');
    var price = <?=$course->price?>;

    var euro   = price / 100;
    var change = price % 100;

    td.innerHTML = "&euro;" + (euro + change/100).toFixed(2);
</script>