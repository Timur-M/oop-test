<?php
include 'db.php';

spl_autoload_register(function ($class) {
    if (is_file('entities/'. $class . '.php')) include 'entities/' . $class . '.php';
    if (is_file('factories/'. $class . '.php')) include 'factories/' . $class . '.php';
});


db::set_instance();

$registry = new ArrayObject();

$registry['factory_users'] = new Factory_users();
$registry['factory_comments'] = new Factory_comments();
$registry['factory_rubrics'] = new Factory_rubrics();

$factory_news = new Factory_news($registry);
$template = new Template();

$full_url = urldecode(htmlspecialchars(ltrim($_SERVER['REQUEST_URI'],"/")));
$x_url = explode("/", $full_url);

$all_rubrics = $registry['factory_rubrics']->get_all_rubrics();


if ($x_url[0] == ''){
    $top5_news = $factory_news->get_all_news();
    $template->render(NULL,'header.php');
    $template->render($all_rubrics,'all_rubrics.php');
    $template->render($top5_news,'all_news.php');
    $template->render(NULL,'footer.php');
}

if ($x_url[0] == 'news'){
    $template->render(NULL,'header.php');
    $one_news = $factory_news->get_one_news($x_url[1]);
    $template->render($all_rubrics,'all_rubrics.php');
    $template->render($one_news,'news_page.php');
    $template->render(NULL,'footer.php');
}

if ($x_url[0] == 'rubric'){
    $template->render(NULL,'header.php');
    $all_news_in_rubric = $factory_news->get_all_news_in_rubric($x_url[1]);
    $template->render($all_rubrics,'all_rubrics.php');
    $template->render($all_news_in_rubric,'all_news.php');
    $template->render(NULL,'footer.php');
}