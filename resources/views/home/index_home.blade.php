@extends('layouts.app_home')

@push('title')
    Beranda
@endpush

@section('content')
    <div class="main-content">
        @include('home.x_recomendation')

        <div class="row">
            <div class="col-md-8">
                <section class="section">
                    <div class="section-body">
                        <h2 class="section-title mb-3">Lowongan Terbaru</h2>

                        @if ($companies->count() > 0)
                            <div class="card radius-10">
                                <div class="card-body">
                                    @foreach ($companies as $index => $company)
                                        <a href="{{ url('/show/' . $company->id . '/Lowongan+Kerja+' . urlencode($company->company_name)) }}" class="mr-5 custom-ahref d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $company->logo) }}" class="img-fluid q-img" width="35">
                                            <span class="ml-3 m-0 h5 font-weight-bold title-text-limit">{{ $company->company_name }}</span>
                                        </a>
                                        <p class="mt-2 mb-2 line-height text-justify description-text-limit">{{ $company->description }}</p>
                                        <small>Diperbarui: {{ date('d-m-Y H:i', strtotime($company->vacancies->first()->created_at)) }} WIB</small>
                                        @if ($index < count($companies) - 1)
                                            <hr>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="card-footer bg-whitesmoke radius-bottom-10">
                                    <div class="d-flex justify-content-center">
                                        {{ $companies->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Data tidak ditemukan!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                    </div>
                </section>
            </div>

            @include('home.x_secondary_content')

        </div>
    </div>
@endSection

@push('styles')
@endpush

@push('scripts')
@endpush
