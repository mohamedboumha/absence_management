import moment from "moment";
import { sharedObj } from "./charts/sharedObj";

$(function () {

  

  let div = document.querySelector("#chart")
  let data = JSON.parse(div.textContent);

  const weeklyData = [...Array(7)].map(() => []);
  data.forEach(item => {
      const createdAt = moment(item.created_at).format("YYYY-MM-DD");
      const diffDays = moment().utc().diff(createdAt, "days");
      if (diffDays >= 0 && diffDays <= 6) {
          weeklyData[6 - diffDays].push(item);
      }
  });

  const lastWeek = {
    weeks : [],
    count: []
  }

  for (let i = 0; i < 7; i++) {
    const day = moment().subtract(i, 'days').format('YYYY-MM-DD');
    lastWeek.weeks.push(day);
  }

  weeklyData.map(e=>{
    lastWeek.count.push(e.length)
  })

  var chart = {
    ...sharedObj,

    series: [
      { name: "Les absences:", data: lastWeek.count },
    ],
    xaxis: {
      type: "category",
      categories: lastWeek.weeks.reverse(),
      labels: {
        style: { cssClass: "grey--text lighten-2--text fill-color" },
      },
    },
  }

  var chart = new ApexCharts(document.querySelector("#chart"), chart);
  chart.render();

})
