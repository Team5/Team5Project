<h2>Rooms</h2>
<div id="rooms">
    <table>
        <tr>
            <th>selected</th>
            <th>rid</th>
            <th>name</th>
            <th>building</th>
            <th>chairs</th>
            <th>computers</th>
            <th>projector</th>
            <th>wheelchair</th>
            <th>printers</th>
            <th>wireless</th>
        </tr>
        <? if(count($rooms)>0): $odd=0; foreach($rooms as $room):?>
        <tr<?=($odd^=1)?' class="odd_row"':''?>>
            <td><input name="selected_tbl[]" value="rooms" id="checkbox_tbl_1" type="checkbox"/></td>
            <td><?=$room->rid?></td>
            <td><?=$room->name?></td>
            <td><?=$room->building?></td>
            <td><?=$room->chairs?></td>
            <td><?=$room->computers?></td>
            <td><?=$room->projector?></td>
            <td><?=$room->wheelchair?></td>
            <td><?=$room->printer?></td>
            <td><?=$room->wireless?></td>
        </tr>
        <? endforeach; else:?>
           <td colspan="all">Nothing here</td>
        <? endif;?>
    </table>
</div>    