<?php
 /**
  * form/contact View
  *
  * Receives list of users, presents them and actions for user to perform on
  *     selected users
  *
  * @todo Should we have this at all?
  *
  */
?>
<div id="contact_form">
    <h1>Contact Us!</h1>
    <?php
    echo form_open('contact/submit', 'id="contact_form"');
    echo form_input('name', 'Name', 'id="name"');
    echo form_input('email', 'Email', 'id="email"');
    $data = array(
        'name'=>'message',
        'cols'=>30,
        'rows'=>15
    );
    echo form_textarea($data, 'Message', 'id="message"');
    echo form_submit('submit', 'Submit', 'id="submit"');
    echo form_close();
    ?>
</div>
<script language="javascript " type="application/x-javascript">
$('#submit').click(function(){
    
    var name = $('#name').val();
    
    if(!name || name == 'Name'){
        alert('Please enter your name.');
        return false;
    }
    
    var form_data = {
        name:    $('#name').val(),
        email:   $('#email').val(),
        message: $('#message').val(),
        ajax:    '1'
    };
    
    $.ajax({
        url:     '<?=site_url('contact/submit');?>',
        type:    'POST',
        data:    form_data,
        success: function(msg){
            alert(msg);
        }
    });
    
    return false;
});
</script>