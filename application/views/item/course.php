<table>
    <tr>
        <th>ShortName</th>
        <th>Area</th>
        <th>Description</th>
        <th>StartDate</th>
        <th>EndDate</th>
        <th>Price</th>
    </tr>
<? if(isset($course)): ?>
    <h2><?=$course->title?></h2>
    <tr class="odd_row">
        <td><?=$course->title?></td>
        <td><?=anchor('courses/by_area/'.$course->area, $course->area)?></td>
        <td><?=str_replace("\n","<br/>", $course->description)?></td>
        <td><?=$course->start_date?></td>
        <td><?=$course->end_date?></td>
        <td id="price"></td>
    </tr>
<? else:?>
    <tr>
        <td colspan="6">No course here</td>
    </tr>
<? endif;?>
</table>

<script type="text/javascript">
    var td = document.getElementById('price');
    var price = <?=$course->price?>;

    var euro   = price / 100;
    var change = price % 100;

    td.innerHTML = "&euro;" + (euro + change/100).toFixed(2);
</script>