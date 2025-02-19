@extends('layouts.app')

@section('auth')


    @if(\Request::is('static-sign-up')) 
        @yield('content')
    
    @elseif (\Request::is('static-sign-in')) 
            @yield('content')
    
    @else
        @if (\Request::is('rtl'))  
            @include('layouts.navbars.auth.sidebar-rtl')
            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-hidden">
                @include('layouts.navbars.auth.nav-rtl')
                <div class="container-fluid py-4">
                    @yield('content')
                </div>
            </main>

        @elseif (\Request::is('profile'))  
            <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
                @include('layouts.navbars.auth.nav')
                @yield('content')
            </div>

        @elseif (\Request::is('virtual-reality')) 
            @include('layouts.navbars.auth.nav')
            <div class="border-radius-xl mt-3 mx-3 position-relative" style="background-image: url('../assets/img/vr-bg.jpg') ; background-size: cover;">
                <main class="main-content border-radius-lg">
                    @yield('content')
                </main>
            </div>

        @else
            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg {{ (Request::is('rtl') ? 'overflow-hidden' : '') }}">
                @include('layouts.navbars.auth.nav')
                <div class="container-fluid py-4">
                    @yield('content')
                </div>
            </main>
        @endif

        @include('components.fixed-plugin')
    @endif

    

@endsection