@extends('layouts.app_dashboard')

@push('title')
    Tambah Lowongan
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Lowongan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('vacancies') }}">Lowongan</a></div>
                    <div class="breadcrumb-item">Tambah Lowongan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('vacancies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{ url('companies') }}" class="btn btn-primary mr-1" title="Tambah Perusahaan"><i class="fas fa-plus"></i> Perusahaan</a>
                                    <a href="{{ url('locations') }}" class="btn btn-primary" title="Tambah Lokasi"><i class="fas fa-map-marker-alt"></i> Lokasi</a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-select name="company_id" :options="$companies" autofocus>
                                                <x-slot name="label">
                                                    Nama Perusahaan<span class="text-danger">*</span>
                                                </x-slot>
                                            </x-select>
                                        </div>
                                        <div class="col-md-6">
                                            <x-input type="text" name="title" placeholder="Masukkan Judul">
                                                <x-slot name="label">
                                                    Judul<span class="text-danger">*</span>
                                                </x-slot>
                                            </x-input>
                                        </div>
                                        <div class="col-md-12">
                                            <x-textarea type="text" name="description" label="Deskripsi" placeholder="Masukkan Deskripsi" class="ckeditor1" rows="5" />
                                            <x-textarea type="text" name="requirements" label="Persyaratan" placeholder="Masukkan Persyaratan" class="ckeditor2" rows="5" />
                                        </div>
                                        <div class="col-md-6">
                                            <x-select name="location_id" :options="$locations">
                                                <x-slot name="label">
                                                    Nama Lokasi<span class="text-danger">*</span>
                                                </x-slot>
                                            </x-select>
                                            <x-select name="education_level_id" label="Tingkat Pendidikan" :options="$education_levels" />
                                            <x-select name="job_type_id" label="Tipe Pekerjaan" :options="$job_types" />
                                            <x-input type="text" name="salary" label="Gaji" placeholder="Masukkan Gaji" />
                                        </div>
                                        <div class="col-md-6">
                                            <x-input type="text" name="experience_years" label="Tahun Pengalaman" placeholder="Masukkan Tahun Pengalaman" />
                                            <x-input type="date" name="expires_date" label="Tanggal Kadaluarsa" placeholder="Masukkan Tanggal Kadaluarsa" />
                                            <x-select name="post_status_id" :options="$post_status">
                                                <x-slot name="label">
                                                    Status Posting<span class="text-danger">*</span>
                                                </x-slot>
                                            </x-select>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                            <label for="">Link Lowongan</label>

                                            <div class="link-container">
                                                @if (old('link_name') && old('job_link'))
                                                    @foreach (old('link_name') as $index => $link_name)
                                                        <div class="row mb-3 row_link">
                                                            <div class="col-6 col-md-4">
                                                                <input type="text" name="link_name[]" value="{{ $link_name }}" placeholder="Masukkan Nama Link" class="form-control @error('link_name.' . $index) is-invalid @enderror">
                                                                <div class="invalid-feedback font-weight-bold" role="alert">
                                                                    @error('link_name.' . $index)
                                                                        {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-md-8">
                                                                <input type="text" name="job_link[]" value="{{ old('job_link')[$index] }}" placeholder="Masukkan Link Lowongan" class="form-control @error('job_link.' . $index) is-invalid @enderror">
                                                                <div class="invalid-feedback font-weight-bold" role="alert">
                                                                    @error('job_link.' . $index)
                                                                        {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="row mb-3 row_link">
                                                        <div class="col-6 col-md-4">
                                                            <input type="text" name="link_name[]" placeholder="Masukkan Nama Link" class="form-control">
                                                        </div>
                                                        <div class="col-6 col-md-8">
                                                            <input type="text" name="job_link[]" placeholder="Masukkan Link Lowongan" class="form-control">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="d-flex">
                                                <span class="text-info">Kosongkan data link untuk membatalkan.</span>
                                                <button type="button" class="btn btn-sm btn-secondary ml-auto btn-add-link">Tambah Link</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="Memuat">Simpan</button>
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
    <script>
        $(document).ready(function() {
            let linkCounter = $('.row_link').length;

            $('.btn-add-link').click(function(e) {
                e.preventDefault();

                if (linkCounter < 4) {
                    let newLink = ` 
                        <div class="row mb-3">
                            <div class="col-6 col-md-4">
                                <input type="text" name="link_name[]" placeholder="Masukkan Nama Link" class="form-control">
                            </div>
                            <div class="col-6 col-md-8">
                                <input type="text" name="job_link[]" placeholder="Masukkan Link Lowongan" class="form-control">
                            </div>
                        </div> 
                    `;
                    $('.link-container').append(newLink);
                    linkCounter++;
                } else {
                    alert("Maksimal 4 link sudah ditambahkan.");
                }
            });
        });
    </script>
@endpush
