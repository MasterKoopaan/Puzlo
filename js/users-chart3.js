var ctx = document.getElementById("insertchart").getContext('2d');
var myBarChart = new Chart(ctx, {
  responsive: true,
    type: 'bar',
    data: {
      labels: ["tot 18","16 tot 25" ,"26 tot 35","36 tot 45","46 tot 55","56 tot 65","66+"],
      datasets: [{
        label: "Aantal per leeftijd",
        data: [3,10,35,16,11,15,8],
        backgroundColor: 'rgb(255,255,255)',
        borderColor: 'rgb(0, 210, 255)',
        // backgroundColor: ['rgb(255,255,255)','rgb(255,255,255)','rgb(255,255,255)','rgb(255,255,255)','rgb(255,255,255)','rgb(255,255,255)','rgb(255,255,255)'],
        // borderColor: ['rgb(0, 210, 255)','rgb(0, 210, 255)','rgb(0, 210, 255)','rgb(0, 210, 255)','rgb(0, 210, 255)','rgb(0, 210, 255)','rgb(0, 210, 255)']
      }]

    },
    options: {}
});
