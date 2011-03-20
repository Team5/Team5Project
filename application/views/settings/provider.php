<?php
 /**
  * settings/provider View
  *
  * Provides options for the provider, add course, enroll user
  *
  * @param Array $courses Array of course belonging to this provider
  * 
  */
?>
<? foreach($courses as $course): ?>
<h3><?=$course->title?></h3>
<?=form_open('settings/provider/enroll')?>
<? if(count($course->applied) > 0): ?>
<a href="#" onclick="$('#Applied_<?=$course->cid?>').slideToggle('slow')" colspan="3">List Applied</a>
<table id="Applied_<?=$course->cid?>">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Enroll?</th>
        </tr>
    </thead>
    <tbody>
    <? foreach($course->applied as $user): ?>
    <tr>
        <td><?=$user->fname." ".$user->sname?></td>
        <td><?=$user->email?></td>
        <td><?=form_checkbox('enroll_users[]',
                             $user->uid.",".$course->cid,
                             False)?></td>
    </tr>
    <? endforeach;?>
    </tbody>
    </table>
<? endif ?>

<? if(count($course->enrolled) > 0): ?>
<a href="#" onclick="$('#Enrolled_<?=$course->cid?>').slideToggle('slow')" colspan="2">List Enrolled</a>
<table id="Enrolled_<?=$course->cid?>">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
    <? foreach($course->enrolled as $user): ?>
    <tr>
        <td><?=$user->fname." ".$user->sname?></td>
        <td><?=$user->email?></td>
    </tr>
    <? endforeach;?>
    </tbody>
</table>
<? endif; ?>
<? endforeach;?>

<?=form_submit('Submit', 'enroll', 'id="enroll_button"')?>
<?=form_close()?>

<h2>Add new course?</h2>
<fieldset>
    <legend>Add a new course</legend>
    <?=form_open('settings/provider/add_course')?>

    <fieldset>
        <legend>Course details</legend>
        <?=form_input('title', set_value('title', 'Course Name'))?>

        <?=form_input('rid', set_value('rid', 'Room ID'))?>

        <?=form_dropdown('area', array('arts', 'business', 'science', 'medicine'), set_value('area'))?>

        <?=form_textarea('description', 'Course Description')?>
        
    </fieldset>

    <fieldset>
        <label>Course dates</label>
    <?php
    
    $months = array(
        "January",  "Febuary",  "March",        "April",    "May",      "June",
        "July",     "August",   "September",    "October",  "November", "December"
    );
    $date = getdate();
    $years = range($date['year'], $date['year']+1);
    ?>
    <br/>Start-date:<br/>
    <?=form_dropdown('start_day', range(1,31), set_value('start_day', '1'), 'id="start_day"')?>
    <?=form_dropdown('start_month', $months, set_value('start_months', 'January'), 'id="start_month"')?>
    <?=form_dropdown('start_year', $years, set_value('start_year', '1'), 'id="start_year"')?>
    
    <br/>End-date:<br/>
    <?=form_dropdown('end_day', range(1,31), set_value('end_day', '1'), 'id="end_day"')?>
    <?=form_dropdown('end_month', $months, set_value('end_months', 'January'), 'id="end_month"')?>
    <?=form_dropdown('end_year', $years, set_value('end_year', '1'), 'id="end_year"')?>
    </fieldset>
    <?=form_submit('Submit', 'add course', 'id="add_course_button"')?>

    <?=validation_errors('<p class="error">')?>

    <?=form_close()?>

</fieldset>

<script language="javascript " type="application/x-javascript">
$(document).ready(function(){
    $('table').hide();

    /*$('input').click(function(){
        $(this).val("");
    });*/

    months = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    function isLeapYear(year){
        year = <?=$date['year']-17?> - year;
        if(year % 400 == 0){
            return true;
        } else if(year % 100 == 0){
            return false;
        } else if(year % 4 == 0){
            return true;
        } else {
            return false;
        }
    }

    var se = ['#start', '#end'];
    
    for(var i=0; i<2; i++) {
        $(se[i]+'_month', se[i]+'_year').change(function(){
    
            var year  = $(se[i]+'_year').val();
            var month = $(se[i]+'_month').val();
            var newOptions = "";
            for(var i=1; i<=months[month]; i++){
                newOptions += '<option value="'+i+'">'+i+'</option>';
            }
            if(month == 1 && isLeapYear(year)){
                newOptions += '<option value="'+29+'">'+29+'</option>';
            }
            $(se[i]+'_day').html(newOptions);
        });
    }
});
</script>