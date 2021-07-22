<?php

include_once '../DB.php';


$update_id = isset($_POST['update_id']) ? $_POST['update_id'] : null;;


if ($update_id) {

    if (is_id_exist($update_id)) {
        switch($_POST['form']){
            case '1':
                $update_man =
                [
                    'id' => $_POST['update_id'],
                    'age' => $_POST['age'],
                    'gender' => $_POST['gender'],
                    'team' => $_POST['team'],
                ];
                update_man($update_id,  $update_man);
                break;

            case '2':
                $new_sick = 'f';
                $new_recover ='f';
                if($_POST['last_health_condition'] == 'healthy' && ($_POST['health_condition'] != 'healthy' || $_POST['health_condition'] != 'recover')){
                    $new_sick = 't';
                }
                if($_POST['last_health_condition'] !== 'healthy' && $_POST['health_condition'] == 'healthy' ){
                    $new_recover = 't';
                }

                $update_man =
                [
                    'id' => $_POST['update_id'],
                    'health_condition' => $_POST['health_condition'],
                    'place' => $_POST['place'],
                    'infection_area' => $_POST['infection_area'],
                ];
                $dates =
                [
                    'id' => $_POST['update_id'],
                    'action' => $_POST['health_condition'],
                    'date' => $_POST['date'],
                    'is_new_sick' => $new_sick,
                    'is_new_recover' => $new_recover,
                ];
                insert_new_date($dates);
                update_man($update_id,  $update_man);
                break;

            case '3': 
                $update_man =
                [
                    'id' => $_POST['update_id'],
                    'tests' => $_POST['tests'],
                ];
                $dates =
                [
                    'id' => $_POST['update_id'],
                    'action' => 'test',
                    'date' => $_POST['date'],
                    'is_new_sick' => 'n',
                    'is_new_recover' => 'n',
                    
                ];
                insert_new_date($dates);
                update_man($update_id,  $update_man);
                break;
            default:
                break;
        }
            
        
        
    } 
}





?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <title>קורונה - עדכון איש קיים</title>

    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

</head>

<body style="direction: rtl;">


