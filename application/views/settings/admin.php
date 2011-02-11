<fieldset>
    <legend>Add a new User</legend>
    <?php
    echo form_open('admin/new_user');
    echo form_input('name', set_value('name', 'Full Name'));
    echo form_input('email', set_value('email','Email address'));

    echo form_password('pass', set_value('pass', 'Password'));
    echo form_password('pass2', set_value('pass2', 'Confirm Password'));
    
    echo form_submit('submit', 'Create Account');
    echo form_close();
    ?>
    
    <?=validation_errors('<p class="error">');?>
</fieldset>

<h2></h2>
<fieldset>
    <legend>Add a new course</legend>
    <?php
    echo form_open('admin/add_course');
    echo form_input('title', set_value('title', 'Course Name'));
    echo form_input('provider_id', set_value('provider_id','Provider ID'));
    
    echo form_dropdown('area', array('general','science','languages'), set_value('area'));

    //echo form_input('start_date', set_value())

    echo form_textarea('description', 'Course Description');
    
    
    
    echo form_submit('submit', 'Create Account');
    ?>
    
    <?=validation_errors('<p class="error">');?>
</fieldset>