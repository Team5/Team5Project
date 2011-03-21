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
<?=form_open('settings/provider/enroll')?>
<? foreach($courses as $course): ?>
<h3><?=$course->title?></h3>


<? if(count($course->applied) > 0): ?>
<div>
<a href="#" onclick="$('#Applied_<?=$course->cid?>').slideToggle('slow')">List Applied</a>
</div>
<ul class="course_box" id="Applied_<?=$course->cid?>">
    <? foreach($course->applied as $user): ?>
    <li>
        <?=form_checkbox('enroll_users[]',
                          $user->uid.",".$course->cid,
                          False)?>
        <?=$user->fname." ".$user->sname?>
        <?=anchor('/settings/provider/contact_student/'.$user->uid,'Contact this user')?>
    </li>
    <? endforeach;?>
</ul>
<? endif ?>

<? if(count($course->enrolled) > 0): ?>
<div>
<a href="#" onclick="$('#Enrolled_<?=$course->cid?>').slideToggle('slow')">List Enrolled</a>
</div>
<ul class="course_box" id="Enrolled_<?=$course->cid?>">
    <? foreach($course->enrolled as $user): ?>
    <li>
        <?=$user->fname." ".$user->sname?>
        <?=anchor('/settings/provider/contact_student/'.$user->uid,'Contact this user')?>
    </li>
    <? endforeach;?>
    
</ul>
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
        <?=form_textarea(array('name' => 'description', 'cols' => 65), 'Course Description')?>
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

<h2>Contact Students?</h2>
<fieldset>
    <legend>Email Students from a course</legend>
    <?=form_open('settings/provider/email_course')?>

    <fieldset>
        <legend>Course details</legend>
        <label for="course">Course: </label>
        <select name="course">
            <? foreach($courses as $course):?>
                <option value="<?=$course->cid?>"><?=$course->title?></option>
            <? endforeach;?>
        </select>
        <?=form_textarea(array('name' => 'description', 'cols' => 65), 'Course Description')?>
    </fieldset>

    <?=form_submit('Submit', 'add course', 'id="add_course_button"')?>
    <?=validation_errors('<p class="error">')?>
    <?=form_close()?>
</fieldset>


<!--<script language="javascript" type="text/javascript">-->
<script>
$(document).ready(function(){
    $('.course_box').hide();
    
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

    function handle_dates(prefix) {
        var year  = $(prefix+'_year').val();
        var month = $(prefix+'_month').val();
        var newOptions = "";
        for(var i=1; i<=months[month]; i++){
            newOptions += '<option value="'+i+'">'+i+'</option>';
        }
        if(month == 1 && isLeapYear(year)){
            newOptions += '<option value="'+29+'">'+29+'</option>';
        }
        $(prefix+'_day').html(newOptions);
    }

    function handle_start() { handle_dates('#start') }
    function handle_end()   { handle_dates('#end') }

    $('#start_month').change(handle_start);
    $('#start_year').change(handle_start);
    $('#end_month').change(handle_end);
    $('#end_year').change(handle_end);
});
</script>