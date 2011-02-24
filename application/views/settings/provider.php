<?php
 /**
  * settings/provider View
  *
  * Provides options for the provider, add course, enroll user
  *
  * @todo Should fit it's description
  * @param Array $users Array of users applied to courses belonging to this
  *     provider
  * @param Array $courses Array of course belonging to this provider
  * 
  */
?>
<table>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Enroll?</th>
    </tr>
    <? foreach($users as $user): ?>
    <tr>
        <td><?=$user->name?></td>
        <td><?=$user->email?></td>
        <td><?=form_checkbox()?></td>
    </tr>
    <? endforeach;?>
</table>