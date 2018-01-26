var ctx = document.getElementById("insertchart").getContext('2d');
var myChart = new Chart(ctx, {
  responsive: true,
  type: 'line',

      // The data for our dataset
      data: {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [{
              label: "Summary Users",
              backgroundColor: 'rgb(255, 255, 255)',
              borderColor: 'rgb(192,192,192)',
              // 'rgb(255, 99, 132)' 'rgb(255, 99, 132)'
              data: [19, 22, 30, 32, 35, 45, 43],
          }]
      },

      // Configuration options go here
      options: {

      }
});
