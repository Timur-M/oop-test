<div class="uk-width-1-6">
    <ul class="">
        <?foreach($render as $rubric){?>
            <li class="">
                <?$rubric->render('one_rubric.php')?>
            </li>
        <?}?>
    </ul>
</div>