
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