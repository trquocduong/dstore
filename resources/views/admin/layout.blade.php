@php 
$bills = \App\Models\BillModel::count();
@endphp
@php
use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  @include('admin.components.linkcss')
</head>
<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100">
    </div>


    @include('admin.components.aside')
    @yield('content')
 
    @include('admin.components.footer')
    
</body>
@include('admin.components.linkjs')
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var billsCount = @json($bills);

  var ctx1 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
  gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

  new Chart(ctx1, {
      type: "line",
      data: {
          labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
          datasets: [{
              label: "Đơn hàng",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#5e72e4",
              backgroundColor: gradientStroke1,
              borderWidth: 3,
              fill: true,
              data: [0, 0, 0, 0, 10, 0, billsCount, 0, 0, 0, 0, 0],
              maxBarThickness: 6
          }],
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
              legend: {
                  display: false,
              }
          },
          interaction: {
              intersect: false,
              mode: 'index',
          },
          scales: {
              y: {
                  grid: {
                      drawBorder: false,
                      display: true,
                      drawOnChartArea: true,
                      drawTicks: false,
                      borderDash: [5, 5]
                  },
                  ticks: {
                      display: true,
                      padding: 10,
                      color: '#fbfbfb',
                      font: {
                          size: 11,
                          family: "Open Sans",
                          style: 'normal',
                          lineHeight: 2
                      },
                  }
              },
              x: {
                  grid: {
                      drawBorder: false,
                      display: false,
                      drawOnChartArea: false,
                      drawTicks: false,
                      borderDash: [5, 5]
                  },
                  ticks: {
                      display: true,
                      color: '#ccc',
                      padding: 20,
                      font: {
                          size: 11,
                          family: "Open Sans",
                          style: 'normal',
                          lineHeight: 2
                      },
                  }
              },
          },
      },
  });
</script>
</html>