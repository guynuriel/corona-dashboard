<?php

include_once '../DB.php';

class AddDay extends DB
{
    private $date;

    public function __construct($date){
        $this->date = $date;
    }
    
    public function __destruct()
    {
        $date = $this->date;
        $daily = $this->get_all_daily();
        $people = $this->get_all_people();
        $dates = $this->get_all_dates();

        foreach ($daily as $day) {

            if ($day['date'] == $date) {

                echo 'this day all ready sync in the system';
                break;
            }

        }

        $tests = 0;
        $sum_sick = 0;
        $new_sick = 0;
        $new_recover = 0;
        $hards = 0;
        $critical = 0;
        $respiratory = 0;
        $deads = 0;

        foreach ($people as $man) {

            if ($man['health_condition'] == "hard") {
                $hards += 1;
            }
            if ($man['health_condition'] == "critical") {
                $critical += 1;
            }
            if ($man['health_condition'] == "respiratory") {
                $respiratory += 1;
            }
            if ($man['health_condition'] !== "healthy" && $man['health_condition'] !== "dead" && $man['health_condition'] !== "recover") {
                $sum_sick += 1;
            }
            if ($man['health_condition'] == "dead") {
                $deads += 1;
            }

        }

        foreach ($dates as $d) {

            if ($d['date'] == $date) {

                if ($d['is_new_sick'] == 't') {
                    $new_sick += 1;
                }

                if ($d['is_new_recover'] == 't') {
                    $new_recover += 1;
                }

            }

            if ($d['date'] == $date && $d['action'] == 'test') {
                $tests += 1;
            }

        }

        $data_values = [
            'date' => $date,
            'tests' => $tests,
            'sum_sick' => $sum_sick,
            'new_sick' => $new_sick,
            'new_recover' => $new_recover,
            'hards' => $hards,
            'critical' => $critical,
            'respiratory' => $respiratory,
            'deads' => $deads,
        ];

        $this->insert_new_daily($data_values);
    }

}

?>





<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['add_day'])) {
    $addDay = new AddDay($_POST['date']);
    echo 'יום התווסף בהצלחה';
} else {echo '
        <form action="add_day.php" method="post">
            <input type="date" name="date" required/>
            <input type="submit" name="add_day" value="GO" />
        </form>';
}

?>