<?php
    include '../DB.php';
    $data = get_all_people();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <title>קורונה - לוח בקרה</title>

    <link rel="stylesheet" href="../style.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body>


    <div id="page-wrapper">

        <div id="page-row1" class="row">
            <div class="row1-box-wrapper">
                <div class="row1-box">
                    <p class="row1-box-header">חולים קשה</p>
                    <p class="row1-box-sum" id="row1-box1-sum-tests"></p>
                    <p class="row1-box-time">5,542+ היום מחצות</p>
                    <div style="display: flex;" class="row1-box1-data-wrapper">
                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" class="bi bi-circle-fill text-warning label-circle-row1"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <div class="row1-box2-data">
                                <span>
                                    בינוני
                                </span>
                                <strong id="row1-box1-sum-middle">
                                    
                                </strong>
                            </div>
                        </div>

                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" class="bi bi-circle-fill text-danger label-circle-row1"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <div class="row1-box2-data">
                                <span>
                                    מתוכם קריטי
                                </span>
                                <strong id="row1-box1-sum-hard">
                                    
                                </strong>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class=" row1-box-wrapper">
                <div class="row1-box">
                    <p class="row1-box-header">חולים פעילים</p>
                    <p id="row1-box2-sum-active" class="row1-box-sum"></p>
                    <p class="row1-box-time">5,542+ מחצות</p>
                    <div class="row1-box2-data-wrapper">
                        <div class="row1-box2-data">
                            <span>
                                בית / קהילה
                            </span>
                            <strong id="row1-box2-sum-home">
                                
                            </strong>
                        </div>
                        <div class="row1-box2-data">
                            <span>
                                מלון
                            </span>
                            <strong id="row1-box2-sum-hotel">
                                
                            </strong>
                        </div>
                        <div class="row1-box2-data">
                            <span>
                                בי"ח
                            </span>
                            <strong id="row1-box2-sum-hospital">
                                
                            </strong>
                        </div>

                    </div>
                </div>
            </div>

            <div class=" row1-box-wrapper">
                <div class="row1-box">
                    <p class="row1-box-header">מאומתים חדשים אתמול</p>
                    <p id="row1-box3-sum-new" class="row1-box-sum"></p>
                    <p class="row1-box-time">5,542+ היום מחצות</p>
                    <div class="row1-box-btn-wrapper">
                        <span class="row1-box-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <rect width="2" height="5" x="1" y="10" rx="1" />
                                <rect width="2" height="9" x="6" y="6" rx="1" />
                                <rect width="2" height="14" x="11" y="1" rx="1" />
                            </svg>
                        </span>
                        <span>מגמת שינוי יומית</span>
                    </div>
                </div>
            </div>

            <div class=" row1-box-wrapper">
                <div class="row1-box">
                    <p class="row1-box-header">מונשמים</p>
                    <p id="row1-box4-sum-respiratory" class="row1-box-sum"></p>
                    <p class="row1-box-time">5,542+ מחצות</p>
                    <div class="row1-box-btn-wrapper">
                        <span class="row1-box-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <rect width="2" height="5" x="1" y="10" rx="1" />
                                <rect width="2" height="9" x="6" y="6" rx="1" />
                                <rect width="2" height="14" x="11" y="1" rx="1" />
                            </svg>
                        </span>
                        <span>מגמת שינוי יומית</span>
                    </div>
                </div>
            </div>

            <div class="row1-box-wrapper">
                <div class="row1-box">
                    <p class="row1-box-header">נפטרים במצטבר</p>
                    <p id="row1-box5-sum-dead" class="row1-box-sum"></p>
                    <!-- <p class="row1-box-time">5,542+ היום מחצות</p> -->
                    <div class="row1-box-btn-wrapper">
                        <span class="row1-box-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <rect width="2" height="5" x="1" y="10" rx="1" />
                                <rect width="2" height="9" x="6" y="6" rx="1" />
                                <rect width="2" height="14" x="11" y="1" rx="1" />
                            </svg>
                        </span>
                        <span>מגמת שינוי יומית</span>
                    </div>
                </div>
            </div>

            <div class=" row1-box-wrapper">
                <div class="row1-box">
                    <p class="row1-box-header">אחוז בדיקות חיוביות אתמול</p>
                    <p class="row1-box-sum">34,494</p>
                    <p class="row1-box-time">5,542 בדיקות אתמול</p>
                    <div class="row1-box-btn-wrapper">
                        <span class="row1-box-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <rect width="2" height="5" x="1" y="10" rx="1" />
                                <rect width="2" height="9" x="6" y="6" rx="1" />
                                <rect width="2" height="14" x="11" y="1" rx="1" />
                            </svg>
                        </span>
                        <span>מגמת שינוי יומית</span>
                    </div>
                </div>
            </div>

        </div>


        <div id="page-row2">
            <div style="display: flex;flex-wrap: wrap;">

                <h5 class="row2-header">מדדי התפשטות בהסתכלות שבועית</h5>
                <div class=" row2-box">
                    <h6>מספר המאומתים החדשים מחוץ לאזורי ההתפשטות</h6>
                    <p class="row2-box-info">
                        <svg style="margin-left:5px;" width="15px" height="15px" viewBox="0 0 16 16"
                            class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                        הנתונים אינם כוללים מאומתים מישובים אדומים, מוסדות גריאטריים וחוזרים מחו"ל
                    </p>
                    <!-- גרף 1 -->
                    <figure class="highcharts-figure">
                        <div style="height: 250px;" id="chart1"></div>
                    </figure>
                </div>


                <div class="row2-box2 row2-box">
                    <h6 style="margin-bottom: 60px;">מספר החולים קשה</h6>
                    <figure class="highcharts-figure">
                        <div style="height: 250px;" id="chart2"></div>
                    </figure>
                </div>
                <div class="row2-box">
                    <h6>מספר המאומתים החדשים מחוץ לאזורי ההתפשטות</h6>
                    <p class="row2-box-info">
                        <svg style="margin-left:5px;" width="15px" height="15px" viewBox="0 0 16 16"
                            class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                        הנתונים אינם כוללים מאומתים מישובים אדומים, מוסדות גריאטריים וחוזרים מחו"ל
                    </p>
                    <figure class="highcharts-figure">
                        <div style="height: 250px;" id="chart3"></div>
                    </figure>
                </div>

            </div>
        </div>


        <div id="page-row3">

            <div class="row3-box1-wrapper">
                <div class="row3-boxs">
                    <p class="label-header">עקומה אפידמית</p>
                    <div style="display: flex;" class="">
                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color: #1C7D7E;" class="bi bi-circle-fill label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>מאומתים חדשים</p>
                        </div>

                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color: #898989" class="bi bi-circle-fill  label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>מחלימים חדשים</p>
                        </div>

                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color: #50CBFD" class="bi bi-circle-fill  label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>מאומתים במצטבר</p>
                        </div>
                    </div>
                    <p class="row3-box1-info"> <img style="margin-left: 10px;" src="../img/increment.svg" alt=""> מספר
                        הנדבקים היום הינו כפול מהמספר לפני 50 ימים</p>
                    <canvas height="100" width="450" id="myChart4"></canvas>
                </div>
            </div>

            <div class="row3-box2-wrapper">
                <div class="row3-boxs">
                    <p class="label-header">חולים קשה ומונשמים</p>
                    <div style="display: flex;" class="">
                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color: #B6CA51;" class="bi bi-circle-fill label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>חולים קשים</p>
                        </div>

                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color: #50CBFD" class="bi bi-circle-fill  label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>מונשמים</p>
                        </div>

                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color:#237D7D" class="bi bi-circle-fill  label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>נפטרים</p>
                        </div>
                    </div>
                    <canvas height="150" width="400" id="myChart5"></canvas>
                </div>
            </div>

        </div>


        <div id="page-row4">
            <div class="row4-box1-wrapper">
                <div style="height: 360px;" class="row4-boxs">
                    <div style="display: flex;">
                        <p class="label-header">פיזור מאומתים שונים לפי גיל ומגדר</p>

                        <select style="margin-right: auto;" name="" id="">
                            <option value="">מאומתים</option>
                            <option value="">נפטרים</option>
                            <option value="">מונשמים</option>
                            <option value="">מצב קשה</option>
                        </select>
                    </div>
                        <div style="display: flex;" class="">

                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color: #50CBFD" class="bi bi-circle-fill  label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>גברים</p>
                        </div>

                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color:#B6CA51" class="bi bi-circle-fill label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>נשים</p>
                        </div>
                    </div>
                    <figure class="highcharts-figure">
                        <div id="containerr"></div>
                    </figure>
                </div>
            </div>

            <div  class="row4-box2-wrapper">
                <div style="height: 360px;" class="row4-boxs">
                    <p class="label-header" style="padding: 15px 5px;">אזורי התפשטות</p>
                    <p style="font-size:14px;font-weight:bold; padding-right:15px">* מרכיבי ציון הרמזור (לפי נתוני השבוע האחרון)</p>
                    <div style="display:flex; padding-bottom:15px;" >
                        <div style="display:flex;" >
                            <span style="border-radius:2px;width:35px;margin:0 6px;height:35px;background-color:#fa9e8f;" >
                            </span>
                            <span>
                                <p style="font-size:12px;margin:0;" >אדום - פעילות מינימלית</p>
                                <p style="font-size:12px;margin:0;">ציון 7.5 ומעלה</p>
                            </span>
                        </div>

                        <div style="display:flex;" >
                            <span style="border-radius:2px;width:35px;margin:0 6px;height:35px;background-color:#f2c580;" >
                            </span>
                            <span>
                                <p style="font-size:12px;margin:0;">כתום - פעילות מצומצמת</p>
                                <p style="font-size:12px;margin:0;">ציון בין 6 ל - 7.5</p>
                            </span>
                        </div>
                        <div style="display:flex;" >
                            <span style="border-radius:2px;width:35px;margin:0 6px;height:35px;background-color:#fcfc70;" >
                            </span>
                            <span>
                                <p style="font-size:12px;margin:0;">צהוב - פעילות מוגבלת</p>
                                <p style="font-size:12px;margin:0;">ציון בין 4.5 ל - 6</p>
                            </span>
                        </div>
                        <div style="display:flex;" >
                            <span style="border-radius:2px;width:35px;margin:0 6px;height:35px;background-color:#b8de92;" >
                            </span>
                            <span>
                                <p style="font-size:12px;margin:0;">ירוק - פעילות מורחבת</p>
                                <p style="font-size:12px;margin:0;">ציון עד 4.5</p>
                            </span>
                        </div>
                    </div>
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>חולים פעילים ל- 10,000 נפש</th>
                                    <th>בדיקות ב-7 ימים אחרונים</th>
                                    <th>חולים חדשים ב-7 ימים אחרונים</th>
                                    <th>חולים פעילים</th>
                                    <th>מאומתים</th>
                                    <th>ישוב</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $citys = [];
                                $city = [];
                                for($i = 0 ; $i < count($data) ; $i++)
                                 {

                                    $is_find = false;
                                    if(count($citys) > 0){

                                        foreach ($citys as $key => $val){
                                            
                                            if($val !== $data[$i]["infection_area"]){
                                                continue;
                                            }
                                            $is_find = true;
                                            break;
                                        }
                                    }
                                   
                                    if(!$is_find){
                                        $city["name"] = $data[$i]["infection_area"];
                                        $citys[] = $city; 
                                    }
                                }
                                foreach($citys as $city){
                                    $sicks = 0;
                                    for($i = 0 ; $i < count($data) ; $i++){
                                        if($city["name"] == $data[$i]["infection_area"]  ){
                                            switch($data[$i]["health_condition"]){
                                                case "easy":
                                                    $sicks++;
                                                    break;
                                                case "medium":
                                                    $sicks++;
                                                    break;
                                                case "hard":
                                                    $sicks++;
                                                    break;
                                                case "respiratory":
                                                    $sicks++;
                                                    break;

                                            }

                                        }
                                    }
                                    
                                }

                                 
                                 
                                 foreach ($citys as $city){
                                echo
                                "<tr>
                                    <td>".$city["name"]."</td>
                                    <td>".$city["name"]."</td>
                                    <td>".$city["name"]."</td>
                                    <td>".$city["name"]."</td>
                                    <td>".$city["name"]."</td>
                                    <td>".$city["name"]."</td>
                                </tr>";
                                 }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div style="text-align: right;" id="page-row5">
            <div id="row5-boxs-wrapper">
                <div class="row5-box1 row5-boxs">
                    <p class="label-header">אנשי צוות בריאות בבידוד</p>
                    <!--       7    דונט צ'ארט                -->
                    <figure class="highcharts-figure">
                        <div style="height: 300px;" id="doughnutChart"></div>
                    </figure>                    
                </div>
                <div class="row5-box2 row5-boxs">
                    <p class="label-header" style="padding: 15px 5px;">סטטוס בתי חולים</p>
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>צוות בבידוד</th>
                                    <th>תפוסת קורונה %</th>
                                    <th>תפוסה כללית %</th>
                                    <th>בית חולים</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>42</td>
                                    <td>
                                        <div style="display: flex;width: 80%;">
                                            <div style="width:30%;">25%</div>
                                            <div style="width: 70%;direction: rtl;" class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div style="display: flex;width: 80%;">
                                            <div style="width:30%;">25%</div>
                                            <div style="width: 70%;direction: rtl;" class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>מאיר</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row5-box3 row5-boxs">
                    <p class="label-header">פיזור מאומתים לפי גיל ומגדר</p>


                    <p class="row5-box-info">
                        <svg style="margin-left:5px;" width="15px" height="15px" viewBox="0 0 16 16"
                            class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>הנתונים אינם כוללים מידע על בדיקות לאבחון ההחלמה
                    </p>


                    <div style="display: flex;" class="">

                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color: #50CBFD" class="bi bi-circle-fill  label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>בדיקות</p>
                        </div>

                        <div style="display: flex;">
                            <svg viewBox="0 0 16 16" style="color:#1C7D7E" class="bi bi-circle-fill label-circle"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p>מאומתים</p>
                        </div>
                    </div>
                    <canvas id="myChart8"></canvas>
                </div>
            </div>
        </div>


    </div>


    <!--  jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="module" src="../main/charts.js"></script>
    <!-- <script type="module" src="../main/logic.js"></script> -->
</body>

</html>