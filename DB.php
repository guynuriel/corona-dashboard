<?php

use function PHPSTORM_META\map;

function corona_db_connect()
{

    // פתיחת קשר עם הדטא בייס
    $con = mysqli_connect('localhost', 'root', '');

    // בדיקה האם התחבר בהצלחה
    if (mysqli_connect_errno()) {
        echo "Failed to connect to thr sql:" . mysqli_connect_error() . "</br>";
        return false;
    }

    // בחירת דטה בייס בו יעשו שינויים
    if (!(mysqli_select_db($con, 'corona'))) {
        echo "not succeed select bank";
        mysqli_close($con);
        return false;
    };

    return $con;
}


function is_id_exist($id)
{
    $con = corona_db_connect();
    if ($con) {


        $command = "SELECT id FROM people WHERE id='$id'";
        $result = mysqli_query($con, $command);

        if ($result) {
            if (mysqli_fetch_array($result)) {

                mysqli_close($con);
                return true;
            }
        }

        mysqli_close($con);
        return false;
    }
}


function get_man($id)
{
    if (is_id_exist($id)) {

        $con = corona_db_connect();
        if ($con) {



            $command = "SELECT * FROM people WHERE id='$id' ";
            $result = mysqli_query($con, $command);

            $new_man = null;
            if ($result) {
                $row = mysqli_fetch_array($result);

                if ($row) {
                    $new_man =
                    [
                        'id' => $row['id'],
                        'age' => $row['age'],
                        'gender' => $row['gender'],
                        'health_condition' => $row['health_condition'],
                        'tests' => $row['tests'],
                        'team' => $row['team'],
                        'place' => $row['place'],
                        'infection_area' => $row['infection_area']
                    ];
                    return $new_man;
                }
            } 
            else {
                echo "Error get man data:" . mysqli_error($con) . "</br>";
            }

            mysqli_close($con);
            return false;
        }
    }
}



// הוספת אדם חדש לטבלה
function insert_new_man($data_values)
{
    $man_id = 'man_id';
    $age = 'age';
    $gender = 'gender';
    $team = 'team';
    $tests = 0;
    $health_condition = 'healthy';
    

    if (!is_id_exist($data_values['man_id'])) {
        $con = corona_db_connect();
        if ($con) {
            $command = "INSERT INTO  people ( id, age, gender, tests, health_condition, team ) VALUES ( '$data_values[$man_id]', '$data_values[$age]', '$data_values[$gender]', '$tests', '$health_condition', '$data_values[$team]' )";


            if (mysqli_query($con, $command)) {
                echo "new man created successfully ! </br>";
            } else {
                echo "Error created new man:" . mysqli_error($con) . "</br>";
            }

            mysqli_close($con);
        }
    } else {
        echo "Error created new man: id = $man_id is all ready exist !</br>";
    }
}



// הוספת תאריך חדש לטבלה
function insert_new_date($data_values)
{
    $man_id = 'id';
    $date = 'date';
    $action = 'action';
    $new_sick = 'is_new_sick';
    $new_recover = 'is_new_recover';

    

    if (is_id_exist($data_values['id'])) {
        $con = corona_db_connect();
        if ($con) {
            $command = "INSERT INTO  dates VALUES ( '$data_values[$man_id]', '$data_values[$date]', '$data_values[$action]','$data_values[$new_sick]', '$data_values[$new_recover]')";

            if (mysqli_query($con, $command)) {
                echo "new date created successfully ! </br>";
            } else {
                echo "Error created new date:" . mysqli_error($con) . "</br>";
            }

            mysqli_close($con);
        }
    } else {
        echo "Error created new date: id = $man_id is not exist !</br>";
    }
}

function insert_new_daily($data_values)
{
    $date = 'date';
    $tests = 'tests';
    $sum_sick = 'sum_sick';
    $new_sick = 'new_sick';
    $new_recover = 'new_recover';
    $hards = 'hards';
    $critical = 'critical';
    $respiratory = 'respiratory';
    $deads = 'deads';
    
    $con = corona_db_connect();
    if ($con) {
        $command = "INSERT INTO  daily VALUES ( '$data_values[$date]', '$data_values[$tests]', '$data_values[$sum_sick]', '$data_values[$new_sick]', '$data_values[$new_recover]', '$data_values[$hards]', '$data_values[$respiratory]', '$data_values[$deads]','$data_values[$critical]' )";


        if (mysqli_query($con, $command)) {
            echo "new daily successfully ! </br>";
        } else {
            echo "Error created new daily:" . mysqli_error($con) . "</br>";
        }

        mysqli_close($con);
    }
    
}

