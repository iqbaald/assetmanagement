@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
  <div class="container-fluid py-4">

    <div class="row justify-content-center align-items-center">
      <div class="col-8">
        <div class="head-text text-weight-bolder">
          <h1>Edit Barang</h1>
          <a href="{{ route('dashboard') }}" class="btx btx-primary px-5">Kembali</a>
        </div>
        <div class="card">
          <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row g-3 mb-3">
                <div class="col-md-3">
                  <label for="id_barang" class="form-label">ID Barang</label>
                  <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="#" required>
                </div>
                <div class="col-md-9">
                  <label for="nama_barang" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang..." required>
                </div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-4">
                  <label for="kondisi_barang" class="form-label">Kondisi Barang (%)</label>
                  <input type="number" class="form-control" id="kondisi_barang" name="kondisi_barang" min="0" max="100" placeholder="Contoh: 85" required>
                </div>
                <div class="col-md-4">
                  <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
                  <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" required>
                </div>
                <div class="col-md-4">
                  <label for="harga_beli" class="form-label">Harga Beli</label>
                  <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Rp" required>
                </div>
              </div>

              <div class="row g-3 mb-4">
                <div class="col-md-6">
                  <label for="kategori_barang" class="form-label">Kategori Barang</label>
                  <select class="form-select" id="kategori_barang" name="kategori_barang" required>
                    <option selected disabled>-- Pilih salah satu --</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Furnitur">Furnitur</option>
                    <option value="Perlengkapan">Perlengkapan</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="lokasi_barang" class="form-label">Lokasi Barang</label>
                  <select class="form-select" id="lokasi_barang" name="lokasi_barang" required>
                    <option selected disabled>-- Pilih salah satu --</option>
                    <option value="Gudang Utama">Gudang Utama</option>
                    <option value="Ruang Kantor">Ruang Kantor</option>
                  </select>
                </div>
              </div>

              <div class="row g-3 mb-4">
                <div class="col-md-6">
                  <label for="harga_jual" class="form-label">Harga Jual</label>
                  <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Rp" required>
                </div>
                <div class="col-md-6">
                  <label for="foto_barang" class="form-label">Upload Foto Barang</label>
                  <input type="file" class="form-control" id="foto_barang" name="foto_barang" accept="image/*" required>
                  <small class="text-muted">Maksimal ukuran foto 2 MB</small>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btx btx-primary px-5">Edit Barang</button>
              </div>
            </form>
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

