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
$top5_news = $factory_news->get_top5_news();

echo '<pre>';
var_dump($top5_news);
echo '</pre>';