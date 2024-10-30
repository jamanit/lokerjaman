@extends('layouts.app_home')

@push('title')
    Rincian Lowongan
@endpush

@section('content')
    <div class="main-content">
        @include('home.x_recomendation')

        <div class="row">
            <div class="col-lg-8">
                <section class="section">
                    <div class="section-body">
                        <h2 class="section-title mb-3">Daftar Lowongan</h2>

                        @if ($company->count() > 0)
                            <div class="card radius-10">
                                @include('home.x_header', ['label_visit' => 'Perusahaan dilihat:'])

                                <div class="card-body">
                                    @foreach ($vacancies as $index => $vacancy)
                                        <a href="{{ url('/detail/' . $vacancy->id . '/Lowongan+Kerja+' . urlencode($company->company_name)) }}" class="custom-ahref title-text-limit">
                                            <h6>{{ $vacancy->title }}</h6>
                                        </a>
                                        <small>Diposting: {{ date('d-m-Y H:i', strtotime($vacancy->created_at)) }} WIB</small>
                                        @if ($index < count($vacancies) - 1)
                                            <hr>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="card-footer bg-whitesmoke radius-bottom-10">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-secondary share-content text-dark">
                                            <i class="fa fa-share"></i> Bagikan
                                        </button>
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

                </section>
            </div>

            @include('home.x_secondary_content')

        </div>
    </div>
@endSection

@push('styles')
    <style>
        @media (max-width: 576px) {
            .q-h3 {
                font-size: 1.2rem !important;
            }

            .q-h4 {
                font-size: 1rem !important;
            }

            .q-h6 {
                font-size: 0.8rem !important;
            }

            .q-img {
                width: 80px;
            }
        }

        @media (min-width: 768px) {
            .q-h3 {
                font-size: 1.4rem !important;
            }

            .q-h4 {
                font-size: 1.2rem !important;
            }

            .q-h6 {
                font-size: 0.9rem !important;
            }

            .q-img {
                width: 85px;
            }
        }

        @media (min-width: 1200px) {
            .q-h3 {
                font-size: 1.6rem !important;
            }

            .q-h4 {
                font-size: 1.4rem !important;
            }

            .q-h6 {
                font-size: 1rem !important;
            }

            .q-img {
                width: 90px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            var id = {{ $company->id }};
            var modelType = 'company';

            $.ajax({
                url: '/visit/' + id + '/' + modelType,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#total_visit').text(response.total_visit);
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        });
    </script>
@endpush
