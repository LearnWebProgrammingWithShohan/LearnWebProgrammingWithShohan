<?php include_once 'config/init.php';

$template = new Template('templates/front_page.php');

$template->title = 'Latest Jobs';

echo $template;
