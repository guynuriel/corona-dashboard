<?php


include_once 'DB.php';
$daily = get_all_daily();
$people = get_all_people();
$dates = get_all_dates();
$allData = [
    'people' => $people,
    'dates' => $dates,
    'daily' => $daily
];

echo json_encode($allData);

?>
