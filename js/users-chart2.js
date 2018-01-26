var ctx = document.getElementById("insertchart").getContext('2d');
  var myDoughnutChart = new Chart(ctx, {
    responsive: true,
      type: 'doughnut',
      data: {
            labels: ['Man', 'Vrouw'],
            datasets: [{ data: [70, 55],backgroundColor: ['rgb(0, 210, 255)','rgb(225, 163, 0)'] }]
          },
      options: {}
  });
