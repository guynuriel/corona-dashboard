import {
  chart1,
  chart2,
  chart3,
  chart4,
  chart5,
  chart6,
  chart7,
  chart8,
  stam,
} from "./charts";

console.log(stam);

let row1box1 = function (people) {
  let sumCritical = 0;
  let sumMedium = 0;
  let sumHard = 0;
  for (let i = 0; i < people.length; i++) {
    if (people[i].health_condition == "medium") {
      sumMedium += 1;
    }
    if (
      people[i].health_condition == "hard" ||
      people[i].health_condition == "critical" ||
      people[i].health_condition == "respiratory"
    ) {
      sumHard += 1;
    }
    if (people[i].health_condition == "critical") {
      sumCritical += 1;
    }
  }

  $("#row1-box1-sum-tests").text(sumHard);
  $("#row1-box1-sum-middle").text(sumMedium);
  $("#row1-box1-sum-hard").text(sumCritical);
};

let row1box2 = function (people) {
  let active = 0;
  let home = 0;
  let hospital = 0;
  let hotel = 0;
  for (let i = 0; i < people.length; i++) {
    if (
      people[i].health_condition !== "healthy" &&
      people[i].health_condition !== "dead" &&
      people[i].health_condition !== "recover"
    ) {
      active += 1;
      switch (people[i].place) {
        case "home":
          home++;
          break;

        case "hospital":
          hospital++;
          break;

        case "hotel":
          hotel++;
          break;

        default:
          break;
      }
    }
  }

  $("#row1-box2-sum-active").text(active);
  $("#row1-box2-sum-home").text(home);
  $("#row1-box2-sum-hotel").text(hotel);
  $("#row1-box2-sum-hospital").text(hospital);
};

let row1box3 = function (dates) {
  let newsick = 0;
  let year;
  let day;
  let month;
  let now;
  for (let i = 0; i < dates.length; i++) {
    year = dates[i].date.substring(0, 4);
    month = dates[i].date.substring(5, 7);
    day = parseInt(dates[i].date.substring(8, 10));
    now = new Date();
    if (
      year == now.getFullYear() &&
      month == now.getMonth() + 1 &&
      (day == now.getDate() || day + 1 == now.getDate())
    ) {
      if (dates[i].is_new_sick == "t") {
        newsick++;
      }
    }
  }

  $("#row1-box3-sum-new").text(newsick);
};

let row1box4 = function (people) {
  let sumRespiratory = 0;

  for (let i = 0; i < people.length; i++) {
    if (people[i].health_condition == "respiratory") {
      sumRespiratory += 1;
    }
  }

  $("#row1-box4-sum-respiratory").text(sumRespiratory);
};

let row1box5 = function (people) {
  let sumDead = 0;

  for (let i = 0; i < people.length; i++) {
    if (people[i].health_condition == "dead") {
      sumDead += 1;
    }
  }

  $("#row1-box5-sum-dead").text(sumDead);
};

let row2box2 = function (daily) {
  let sick1 = 0;
  let sick2 = 0;
  let sick3 = 0;
  let sick4 = 0;
  let sick5 = 0;
  let sick6 = 0;
  let sick7 = 0;
  let year;
  let day;
  let month;
  let now;

  for (let i = 0; i < daily.length; i++) {
    year = daily[i].date.substring(0, 4);
    month = daily[i].date.substring(5, 7);
    day = parseInt(daily[i].date.substring(8, 10));
    now = new Date();
    if (
      year == now.getFullYear() &&
      month == now.getMonth() + 1 &&
      day == now.getDate()
    ) {
      sick1 = daily[i].hards;
    } else if (
      year == now.getFullYear() &&
      month == now.getMonth() + 1 &&
      day + 1 == now.getDate()
    ) {
      sick2 = daily[i].hards;
    } else if (
      year == now.getFullYear() &&
      month == now.getMonth() + 1 &&
      day + 2 == now.getDate()
    ) {
      sick3 = daily[i].hards;
    } else if (
      year == now.getFullYear() &&
      month == now.getMonth() + 1 &&
      day + 3 == now.getDate()
    ) {
      sick4 = daily[i].hards;
    } else if (
      year == now.getFullYear() &&
      month == now.getMonth() + 1 &&
      day + 4 == now.getDate()
    ) {
      sick5 = daily[i].hards;
    } else if (
      year == now.getFullYear() &&
      month == now.getMonth() + 1 &&
      day + 5 == now.getDate()
    ) {
      sick6 = daily[i].hards;
    } else if (
      year == now.getFullYear() &&
      month == now.getMonth() + 1 &&
      day + 6 == now.getDate()
    ) {
      sick7 = daily[i].hards;
    }
  }

  let data = {
    sick1: sick1,
    sick2: sick2,
    sick3: sick3,
    sick4: sick4,
    sick5: sick5,
    sick6: sick6,
    sick7: sick7,
  };
  return data;
};

// let start = async function(){
//     var data;

//     // $.ajaxSetup({async:false});

//    await $.get('../get-people-data.php', function (d) {
//        data = $.parseJSON(d);

//     })
//     console.log(data)

//    return data;

// }

let start = async function () {
  let response = await fetch("../get-people-data.php");
  let data = await response.json();
  return data;
};

chart1();
chart2();
chart3();
chart4();
chart5();
chart6();
chart7();
chart8();

//  $(document).ready(async function () {
//     let {people,daily,dates} = await start();
//     console.log(people);

//     row1box1(people);
//     row1box2(people);
//     row1box3(dates);
//     row1box4(people);
//     row1box5(people);

//  });

