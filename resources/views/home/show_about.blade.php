@extends('layouts.app_home')

@push('title')
    Tentang Kami
@endpush

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <section class="section">
                    <div class="section-body">
                        <h2 class="section-title mb-3">Tetang Kami</h2>
                        <div class="card radius-10">
                            <div class="card-header align-items-center">
                                <img src="{{ Storage::url($brand_profile->logo) }}" class="mr-3" alt="logo" width="100">
                                <h2 class="m-0">{{ config('app.name', 'App Name') }}</h2>
                            </div>
                            <div class="card-body">
                                <p>{!! $brand_profile->about !!}</p>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endSection

@push('styles')
@endpush

@push('scripts')
@endpush
