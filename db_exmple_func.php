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
                        'sex' => $row['sex'],
                        'healthCondition' => $row['healthCondition'],
                        'testingTimes' => $row['testingTimes'],
                        'city' => $row['city'],
                        'testDate' => $row['testDate'],
                        'healDate' => $row['healDate']
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



// פונקציה ליצירת דטא בייס
function create_new_db($db)
{

    // פתיחת קשר עם הדטא בייס
    $con = mysqli_connect('localhost', 'root', '');

    // בדיקה האם התחבר בהצלחה
    if (mysqli_connect_errno()) {
        echo "Failed to connect to thr sql:" . mysqli_connect_error() . "</br>";
    }
    // פקודת יצירה
    $command = "CREATE DATABASE " . $db;

    // יצירת דטה בייס חדש
    if (mysqli_query($con, $command)) {
        echo "Database created successfully ! </br>";
    } else {
        echo "Error creating database:" . mysqli_error($con) . "</br>";
    }
    // סגירת הדטא בייס
    mysqli_close($con);
}


// מחיקת דטה בייס
function drop_db($db)
{

    // פתיחת קשר עם הדטא בייס
    $con = mysqli_connect('localhost', 'root', '');

    // בדיקה האם התחבר בהצלחה
    if (mysqli_connect_errno()) {
        echo "Failed to connect to thr sql:" . mysqli_connect_error() . "</br>";
    }
    // פקודת יצירה
    $command = "DROP DATABASE " . $db;

    // יצירת דטה בייס חדש
    if (mysqli_query($con, $command)) {
        echo "Database droped successfully ! </br>";
    } else {
        echo "Error droped database:" . mysqli_error($con) . "</br>";
    }
    // סגירת הדטא בייס
    mysqli_close($con);
}

// יצירת שולחן
function create_new_table($table)
{


    $con = corona_db_connect();
    if ($con) {

        // פקודת יצירה
        $command = "CREATE TABLE " . $table . " ( id INT PRIMARY KEY )";

        // יצירת דטה בייס חדש
        if (mysqli_query($con, $command)) {
            echo "table created successfully ! </br>";
        } else {
            echo "Error created table:" . mysqli_error($con) . "</br>";
        }


        // סגירת הדטא בייס
        mysqli_close($con);
    }
}

// מחיקת שולחן
function drop_table($table)
{
    $con = corona_db_connect();
    if ($con) {

        // פקודת יצירה
        $command = "DROP TABLE " . $table;


        // יצירת דטה בייס חדש
        if (mysqli_query($con, $command)) {
            echo "table droped successfully ! </br>";
        } else {
            echo "Error droped table:" . mysqli_error($con) . "</br>";
        }

        // סגירת הדטא בייס
        mysqli_close($con);
    }
}

// הוספת עמודה בטבלה
function insert_culomn($table, $culomn_name, $culomn_type)
{
    //if(!is_table_exist($con)){return;}
    $con = corona_db_connect();
    if ($con) {

        // פקודת יצירה
        $command = "ALTER TABLE " . $table . " ADD " . $culomn_name . " " . $culomn_type;


        // יצירת דטה בייס חדש
        if (mysqli_query($con, $command)) {
            echo "culomn created successfully ! </br>";
        } else {
            echo "Error created culomn:" . mysqli_error($con) . "</br>";
        }

        // סגירת הדטא בייס
        mysqli_close($con);
    }
}


// מחירת עמודה בטבלה
function drop_culomn($table, $culomn_name)
{

    //if(!is_table_exist($con)){return;}

    $con = corona_db_connect();
    if ($con) {

        // פקודת יצירה
        $command = "ALTER TABLE " . $table . " DROP " . $culomn_name;


        // יצירת דטה בייס חדש
        if (mysqli_query($con, $command)) {
            echo "culomn droped successfully ! </br>";
        } else {
            echo "Error droped culomn:" . mysqli_error($con) . "</br>";
        }

        // סגירת הדטא בייס
        mysqli_close($con);
    }
}


// הוספת אדם חדש לטבלה
function insert_new_man($data_values)
{
    $man_id = 'man_id';
    $age = 'age';
    $gender = 'gender';
    $team = 'team';
    $tests = '0';
    $health_condition = 'healthy';
    

    if (!is_id_exist($data_values['id'])) {
        $con = corona_db_connect();
        if ($con) {
            $command = "INSERT INTO  people VALUES(id,age, gender, tests, health condition,team	) ( '$data_values[$man_id]', '$data_values[$age]', '$data_values[$gender]', '$tests', '$health_condition', '$team' )";


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

// עדכון אדם קיים לטבלה
function update_man($id, $data_arr)
{

    if (is_id_exist($id)) {
        $con = corona_db_connect();
        if ($con) {
            foreach( $data_arr as $key => $value ){

                $command = "UPDATE  people SET $key='$value' WHERE id='$id'";


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


function get_all_data()
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
                        'sex' => $row['sex'],
                        'healthCondition' => $row['healthCondition'],
                        'testingTimes' => $row['testingTimes'],
                        'city' => $row['city'],
                        'testDate' => $row['testDate'],
                        'healDate' => $row['healDate']
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

