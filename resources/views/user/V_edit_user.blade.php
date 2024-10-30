@extends('layouts.app_dashboard')

@push('title')
    Ubah Pengguna
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ubah Pengguna</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('users') }}">Pengguna</a></div>
                    <div class="breadcrumb-item">Ubah Pengguna</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('users.update', $user->uuid) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <x-input type="text" name="full_name" label="Nama Lengkap" :value="$user->full_name" placeholder="Masukkan Nama Lengkap" />
                                    <x-input type="text" name="nick_name" label="Nama Panggilan" :value="$user->nick_name" placeholder="Masukkan Nama Panggilan" />
                                    <x-input type="email" name="email" label="Email" :value="$user->email" placeholder="Masukkan Email" />
                                    <x-input type="password" name="password" label="Password" placeholder="Masukkan Password" class="pwstrength" data-indicator="pwindicator" autocomplete="new-password" />
                                    <x-input type="password" name="password_confirmation" label="Konfirmasi Password" placeholder="Konfirmasi Password" autocomplete="new-password" />
                                    <x-select name="role_id" label="Nama Peran" :options="$roles" :selected="$user->role_id" />
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
