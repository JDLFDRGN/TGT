<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
fetch('./retrieve-today-sales.php').then(res=>res.json()).then(data=>{
  var xValues = [];
  var yValues = [];
  
  data.forEach(e=>{
    let time = e.sold_at.split(' ')[1];
    xValues.push(time);
    yValues.push(e.price);
  })

  new Chart("line", {
    type: "line",
    data: {
      labels: xValues,
      datasets: [{
        label: 'Sales today',
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(255,0,0,1)",
        borderColor: "rgba(58,65,111,1)",
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      scales: {
        
      }
    }
  });
})
</script>

<script>
fetch('./retrieve-top-three.php').then(res=>res.json()).then(data=>{
  let top1 = data[0];
  let top2 = data[1];
  let top3 = data[2];

  $('.top1').text(top1['brand']);
  $('.top2').text(top2['brand']);
  $('.top3').text(top3['brand']);

  $('.top1-sold').text(top1['sold']);
  $('.top2-sold').text(top2['sold']);
  $('.top3-sold').text(top3['sold']);

  const donut = document.getElementById('donut').getContext('2d');
  const donutChart = new Chart(donut, {
      type: 'doughnut',
      data: {
          datasets: [{
              data: [top1['sold'], top2['sold'], top3['sold']],
              backgroundColor: [
                  'rgba(255, 0, 0, 0.6)',
                  'rgba(54, 162, 235, 0.6)',
                  'rgba(255, 206, 86, 0.6)'
              ],
              borderColor: [
                  'rgba(255, 0, 0, 0.6)',
                  'rgba(54, 162, 235, 0.6)',
                  'rgba(255, 206, 86, 0.6)'
              ],
              borderWidth: 1
          }]
      },
      options: {
        plugins: {
            legend: {
              position: 'right'
            }
        }
      }
  });
})
</script>
