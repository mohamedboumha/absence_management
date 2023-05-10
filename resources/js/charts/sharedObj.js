export let sharedObj = {

  chart: {
    type: "bar",
    height: 400,
    offsetX: -15,
    toolbar: { show: true },
    foreColor: "#adb0bb",
    fontFamily: 'inherit',
    sparkline: { enabled: false },
  },


  colors: ["#49BEFF", "#5D87FF"],


  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "35%",
      borderRadius: [6],
      borderRadiusApplication: 'end',
      borderRadiusWhenStacked: 'all'
    },
  },
  markers: { size: 0 },

  dataLabels: {
    enabled: false,
  },


  legend: {
    show: false,
  },


  grid: {
    borderColor: "rgba(0,0,0,0.1)",
    strokeDashArray: 3,
    xaxis: {
      lines: {
        show: false,
      },
    },
  },

  yaxis: {
    show: true,
    min: 0,
    max: 50,
    tickAmount: 10,
    labels: {
      style: {
        cssClass: "grey--text lighten-2--text fill-color",
      },
    },
  },

  stroke: {
    show: true,
    width: 3,
    lineCap: "butt",
    colors: ["transparent"],
  },


  tooltip: { theme: "light" },

  responsive: [
    {
      breakpoint: 600,
      options: {
        plotOptions: {
          bar: {
            borderRadius: 3,
          }
        },
      }
    }
  ]
}