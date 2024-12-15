@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid py-4">
    <div class="head-text text-weight-bolder">
      <h1>Semua Barang</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-1 p-sm-4">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-white text-s font-weight-bold">ID</th>
                    <th class="text-center text-uppercase text-white text-s font-weight-bold">Foto Barang</th>
                    <th class="text-uppercase text-white text-s font-weight-bold p-0">Nama</th>
                    <th class="text-center text-uppercase text-white text-s font-weight-bold">Kondisi</th>
                    <th class="text-uppercase text-white text-s font-weight-bold p-0">Tanggal Beli</th>
                    <th class="text-uppercase text-white text-s font-weight-bold p-0">Lokasi</th>
                    <th class="text-uppercase text-white text-s font-weight-bold p-0">Kategori</th>
                    <th class="text-white"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle font-weight-bold text-center text-s">
                      <span>#001</span>
                    </td>
                    <td class="align-middle text-center text-s">
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-xl" alt="">
                    </td>
                    <td>
                      <span class="text-s font-weight-bold mb-0">Stella Aerosol Orange 400ml</span>
                    </td>
                    <td class="align-middle text-center text-s font-weight-bold">
                      <span>60%</span>
                    </td>
                    <td>
                      <span class="text-s font-weight-bold mb-0">1 November 2024</span>
                    </td>
                    <td>
                      <span class="text-s font-weight-bold mb-0">Ruang Tengah</span>
                    </td>
                    <td>
                      <span class="text-s font-weight-bold mb-0">Pengharum</span>
                    </td>
                    <td>
                      <a href="{{ route('see') }}" class="btx btx-primary mb-0 text-s">Lihat Barang</a>
                    </td>
                    
                  </tr>
                  <tr>
                    <td class="align-middle font-weight-bold text-center text-s">
                      <span>#001</span>
                    </td>
                    <td class="align-middle text-center text-s">
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-xl" alt="">
                    </td>
                    <td>
                      <span class="text-s font-weight-bold mb-0">Stella Aerosol Orange 400ml</span>
                    </td>
                    <td class="align-middle text-center text-s font-weight-bold">
                      <span>60%</span>
                    </td>
                    <td>
                      <span class="text-s font-weight-bold mb-0">1 November 2024</span>
                    </td>
                    <td>
                      <span class="text-s font-weight-bold mb-0">Ruang Tengah</span>
                    </td>
                    <td>
                      <span class="text-s font-weight-bold mb-0">Pengharum</span>
                    </td>
                    <td>
                      <a href="{{ route('see') }}" class="btx btx-primary mb-0 text-s">Lihat Barang</a>
                    </td>
                    
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection
@push('dashboard')
  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
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
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
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
                color: '#b2b9bf',
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
                color: '#b2b9bf',
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
    }
  </script>
@endpush

