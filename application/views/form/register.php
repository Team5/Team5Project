<h2>Create an account</h2>
<fieldset>
    <legend>Personal Information</legend>
    <?php
    echo form_open('login/create_user');
    echo form_input('name', set_value('name', 'Full Name'));
    echo form_input('email', set_value('email','Email address'));
    ?>
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