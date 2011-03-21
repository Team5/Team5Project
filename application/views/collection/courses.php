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
<?=form_open('courses/apply_form')?>

<? if($type == 'user'): ?>
    <?=form_submit('Submit', 'Apply for selected courses')?>
<? endif;?>
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
    <div class="course_box" id="<?=$area?>">
        <p><a href="#" class="hide_irrelevant">Click here to show/hide incompatible choices</a></p>
        <? if(count($courses)>0): $odd=0; foreach($courses as $course):?>
        <?php
            $filled  = 0>=($course->enrolled_max - $course->enrolled_count);
            $already_applied = in_array($course->cid, $applied);
        ?>
            <div <?
              if ($odd^=1 OR $filled OR $already_applied)
              {
                  echo ' class="';
                  if($odd)    echo "odd_row";
                  if($filled) echo " filled";
                  if($already_applied) echo " applied";
                  echo '"';
              }
              ?>>
                
            <h3>
                <?=anchor('courses/by_id/'.$course->cid, $course->title)?>
            </h3>
            <? if($already_applied == True):?>
                <p>You have already applied to this course.</p>
            <? elseif($filled == True): ?>
                <p>This course is booked out, sorry.</p>
            <? endif; ?>
            <? if( ! $filled && ! $already_applied && $type == 'user'):?>
                <span class="apply_now">
                    <?=anchor('/courses/apply/'.$course->cid, 'Apply for this course')?>
                </span>
                <span class="add_to_list">
                    Add to course list
                    <?=form_checkbox('selected_courses[]',
                                     $course->cid,
                                     FALSE)?>
                </span>
            <? endif;?>
            <ul>
                <li><?='Start Date: '.$course->start_date?></li>
                <li><?='End Date: '.$course->end_date?></li>
                <li><?='Places: '.($course->enrolled_max - $course->enrolled_count)?></li>
            </ul>
            <p><?=$course->short_description?></p>
            </div>
        <? endforeach; else:?>
            <p>Nothing here</p>
        <? endif;?>
    </div>
<? endif;?>
<? endforeach;?>
</div>
<?=form_close()?>

<script type="text/javascript">
$(document).ready(function(){
    $('.area_title').click(function() {
            $(this).next().slideToggle('slow');
            return false;
    }).next().hide();

    $('.filled, .applied').hide();

    $('.hide_irrelevant').click(function(){
        $('.filled, .applied').slideToggle();
    });
});
</script>
