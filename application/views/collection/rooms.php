<h2>Rooms</h2>
<div id="rooms">
    <table>
        <tr>
            <th>selected</th>
            <th>rid</th>
            <th>title</th>
            <th>facilities</th>
        </tr>
        <? if(count($rooms)>0): $odd=0; foreach($rooms as $room):?>
        <tr<?=($odd^=1)?' class="odd_row"':''?>>
            <td><input name="selected_tbl[]" value="rooms" id="checkbox_tbl_1" type="checkbox"/></td>
            <td><?=$room->room_id?></td>
            <td><?=$room->title?></td>
            <td><?=$room->facilities?></td>
        </tr>
        <? endforeach; else:?>
           <td colspan="all">Nothing here</td>
        <? endif;?>
    </table>
</div>    