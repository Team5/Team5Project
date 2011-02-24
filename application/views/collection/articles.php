<?php
 /**
  * collection/articles View
  *
  * Receives list of articles, presents them.
  *
  * @todo different users make use of this page in different ways
  *     admin     must be able to delete+update from this page
  *     providers must be able to delete+update their own articles from this page
  * @param Array $news_articles article objects
  *
  */
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