// עדכון אדם קיים לטבלה
function update_man($id, $data_arr, $table="people")
{

    if (is_id_exist($id)) {
        $con = corona_db_connect();
        if ($con) {
            foreach( $data_arr as $key => $value ){

                $command = "UPDATE  $table SET $key='$value' WHERE id='$id'";


                if (mysqli_query($con, $command)) {
                } 
                else {
                    echo "Error updated man, id =$id :" . mysqli_error($con) . "</br>";
                    mysqli_close($con);
                    return;
                }
            }
            // סגירת הדטא בייס
            mysqli_close($con);
            echo "man, id = $id updated successfully ! </br>";
        }
    } else {
        echo "no id exist ! </br>";
    }
}


// מחיקת אדם קיים לטבלה
function delete_man($id)
{

    if (is_id_exist($id)) {
        $con = corona_db_connect();
        if ($con) {

            $command = "DELETE FROM people WHERE id='$id'";


            if (mysqli_query($con, $command)) {
                echo "man, id = $id Deleted successfully ! </br>";
            } else {
                echo "Error deleted man, id =$id :" . mysqli_error($con) . "</br>";
            }

            // סגירת הדטא בייס
            mysqli_close($con);
        }
    } else {
        echo "no id exist ! </br>";
    }
}

function get_all_people()
{

    //if(!is_table_exist()){return;}

    $con = corona_db_connect();
    if ($con) {



        $command = "SELECT * FROM people";
        $result = mysqli_query($con, $command);

        $mans=[];
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row) {
                    $man=
                    [
                        'id' => $row['id'],
                        'age' => $row['age'],
                        'gender' => $row['gender'],
                        'health_condition' => $row['health_condition'],
                        'infection_area' => $row['infection_area'],
                        'team' => $row['team'],
                        'place' => $row['place'],
                    ];
                    $mans[] = $man;
                    
                }
            }
        } else {
            echo "Error get all data:" . mysqli_error($con) . "</br>";
        }

        // סגירת הדטא בייס
        mysqli_close($con);
        return $mans;
    }
}

function get_all_dates()
{

    //if(!is_table_exist()){return;}

    $con = corona_db_connect();
    if ($con) {



        $command = "SELECT * FROM dates";
        $result = mysqli_query($con, $command);

        $dates=[];
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row) {
                    $date=
                    [
                        'id' => $row['people_id'],
                        'date' => $row['date'],
                        'action' => $row['action'],
                        'is_new_sick' => $row['is_new_sick'],
                        'is_new_recover' => $row['is_new_recover']
                    ];
                    $dates[] = $date;
                    
                }
            }
        } else {
            echo "Error get all data:" . mysqli_error($con) . "</br>";
        }

        // סגירת הדטא בייס
        mysqli_close($con);
        return $dates;
    }
}


function get_all_daily()
{

    //if(!is_table_exist()){return;}

    $con = corona_db_connect();
    if ($con) {



        $command = "SELECT * FROM daily";
        $result = mysqli_query($con, $command);

        $all_daily=[];
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row) {
                    $daily=
                    [
                        'date' => $row['date'],
                        'tests' => $row['tests'],
                        'sum_sick' => $row['sum_sick'],
                        'new_sick' => $row['new_sick'],
                        'new_recover' => $row['new_recover'],
                        'hards' => $row['hards'],
                        'critical' => $row['critical'],
                        'respiratory' => $row['respiratory'],
                        'deads' => $row['deads'],
                    ];
                    $all_daily[] = $daily;
                    
                }
            }
        } else {
            echo "Error get all daily:" . mysqli_error($con) . "</br>";
        }

        // סגירת הדטא בייס
        mysqli_close($con);
        return $all_daily;
    }
}

?>