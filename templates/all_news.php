<div class="uk-width-5-6">
    <div uk-grid>
        <?foreach($all_news as $news){?>
            <div class="uk-width-1-3">
                <div class="uk-card uk-card-body uk-card-primary ">
                <?$news->render('one_news.php')?>
                <?$news->elements['user']->render('user_card.php')?>
                <?foreach ($news->elements['rubrics'] as $rubric){
                    $rubric->render('badget_rubric.php');
                }?>
                </div>
            </div>
        <?}?>
    </div>
</div>