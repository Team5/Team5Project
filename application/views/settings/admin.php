<fieldset>
    <legend>Add a new User</legend>
    <fieldset>
        <legend>User</legend>
        <?=form_open('settings/admin/user')?>

        <?=form_input('uid', set_value('uid', ''), 'id="user_uid"')?>

        <?=form_input('name', set_value('name', 'Full Name'), 'id="user_name"')?>

        <?=form_input('email', set_value('email','Email address'), 'id="user_email"')?>
        
    </fieldset>
    <fieldset>
        <legend>Type</legend>
        <?=form_dropdown('type', array('user', 'provider'), set_value('type', 'Type'), 'id="user_type"')?>

        <?=form_dropdown('area', array('general','science','languages'), set_value('area', 'Area'), 'id="user_area"')?>

    </fieldset>
    <fieldset>
        <legend>Password</legend>
        <?=form_password('pass', set_value('pass', 'Password'), 'id="user_pass"')?>

    </fieldset>
    <fieldset>
        <legend>Task</legend>
        <?=form_dropdown('task', array('add', 'update', 'delete'), set_value('task', 'add'), 'id="user_task"')?>

        <?=form_submit('submit', 'fire', 'id="user_submit"')?>

        <div id="user_outcome">
        </div>
        <?=validation_errors('<p class="error">')?>

        <?=form_close()?>

    </fieldset>
</fieldset>

<h2>Courses</h2>
<fieldset>
    <legend>Add a new course</legend>
    <?=form_open('admin/course')?>

    <fieldset>
        <legend>Course details</legend>
        <?=form_input('title', set_value('title', 'Course Name'))?>

        <?=form_input('provider_id', set_value('provider_id', 'Provider ID'))?>


        <?=form_dropdown('area', array('general','science','languages'), set_value('area'))?>

        <?=form_textarea('description', 'Course Description')?>
    </fieldset>
    <fieldset>
        <legend>Task</legend>
        <?=form_dropdown('task', array('add', 'update', 'delete'), set_value('task', 'add'))?>

        <?=form_submit('submit', 'Run')?>

        <?=validation_errors('<p class="error">')?>
        
        <?=form_close()?>
        
    </fieldset>
</fieldset>