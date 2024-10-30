@extends('layouts.app_dashboard')

@push('title')
    Profil Lokerjaman
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profil Lokerjaman</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Profil Lokerjaman</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <form action="{{ route('brand_profiles.update', $brand_profile->uuid) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <x-input type="file" name="logo" label="Logo" :value="$brand_profile->logo" placeholder="Masukkan Logo" />
                                    <hr>
                                    <x-textarea type="text" name="about" :value="$brand_profile->about" label="Tentang Kami" placeholder="Masukkan Tentang Kami" class="ckeditor1" rows="5" />
                                    <hr>
                                    <x-textarea type="text" name="contact" :value="$brand_profile->contact" label="Kontak Kami" placeholder="Masukkan Kontak Kami" class="ckeditor2" rows="5" />
                                    <hr>
                                    <x-textarea type="text" name="post_vacancy" :value="$brand_profile->post_vacancy" label="Pasang Lowongan" placeholder="Masukkan Pasang Lowongan" class="ckeditor3" rows="5" />
                                    <hr>
                                    <x-textarea type="text" name="google_maps" :value="$brand_profile->google_maps" label="Google Maps" placeholder="Masukkan Google Maps" rows="5" />
                                </div>
                                <div class="card-footer bg-whitesmoke">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Perbarui</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
