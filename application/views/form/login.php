<?php
$email_input = array('name'=>'email', 'id'=>'email', 'value' => set_value('email'));
$pass_input = array('name'=>'pass', 'id'=>'pass');
?>

<div id="login_form">
    <?=form_open('login/validate_credentials')?>
    
        <?=form_input($email_input)?>
        
        <?=form_password($pass_input)?>
        
        <?=form_submit('submit', 'Login')?>
        
        <?=anchor('login/register', 'Register')?>
        
    <?=form_close()?>
    
</div>
