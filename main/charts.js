let get_last_week_dates = function () {
  let dates = [];
  for (let i = 7; i >= 0; i--) {
    let today = new Date();
    let lastWeek = new Date(
      today.getFullYear(),
      today.getMonth(),
      today.getDate() - i
    );
    let lastWeekMonth = lastWeek.getMonth() + 1;
    let lastWeekDay = lastWeek.getDate();
    if (lastWeekDay.toString().length == 1) {
      lastWeekDay = "0" + lastWeekDay;
    }
    if (lastWeekMonth.toString().length == 1) {
      lastWeekMonth = "0" + lastWeekMonth;
    }
    dates.push(lastWeekDay + "." + lastWeekMonth);
  }
  return dates;
};

/////// chart 1

let chart1 = function () {
  let dates = get_last_week_dates();
  let type = "text";
  Highcharts.chart("chart1", {
    chart: {
      type: "area",
    },
    title: {
      text: "",
    },
    xAxis: {
      categories: [
        dates[0],
        dates[1],
        dates[2],
        dates[3],
        dates[4],
        dates[5],
        dates[6],
      ],
    },
    yAxis: {
      title: {
        text: "אחוז שינוי יומי",
      },
    },
    series: [
      {
        data: [1, 2, 4, -4, 2, 4, 2],
        color: "#50CBFD",
      },
    ],
    tooltip: {
      enabled: false,
    },

    plotOptions: {
      series: {
        stacking: "normal",
        dataLabels: {
          enabled: true,
          format:
            "{y}% <br> <span style='color:gray;'> ( " + type + " )</span>",
          inside: false,
          style: {
            color: "black",
          },
        },
      },
      area: {
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1,
          },
          stops: [
            [0, "#50CBFD"],
            [
              1,
              Highcharts.color(Highcharts.getOptions().colors[0])
                .setOpacity(0)
                .get("#50CBFD"),
            ],
          ],
        },
      },
    },
    credits: {
      enabled: false,
    },

    legend: {
      enabled: false,
    },

    exporting: { enabled: false },
  });
};
//////////////////////      chart 2
let chart2 = function (daily) {
  let dates = get_last_week_dates();
  let data = [];
  for (let y = 0; y < 7; y++) {
    for (let i = daily.length - 1; i >= daily.length - 8; i--) {
      let month = daily[i].date.substring(5, 7);
      let day = daily[i].date.substring(8, 10);
      let sumHardAndCritical = 0;

      if (dates[y] == day + "." + month) {
        if (daily[i].critical && daily[i].hards) {
          sumHardAndCritical =
            parseInt(daily[i].hards) + parseInt(daily[i].critical);
        } else if (daily[i].hards) {
          sumHardAndCritical = parseInt(daily[i].hards);
        } else if (daily[i].critical) {
          sumHardAndCritical = parseInt(daily[i].critical);
        }
        data.push(sumHardAndCritical);
        break;
      }
    }
  }

  Highcharts.chart("chart2", {
    chart: {
      type: "area",
    },
    title: {
      text: "",
    },
    xAxis: {
      categories: [
        dates[0],
        dates[1],
        dates[2],
        dates[3],
        dates[4],
        dates[5],
        dates[6],
      ],
    },
    yAxis: {
      title: {
        text: "",
      },
    },
    series: [
      {
        data: [data[0], data[1], data[2], data[3], data[4], data[5], data[6]],
        color: "#1C7D7E",
      },
    ],
    tooltip: {
      enabled: false,
    },

    plotOptions: {
      area: {
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1,
          },
          stops: [
            [0, "#1C7D7E"],
            [
              1,
              Highcharts.color(Highcharts.getOptions().colors[0])
                .setOpacity(0)
                .get("#1C7D7E"),
            ],
          ],
        },
      },
      series: {
        stacking: "normal",
        dataLabels: {
          enabled: true,
          format: "{y}",
          inside: false,
          style: {
            color: "black",
          },
        },
      },
    },

    credits: {
      enabled: false,
    },

    legend: {
      enabled: false,
    },

    exporting: { enabled: false },
  });
};

//////////////////////       chart 3
let chart3 = function () {
  let dates = get_last_week_dates();

  Highcharts.chart("chart3", {
    chart: {
      type: "column",
    },
    title: {
      text: "",
    },
    yAxis: {
      title: {
        text: "",
      },
      plotLines: [
        {
          color: "red",
          dashStyle: "dot",
          width: 2,
          value: 100,
          label: {
            rotation: 0,
            y: 15,
            style: {
              fontStyle: "italic",
              color: "red",
            },
            text: "יעד ממשלה",
          },
          zIndex: 6,
        },
      ],
    },
    xAxis: {
      categories: [
        dates[0],
        dates[1],
        dates[2],
        dates[3],
        dates[4],
        dates[5],
        dates[6],
      ],
    },
    plotOptions: {
      series: {
        stacking: "normal",
        dataLabels: {
          enabled: true,
          format: "{y}",
          inside: false,
          style: {
            color: "black",
          },
        },
      },
    },
    tooltip: {
      enabled: false,
    },
    series: [
      {
        data: [606, 647, 583, 425, 510, 170, 393],
        color: "#b6ca51",
        pointWidth: 10,
      },
    ],
    credits: {
      enabled: false,
    },

    legend: {
      enabled: false,
    },

    exporting: { enabled: false },
  });
};

