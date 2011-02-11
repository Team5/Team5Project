<?php
  // Recieves $news_articles:
  // array(
  //  article(
  //      title  -> string,
  //      author -> string,
  //      publish_datetime -> string,
  //      article_text -> string
  //  ),
  //  article(...),
  //  ...
  // );
  // OR
  // NULL
?>
<table>
    <? if($news_articles!==NULL): $odd=0; foreach($news_articles as $item):?>
    <tr <?=($odd^=1)?'class="odd_row"':''?>>
        <th><?=$item->title?></th>
        <td><?=anchor('news/by_user/'.$item->provider_id, $item->author)?></td>
        <td><?=$item->publish_datetime?></td>
    </tr>
    <tr <?=($odd^=1)?'class="odd_row"':''?>>
        <td colspan="3"><?=$item->article_text?></td>
    </tr>
    <? endforeach; else:?>
    <tr>
        <td>No news today</td>
    </tr>
    <? endif;?>
</table>
<div id="pagination">
<?=$this->pagination->create_links()?>
</div>