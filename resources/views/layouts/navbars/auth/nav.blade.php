<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mb-0 shadow-none" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <img src="../assets/img/logo-web-lorem.png" alt="logo-web">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar"> 
            <div class="nav-item d-flex gap-1 gap-sm-3 align-self-end">
                <a href="/" class="btx {{ request()->is('/') ? 'btx-primary active' : 'btx-trans' }} active mb-0" role="button" aria-pressed="true">
                    <span class="mobhide">Lihat Barang</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="2"> <path d="M13 5h8"></path> <path d="M13 9h5"></path> <path d="M13 15h8"></path> <path d="M13 19h5"></path> <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path> <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path> </svg> 
                </a>
                <a href="/add" class="btx {{ request()->is('add') ? 'btx-primary active' : 'btx-trans' }} mb-0" role="button" aria-pressed="true">
                    <span class="mobhide">Tambah Barang</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="16" height="16" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor">
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                      </svg>
                </a>
                <a href="/search" class="btx {{ request()->is('search') ? 'btx-primary active' : 'btx-trans' }} mb-0" role="button" aria-pressed="true">
                    <span class="mobhide">Cari Barang</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="2">
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                        <path d="M21 21l-6 -6"></path>
                      </svg>
                </a>
            </div>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar -->