<div class="uk-width-5-6">
    <?$render['news']->render('one_news.php')?>
    <?$render['user']->render('user_card.php')?>
    <ul>
        <?foreach($render['rubrics'] as $rubric){
            $rubric->render('rubric_set.php');
        }?>
    </ul>
</div>