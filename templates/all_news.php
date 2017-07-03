<div class="uk-width-5-6">
    <?foreach($render as $news){?>
        <div class="">
            <?$news['news']->render('one_news.php')?>
            <?$news['user']->render('user_card.php')?>
        </div>
    <?}?>
</div>