<div id="update-man-wrapper">

    <h1>עדכון אדם קיים במערכת</h1>

    <form action="update-man.php" method="post">
        :הזן תעודת זהות
        <?php 
        if(isset($_POST['id']) || isset($_POST['update_id']) ){
            $id = isset($_POST['id']) ? $id = $_POST['id'] : $id = $_POST['update_id'];
        }
        else{
            $id ="";
        }
        
        
        
        ?>

        <input name="id" type="number" value="<?php echo $id; ?>" require /> </br></br>
        <input type="submit" value="חפש ת''ז"/>
    </form>

    <?php

        
        if(isset($_POST['id'] ) || isset($_POST['update_id']) ){

            isset($_POST['id']) ? $id = $_POST['id'] : $id = $_POST['update_id'];
            $man = get_man($id);
            if($man){

    ?>

        


    <p>בחר נושא שהינך מעוניין לעדכן</p>
    <div style="display: bloc">
        <label><input id="field1" type="radio" name="myField" value="info" />פרטים אישיים</label>
        <label><input id="field2" type="radio" name="myField" value="healthCondition" /> מצב בריאותי</label>
        <label><input id="field3" type="radio" name="myField" value="adding_test" />הוספת בדיקה</label>
    </div>


    
    <!--        עדכון פרטים אישיים         -->
    <form class="forms" id="form1" action="update-man.php" method="post">
        <input type="hidden" name="form" value="1">
        <input type="hidden" name="update_id" value="<?php echo $id ;?>" >

        <div>
            :הזן גיל <input name="age" type="number" value="<?php echo $man['age']; ?>" /></br>
        </div>

        <div>
            <p>בחר מין:</p>
            <div>
                <input type="radio" name="gender" value="f" <?php if($man['gender'] === 'f') { echo 'checked' ;} ?> >
                <label for="f">נקבה</label>
                <input type="radio" name="gender" value="m" <?php if($man['gender'] === 'm') { echo 'checked' ;}?> >
                <label for="m">זכר</label>
            </div></br>
        </div>

        
        האם עובד בשירות רפואי </br>
        <select id="team" name="team">
            <option <?php if($man['team'] === 'no') { echo 'selected' ;}?> value="no">לא</option>
            <option <?php if($man['team'] === 'nurse') { echo 'selected' ;}?> value="nurse">אח/ות</option>
            <option <?php if($man['team'] === 'doctor') { echo 'selected' ;}?> value="doctor">רופא/ה</option>
            <option <?php if($man['team'] === 'other') { echo 'selected' ;}?> value="other">מקוצועות אחרים</option>
        </select></br></br>


        <input type="submit" value="עדכן"/>

    </form>



    <!--        עדכון מצב בריאותי         -->

    <form class="forms" id="form2" action="update-man.php" method="post">
        
        <input type="hidden" name="form" value="2">
        <input type="hidden" name="update_id" value="<?php echo $id ;?>" >
        <input type="hidden" name="last_health_condition" value="<?php echo $man['health_condition'] ;?>" >

        <div>
            :עדכן מצב בריאותי </br>
            <select name="health_condition">
                <option value="healthy" <?php if($man['health_condition'] === 'healthy') { echo 'selected' ;}?>>בריא</option>
                <option value="easy" <?php if($man['health_condition'] === 'easy') { echo 'selected' ;}?> >קל</option>
                <option value="medium" <?php if($man['health_condition'] === 'medium') { echo 'selected' ;}?>>בינוני</option>
                <option value="hard" <?php if($man['health_condition'] === 'hard') { echo 'selected' ;}?>>קשה</option>
                <option value="critical" <?php if($man['health_condition'] === 'critical') { echo 'selected' ;}?>>קריטי</option>
                <option value="respiratory" <?php if($man['health_condition'] === 'respiratory') { echo 'selected' ;}?>>מונשם</option>
                <option value="recover" <?php if($man['health_condition'] === 'recover') { echo 'selected' ;}?>>החלים</option>
                <option value="dead" <?php if($man['health_condition'] === 'dead') { echo 'selected' ;}?>>נפתר</option>
            </select></br></br>
        </div>

        <div class="field city">
            :הזן עיר שבה נדבק <input name="infection_area" type="text" value="<?php echo $man['infection_area']; ?>" /></br></br>
        </div>

        <div >
            מקום בו הוא שוהה במהלך המחלה 
            <select name="place">
                <option value="home" <?php if($man['place'] === 'home') { echo 'selected' ;}?>>בבית</option>
                <option value="hotel" <?php if($man['place'] === 'hotel') { echo 'selected' ;}?> >בית מלון</option>
                <option value="hospital" <?php if($man['place'] === 'medium') { echo 'selected' ;}?>>בית חולים</option>
            </select></br></br>
        </div>


        <div >
            תאריך שזה קרה <input name="date" type="date" required /></br></br>
        </div>


        <input type="submit" value="עדכן"/>

    </form>


    <!--        עדכון הוספת בדיקה          -->

    <form class="forms" id="form3" action="update-man.php" method="post">

        <?php
            $tests = (int)$man['tests'] + 1 ;
        ?>
        <input type="hidden" name="form" value="3"> 
        <input type="hidden" name="update_id" value="<?php echo $id ;?>" >
        <input  type="hidden" name="tests" value="<?php echo $tests; ?>"  />

        <div >
            <p>סך בדיקות שערך <?php echo $man['tests']; ?></p>
        </div></br></br>


        <div >
            תאריך ביצוע הבדיקה <input name="date" type="date" required /></br></br>
        </div>

        
        <input type="submit" value="הוסף"/>

    </form>
    <?php
        }
        else
        {
            echo "הת''ז זו אינה מוכרת במערכת </br> להכנסת אדם חדש למאגר >> <a href='http://localhost/corona-project/pages/add-new-man.php'> לחץ כאן </a>";
        }

    } 
    ?>
</div>


    <!--  jQuery and Bootstrap Bundle (includes Popper) -->


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>









<script>

$('.forms').hide();

$('#field1').click(function() {
    $('.forms').hide();
    if($('#field1').is(':checked'))
    {
        $('#form1').show();

    }
    else
    {
        $('#form1').hide();
    }   
});

$('#field2').click(function() {
    $('.forms').hide();
if($('#field2').is(':checked'))
{
    $('#form2').show();

}
else
{
    $('#form2').hide();
}   
});

$('#field3').click(function() {
    $('.forms').hide();
if($('#field3').is(':checked'))
{
    $('#form3').show();

}
else
{
    $('#form3').hide();
}   
});
 



</script>

</body>

</html>