//////////       chart 4

let chart4 = function () {
  let dates = get_last_week_dates();
  var ctx = document.getElementById("myChart4").getContext("2d");
  var chart = new Chart(ctx, {
    type: "bar",

    data: {
      labels: [
        dates[0],
        dates[1],
        dates[2],
        dates[3],
        dates[4],
        dates[5],
        dates[6],
      ],
      datasets: [
        {
          backgroundColor: "#898989",
          borderColor: "#50CBFD",
          data: [883, 755, 790, 900, 751, 800, 900],
        },
        {
          backgroundColor: "#1C7D7E",
          borderColor: "#50CBFD",
          data: [884, 900, 874, 600, 400, 500, 700],
        },
        {
          type: "line",
          borderColor: "#50CBFD",
          data: [100000, 100100, 100800, 99400, 100000, 98000, 98900, 100000],
          fill: false,
        },
      ],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              // reverse:true,
              // offsetGridLines:true,
              //display:false
            },
          },
        ],
        xAxes: [
          {
            barThickness: 10,
          },
        ],
      },
      legend: {
        display: false,
      },
    },
  });
};

//    ---------------            chart 5
let chart5 = function (daily) {
  let dates = get_last_week_dates();

  let hards = [];
  let respiratory = [];
  let deads = [];
  for (let y = 0; y < 7; y++) {
    for (let i = daily.length - 1; i >= daily.length - 8; i--) {
      let month = daily[i].date.substring(5, 7);
      let day = daily[i].date.substring(8, 10);
      let sum_hards = 0;
      let sum_respiratory = 0;
      let sum_deads = 0;

      if (dates[y] == day + "." + month) {
        if (daily[i].hards) {
          sum_hards = parseInt(daily[i].hards);
        }
        if (daily[i].respiratory) {
          sum_respiratory = parseInt(daily[i].respiratory);
        }
        if (daily[i].critical) {
          sum_deads = parseInt(daily[i].deads);
        }
        hards.push(sum_hards);
        respiratory.push(sum_respiratory);
        deads.push(sum_deads);
        break;
      }
    }
  }

  var ctx = document.getElementById("myChart5").getContext("2d");
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: "line",

    // The data for our dataset
    data: {
      labels: [
        dates[0],
        dates[1],
        dates[2],
        dates[3],
        dates[4],
        dates[5],
        dates[6],
      ],
      datasets: [
        {
          //label: 'חולים קשים',
          borderWidth: "2",
          fill: false,
          backgroundColor: "#B6CA51",
          borderColor: "#B6CA51",
          data: [
            hards[0],
            hards[1],
            hards[2],
            hards[3],
            hards[4],
            hards[5],
            hards[6],
          ],
        },
        {
          //label: 'מונשמים',
          borderWidth: "2",
          fill: false,
          backgroundColor: "#50CBFD",
          borderColor: "#50CBFD",
          data: [
            respiratory[0],
            respiratory[1],
            respiratory[2],
            respiratory[3],
            respiratory[4],
            respiratory[5],
            respiratory[6],
          ],
        },
        {
          //label: 'נפטרים',
          fill: false,
          borderWidth: "2",
          backgroundColor: "#237D7D",
          borderColor: "#237D7D",
          data: [
            deads[0],
            deads[1],
            deads[2],
            deads[3],
            deads[4],
            deads[5],
            deads[6],
          ],
        },
      ],
    },

    // Configuration options go here
    options: {
      legend: {
        display: false,
      },
    },
  });
};

