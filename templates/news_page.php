<div class="uk-width-5-6">
    <?$one_news->render('one_news.php')?>
    <?$one_news->elements['user']->render('user_card.php')?>
    <ul>
        <?foreach($one_news->elements['rubrics'] as $rubric){
            $rubric->render('rubric_set.php');
        }?>
    </ul>
</div>