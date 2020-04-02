<?php include_once 'config/init.php';

$job = new Job;

$template = new Template('templates/front_page.php');

$template->title = 'Latest Jobs';
$template->jobs = $job->getAllJobs();

echo $template;
