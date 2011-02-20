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
            <th>applied</th>
            <th>enrolled</th>
        </tr>
        <? if(count($users)>0): $odd=0; foreach($users as $user):?>
        <tr<?=($odd^=1)?' class="odd_row"':''?>>
            <td><input name="selected_tbl[]" value="users" id="checkbox_tbl_1" type="checkbox"/></td>
            <td><?=$user->uid?></td>
            <td><?=$user->type?></td>
            <td><?=$user->area?></td>
            <td><?=$user->email?></td>
            <td><?=$user->fname?></td>
            <td><?=$user->sname?></td>
            <td><?=$user->date_of_birth?></td>
            <td><?=$user->applied?></td>
            <td><?=$user->enrolled?></td> 
        </tr>
        <? endforeach; else:?>
           <td colspan="all">Nothing here</td>
        <? endif;?>
    </table>
</div>    