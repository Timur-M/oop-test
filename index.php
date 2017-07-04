<?php
include 'db.php';

spl_autoload_register(function ($class) {
    if (is_file('entities/'. $class . '.php')) include 'entities/' . $class . '.php';
    if (is_file('factories/'. $class . '.php')) include 'factories/' . $class . '.php';
});


db::set_instance();
$full_url = urldecode(htmlspecialchars(ltrim($_SERVER['REQUEST_URI'],"/")));
$x_url = explode("/", $full_url);


// - client code


$factory_rubrics = new Factory_rubrics();
$factory_news = new Factory_news();
$template = new Template();



$all_rubrics = $factory_rubrics->get_all_rubrics();


if ($x_url[0] == ''){
    $all_news = $factory_news->get_all_news();
    $template->render('header.php');
    $template->render('all_rubrics.php',array('all_rubrics'=>$all_rubrics));
    $template->render('all_news.php',array('all_news'=>$all_news));
    $template->render('footer.php');
}

if ($x_url[0] == 'news'){
    $template->render('header.php');
    $one_news = $factory_news->get_one_news($x_url[1]);
    $template->render('all_rubrics.php',array('all_rubrics'=>$all_rubrics));
    $template->render('news_page.php',array('one_news'=>$one_news));
    $template->render('footer.php');
}

if ($x_url[0] == 'rubric'){
    $template->render('header.php');
    $all_news_in_rubric = $factory_news->get_all_news_in_rubric($x_url[1]);
    $template->render('all_rubrics.php',array('all_rubrics'=>$all_rubrics));
    $template->render('all_news.php',array('all_news'=>$all_news_in_rubric));
    $template->render('footer.php');
}








