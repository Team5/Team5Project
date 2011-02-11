<h2>Courses</h2>
<?=form_open()?>
<button name="submit" id="submit" value="submit" type="button" >Apply to selected Courses</button>

<? foreach($courses as $area => $courses_in_area):?>
    <h2 onclick="$('#<?=$area?>').slideToggle();"><?=$area?></h2>
    
    <div class="course_box" id="<?=$area?>">
    <table>
        <thead>
        <tr>
            <th>Selected</th>
            <th>Course_id</th>
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
        <tr<?=($odd^=1)?' class="odd_row"':''?>>
            <td><?=form_checkbox("select[{$course->area},{$course->course_id}]", "selected{$course->area}", FALSE)?></td>
            <th><?=$course->course_id?></th>
            <td><?=anchor('courses/by_id/'.$course->course_id, $course->short_title)?></td>
            <td><?=$course->title?></td>
            <td><?=anchor('courses/by_area/'.$course->area, $course->area)?></td>
            <td><?=$course->description?></td>
            <td><?=$course->start_date?></td>
            <td><?=$course->end_date?></td>
            <td><?=$course->enrolled_count?></td>
            <td><?=$course->enrolled_max?></td>
        </tr>
       
        <? endforeach; else:?>
           <td colspan="all">Nothing here</td>
        <? endif;?>
        </tbody>
    </table>
    </div>
    
<? endforeach;?>
<?=form_close()?>
<script type="text/javascript">
$(document).ready(function(){
    $('.course_box').hide()
});
</script>
