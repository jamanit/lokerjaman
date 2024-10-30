<div class="navbar-bg bg-gradient-purple"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <a href="{{ url('/') }}" class="navbar-brand sidebar-gone-hide">
        <img src="{{ Storage::url($brand_profile->logo) }}" alt="logo" width="50">
        {{ config('app.name', 'App Name') }}
    </a>
    <a href="{{ url('/') }}" class="navbar-brand sidebar-gone-show">
        <img src="{{ Storage::url($brand_profile->logo) }}" alt="logo" width="50">
        <span>{{ config('app.name', 'App Name') }}</span>
    </a>
    <form class="form-inline ml-auto" method="POST" action="{{ route('home') }}">
        @csrf
        <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search" style="font-size: 20px;"></i></a></li>
        </ul>
        <div class="search-element">
            <input type="search" name="vacancy_search" id="vacancy_search" placeholder="Cari Lowongan" class="form-control" aria-label="Search" data-width="250" style="min-height: 45px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;" autocomplete="off">
            <button class="btn" type="submit" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
                <div class="search-header">
                    Tips
                </div>
                <div class="search-item">
                    <a>Cari lowongan berdasarkan nama perusahaan, tipe perusahaan, lokasi kerja, level pendidikan, posisi, tipe pekerjaan, persyaratan.</a>
                </div>
            </div>
        </div>
    </form>
    <div class="d-flex">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars" style="font-size: 25px;"></i></a>
    </div>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg radius-bottom-10">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}" class="nav-link"><i class="fas fa-home"></i><span>BERANDA</span></a>
            </li>
            <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                <a href="{{ url('about') }}" class="nav-link"><i class="fas fa-building"></i><span>TENTANG KAMI</span></a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                <a href="{{ url('contact') }}" class="nav-link"><i class="fas fa-tty"></i><span>KONTAK KAMI</span></a>
            </li>
            <li class="nav-item {{ Request::is('post_vacancy') ? 'active' : '' }}">
                <a href="{{ url('post_vacancy') }}" class="nav-link"><i class="fas fa-paper-plane"></i><span>PASANG LOWONGAN</span></a>
            </li>
        </ul>
    </div>
</nav>
