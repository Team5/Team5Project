<?php
 /**
  * collection/courses View
  * 
  * Receives list of courses, presents them and actions for user to perform on
  *     selected courses
  *
  * @todo different users make use of this page in different ways
  *     admin     must be able to delete+update from this page
  *     providers must be able to delete+update their own courses from this page
  * @param Array $courses courses sorted by area, key=>area, value=>array of
  *     course objects
  * @param string $type The type of user
  *
  */
?>

<?=form_open('courses/apply')?>
<div id="accordion">
<? foreach($courses as $area => $courses_in_area):?>
<?php
$title = $courses_in_area[0];
$courses = $courses_in_area[1];
?>

<? if(count($courses) > 0): ?>
    <h3 class="area_title" > <!--onclick="$('#<?=$area?>').slideToggle('slow');"-->
        <a href="#"><?=$title?></a>
    </h3>
    <div>
    <table class="course_box" id="<?=$area?>">
        <thead>
            <tr>
                <? if($type == 'user'):?>
                <th>Pick</th>
                <? endif;?>
                <th>Name</th>
                <th>Description</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
        <? if(count($courses)>0): $odd=0; foreach($courses as $course):?>
        <?php
            $filled = 0>=($course->enrolled_max - $course->enrolled_count);

        ?>
            <tr<?
              if ($odd^=1 OR $filled)
              {
                  echo ' class="';
                  if($odd)    echo " odd_row";
                  if($filled) echo " filled";
                  echo '"';
              }
              ?>>
            <? if($type == 'user'):?>
            <td rowspan="3"><?=form_checkbox('selected_courses[]',
                                 $course->cid,
                                 FALSE)?></td>
            <? endif;?>
            <th rowspan="3"><?=$course->title?></th>
            <td rowspan="3"><?=$course->description?></td>
                <td><?=$course->start_date?></td></tr>
            <tr<?=($filled)?' class="filled"':''?>><td><?=$course->end_date?></td></tr>
            <tr<?=($filled)?' class="filled"':''?>><td><?=$course->enrolled_max - $course->enrolled_count?></td></tr>
        <? endforeach; else:?>
           <tr><td colspan="all">Nothing here</td></tr>
        <? endif;?>
        </tbody>
    </table>
    </div>
<? endif;?>
<? endforeach;?>
    
<? if($type == 'user'): ?>
    <?=form_submit('Submit', 'Apply')?>
<? endif;?>
</div>
<?=form_close()?>

<script type="text/javascript">
$(document).ready(function(){
    $('.area_title').click(function() {
            $(this).next().slideToggle('slow');
            return false;
    }).next().hide();
});
</script>
