<h2>Create an account</h2>
<fieldset>
    <legend>Personal Information</legend>
    <?php
    $date = getdate();

    $months = array(
        "January",  "Febuary",  "March",        "April",    "May",      "June",
        "July",     "August",   "September",    "October",  "November", "December"
    );
    $years = range($date['year']-17, $date['year']-110);

    echo form_open('login/create_user');
    echo form_input('fname', set_value('firstname', 'First Name'));
    echo form_input('sname', set_value('surname', 'Surname'));
    echo form_dropdown('dob_day', range(1,31), set_value('dob_day', '1'), 'id="dob_day"');
    echo form_dropdown('dob_month', $months, set_value('dob_months', 'January'), 'id="dob_month"');
    echo form_dropdown('dob_year', $years, set_value('dob_year', '1970'), 'id="dob_year"');
    echo form_input('email', set_value('email','Email address'));
    ?>
</fieldset>
<fieldset>
    <legend>User type</legend>
        <?=form_dropdown('type', array('user', 'provider'), set_value('type', 'Type'), 'id="user_type"')?>
        <?=form_dropdown('area', array('general','science','languages'), set_value('area', 'Area'), 'id="user_area"')?>
</fieldset>
<fieldset>
    <legend>Login Info</legend>
    <?php
    echo form_password('pass', set_value('pass', 'Password'));
    echo form_password('pass2', set_value('pass2', 'Confirm Password'));
    
    echo form_submit('submit', 'Create Account');
    ?>
    <?=form_close()?>
    <?=validation_errors('<p class="error">');?>
</fieldset>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
    $('input').click(function(){
        $(this).val("");
    });

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

    $('#dob_month, #dob_year').change(function(){
        var year  = $('#dob_year').val();
        var month = $('#dob_month').val();
        var newOptions = "";
        for(var i=1; i<=months[month]; i++){
            newOptions += '<option value="'+i+'">'+i+'</option>';
        }
        if(month == 1 && isLeapYear(year)){
            newOptions += '<option value="'+29+'">'+29+'</option>';
        }
        $('#dob_day').html(newOptions);
    });
});
</script>