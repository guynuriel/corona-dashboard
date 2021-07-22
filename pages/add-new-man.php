<?php

include '../DB.php';


$id = isset($_POST['id']) ? $_POST['id'] : null;;
if ($id) {

  if (!is_id_exist($id)) {
    $new_man =
      [
        'man_id' => $_POST['id'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender'],
        'team' => $_POST['team'],


      ];

    insert_new_man($new_man);
  }
  else{
    echo "this id is all ready exist </br> for update press >> <a href='http://localhost/corona-project/pages/update-man.php'> here </a>";
  }
}





?>





<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../img/favicon.png">
  <title>קורונה - הוספת חולה חדש למאגר</title>

  <link rel="stylesheet" href="../style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>

<body>

  <form id="create-new-man" action="add-new-man.php" method="post">

    <h1>הוספת חולה חדש</h1>

    :הזן תעודת זהות <input id="id" name="id" type="number" required/> </br></br>

    :הזן גיל <input required id="age" min="0" name="age" type="number" /></br>


    <p>בחר מין:</p>
    <div>
      <input required  type="radio" name="gender" value="f">
      <label for="f">נקבה</label>
      <input required  type="radio" name="gender" value="m">
      <label for="m">זכר</label>
    </div>
    </br>

    האם עובד בשירות רפואי </br>
    <select required id="team" name="team">
      <option selected disabled hidden value="">בחר</option>
      <option value="no">לא</option>
      <option value="nurse">אח/ות</option>
      <option value="doctor">רופא/ה</option>
      <option value="other">מקוצועות אחרים</option>
    </select></br></br>


    <input type="submit" />
  </form>



  <!--  jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  <script>
    var request;


    //   let id = $('#id').val()
    //   let age = $('#age').val()
    //   let sex = $('#sex').val()
    //   let healthCondition = $('#healthCondition').val()
    //   let testingTimes = $('#testingTimes').val()
    //   let city = $('#city').val()
    //   let testDate = $('#testDate').val()
    //   let healDate = $('#healDate').val()
    //   let new_man = 
    //   {
    //       id : id,
    //       age:age,
    //       sex: sex,
    //       healthCondition : healthCondition,
    //       testingTimes:testingTimes,
    //       city:city,
    //       testDate:testDate,
    //       healDate:healDate
    //   };
  </script>

</body>

</html>