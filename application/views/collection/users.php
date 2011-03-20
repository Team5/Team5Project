<?php
 /**
  * collection/users View
  *
  * Receives list of users, presents them and actions for user to perform on
  *     selected users
  *
  * @todo different users make use of this page in different ways
  *     admin     must be able to accept providers+delete+update from this page
  * @param Array $users Array of user objects
  *
  */
?>
<h2>Users</h2>
<div id="users">
    <table>
        <tr>
            <th>selected</th>
            <th>uid</th>
            <th>type</th>
            <th>area</th>
            <th>email</th>
            <th>fname</th>
            <th>sname</th>
            <th>date_of_birth</th>
        </tr>
        <? if(count($users)>0): $odd=0; foreach($users as $user):?>
        <tr<?=($odd^=1)?' class="odd_row"':''?>>
            <td><input name="selected_users[]" value=$user->uid type="checkbox"/></td>
            <td><?=$user->uid?></td>
            <td><?=$user->type?></td>
            <td><?=$user->area?></td>
            <td><?=$user->email?></td>
            <td><?=$user->fname?></td>
            <td><?=$user->sname?></td>
            <td><?=$user->date_of_birth?></td>
        </tr>
        <? endforeach; else:?>
           <td colspan="all">Nothing here</td>
        <? endif;?>
    </table>
</div>    