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
  *
  */
?>
<h2>Courses</h2>
<?=form_open('courses/apply')?>

<? foreach($courses as $area => $courses_in_area):?>
    <h2 onclick="$('#<?=$area?>').slideToggle();"><?=$area?></h2>
    
    <div class="course_box" id="<?=$area?>">
    <table>
        <thead>
        <tr>
            <th>Selected</th>
            <th>ShortName</th>
            <th>Name</th>
            <th>Area</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Enrolled</th>
            <th>Capacity</th>
        </tr>
        </thead>
        <tbody>
        <? if(count($courses_in_area)>0): $odd=0; foreach($courses_in_area as $course):?>
        <tr <?=($odd^=1)?' class="odd_row"':''?>>
            <td><?=form_checkbox('selected_courses[]',
                                 $course->cid,
                                 FALSE)?></td>
            <td><?=anchor('courses/by_id/'.$course->cid, $course->short_title)?></td>
            <td><?=$course->title?></td>
            <td><?=anchor('courses/by_area/'.$course->area, $course->area)?></td>
            <td><?=$course->description?></td>
            <td><?=$course->start_date?></td>
            <td><?=$course->end_date?></td>
            <td><?=$course->enrolled_count?></td>
            <td><?=$course->enrolled_max?></td>
        </tr>
        <? endforeach; else:?>
           <tr><td colspan="all">Nothing here</td></tr>
        <? endif;?>
        </tbody>
    </table>
    </div>
    
<? endforeach;?>

    <?=form_submit('Submit', 'submit')?>
<?=form_close()?>

<script type="text/javascript">
$(document).ready(function(){
    $('.course_box').hide()
});
</script>