//////////////////////       chart 6
// Data gathered from http://populationpyramid.net/germany/2015/
let chart6 = function () {
  // Age categories
  var categories = [
    "0-9",
    "10-19",
    "20-29",
    "30-39",
    "40-49",
    "50-59",
    "60-69",
    "70-79",
    "80-89",
    "90 + ",
  ];

  Highcharts.chart("containerr", {
    chart: {
      type: "bar",
    },

    accessibility: {
      point: {
        valueDescriptionFormat: "{index}. Age {xDescription}, {value}%.",
      },
    },
    xAxis: [
      {
        categories: categories,
        reversed: false,
        labels: {
          step: 1,
        },
        accessibility: {
          description: "Age (male)",
        },
      },
      {
        // mirror axis on right side
        opposite: true,
        reversed: false,
        categories: categories,
        linkedTo: 0,
        labels: {
          step: 1,
        },
        accessibility: {
          description: "Age (female)",
        },
      },
    ],
    yAxis: {
      title: {
        text: null,
      },
      labels: {
        formatter: function () {
          return Math.abs(this.value) + "%";
        },
      },
      accessibility: {
        description: "Percentage population",
        rangeDescription: "Range: 0 to 10%",
      },
    },

    tooltip: {
      formatter: function () {
        return (
          "<b>" +
          this.series.name +
          ", age " +
          this.point.category +
          "</b><br/>" +
          "Population: " +
          Highcharts.numberFormat(Math.abs(this.point.y), 1) +
          "%"
        );
      },
    },

    series: [
      {
        name: "נשים",
        color: "#B6CA51",
        data: [-2.2, -2.1, -2.2, -2.4, -2.7, -3.0, -3.3, -3.2, -2.9, -3.5],
      },
      {
        name: "גברים",
        color: "#50CBFD",
        data: [2.1, 2.0, 2.1, 2.3, 2.6, 2.9, 3.2, 3.1, 2.9, 3.4],
      },
    ],

    legend: {
      enabled: false,
    },

    plotOptions: {
      series: {
        stacking: "normal",
        dataLabels: {
          enabled: true,
          format: "{y}%",
          inside: false,
        },
      },
    },

    responsive: {
      rules: [
        {
          condition: {
            maxWidth: 500,
          },
          chartOptions: {
            legend: {
              enabled: false,
            },
          },
        },
      ],
    },

    title: {
      text: "",
    },
    subtitle: {
      text: "",
    },
    credits: {
      enabled: false,
    },
    exporting: { enabled: false },
  });
};

/////////              chart 7   דונט

let chart7 = function (people) {
  let doctors = 0;
  let others = 0;
  let nurses = 0;
  for (let i = 0; i < people.length; i++) {
    if (
      people[i].health_condition !== "healthy" &&
      people[i].health_condition !== "dead" &&
      people[i].health_condition !== "recover"
    ) {
      switch (people[i].team) {
        case "doctor":
          doctors++;
          break;

        case "nurse":
          nurses++;
          break;

        case "other":
          others++;
          break;

        default:
          break;
      }
    }
  }

  let sum = nurses + doctors + others;

  Highcharts.chart("doughnutChart", {
    chart: {
      type: "pie",
    },
    title: {
      text: sum + '<br>סה"כ',
      align: "center",
      verticalAlign: "middle",
      y: 0,
      x: 0,
    },
    tooltip: {
      enabled: false,
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: "pointer",
        dataLabels: {
          enabled: true,
          format: "{point.name} <br> <span> {y} <span>",
        },
      },
    },

    series: [
      {
        minPointSize: 10,
        innerSize: "80%",
        zMin: 0,

        data: [
          {
            name: "nurse",
            y: nurses,
            color: "#b6ca51",
          },
          {
            name: "other professional",
            y: others,
            color: "#1c7d7e",
          },
          {
            name: "doctors",
            y: doctors,
            color: "#50cbfd",
          },
        ],
      },
    ],

    credits: {
      enabled: false,
    },

    exporting: { enabled: false },
  });
};

//////////////////////       chart 8
let chart8 = function () {
  let dates = get_last_week_dates();
  var ctx = document.getElementById("myChart8").getContext("2d");
  var myLineChart = new Chart(ctx, {
    type: "bar",

    data: {
      labels: [
        dates[0],
        dates[1],
        dates[2],
        dates[3],
        dates[4],
        dates[5],
        dates[6],
      ],
      datasets: [
        {
          backgroundColor: "#58DFFF",
          borderColor: "#58DFFF",
          data: [13, 12, 15, 28, 20, 18, 22],
        },
      ],
    },
    options: {
      legend: {
        display: false,
      },
      scales: {
        xAxes: [
          {
            barThickness: 10,
          },
        ],
      },
    },
  });
};

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
  let newSick = 0;
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
        newSick++;
      }
    }
  }

  $("#row1-box3-sum-new").text(newSick);
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

let start = async function () {
  let response = await fetch(
    "http://localhost/corona-project/get-people-data.php"
  );
  let data = await response.json();
  return data;
};
start().then(function (data) {
  let { people, daily, dates } = data;

  chart1();
  chart2(daily);
  chart3();
  chart4();
  chart5(daily);
  chart6();
  chart7(people);
  chart8();

  
  row1box1(people);
  row1box2(people);
  row1box3(dates);
  row1box4(people);
  row1box5(people);
});
