<div class="uk-width-1-6">
    <ul class="uk-list uk-list-divider">
        <?foreach($all_rubrics as $rubric){?>
            <li class="">
                <?$rubric->render('one_rubric.php')?>
            </li>
        <?}?>
    </ul>
</div>