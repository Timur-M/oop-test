<div class="uk-width-5-6">
    <h1><?=$one_news['header']?></h1>
    <div class=""><?=$one_news['date_create']?> <?$one_news['elements']['user']->render('user_card.php')?></div>

    <div class="">
        <?foreach($one_news['elements']['rubrics'] as $rubric){
            $rubric->render('badget_rubric.php');
        }?>
    </div>

    <hr>

    <div class=""><?=$one_news['anons']?></div>
</div>