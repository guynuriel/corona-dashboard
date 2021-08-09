<?php


include_once 'DB.php';

$daily = $DB->get_all_daily();
$people = $DB->get_all_people();
$dates = $DB->get_all_dates();
$allData = [
    'people' => $people,
    'dates' => $dates,
    'daily' => $daily
];

echo json_encode($allData);

?>
