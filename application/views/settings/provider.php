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
<h2><?=$course->title?></h2>
<h2>Applied</h2>
<?=form_open('settings/provider/enroll')?>
<? if(count($course->applied) > 0): ?>
<table>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Enroll?</th>
    </tr>

    <? foreach($course->applied as $user): ?>
    <tr>
        <td><?=$user->fname." ".$user->sname?></td>
        <td><?=$user->email?></td>
        <td><?=form_checkbox('enroll_users[]',
                             $user->uid.",".$course->cid,
                             False)?></td>
    </tr>
    <? endforeach;?>
<? else: ?>
<p>No users awaiting confirmation of enrollment for this course at the moment</p>
<? endif ?>
</table>

<h2>Enrolled</h2>
<? if(count($course->enrolled) > 0): ?>
<table>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
    </tr>
    <? foreach($course->enrolled as $user): ?>
    <tr>
        <td><?=$user->fname." ".$user->sname?></td>
        <td><?=$user->email?></td>
    </tr>
    <? endforeach;?>
</table>
<? else: ?>
<p>No users accepted as enrolled in this course at the moment</p>
<? endif; ?>
<? endforeach;?>

<?=form_submit('Submit', 'enroll', 'id="enroll_button"')?>
<?=form_close()?>


<!--<script language="javascript " type="application/x-javascript">
$('#enroll_button').click(function(){

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
        url:     '<?=site_url('settings/provider/apply');?>',
        type:    'POST',
        data:    form_data,
        success: function(msg){
            alert(msg);
        }
    });

    return false;
});
</script>-->