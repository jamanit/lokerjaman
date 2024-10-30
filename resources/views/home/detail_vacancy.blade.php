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
                        <h2 class="section-title mb-3">Rincian Lowongan</h2>

                        @if ($company->count() > 0)
                            <div class="card radius-10">
                                @include('home.x_header', ['label_visit' => 'Lowongan dilihat:'])

                                <div class="card-body">
                                    <div class="mb-3 q-h4 font-weight-bold border-bottom">{{ $vacancy->title }}</div>
                                    @if ($vacancy->description)
                                        <ul class="list-group mb-3">
                                            <span class="q-h6 font-weight-bold border-bottom">DESKRIPSI:</span>
                                            <li class="list-group-item border">
                                                <p class="text-justify"> {!! $vacancy->description !!}</p>
                                            </li>
                                        </ul>
                                    @endif
                                    @if ($vacancy->requirements)
                                        <ul class="list-group mb-3">
                                            <span class="q-h6 font-weight-bold border-bottom">PERSYARATAN:</span>
                                            <li class="list-group-item border">
                                                <p class="text-justify"> {!! $vacancy->requirements !!}</p>
                                            </li>
                                        </ul>
                                    @endif
                                    @if ($vacancy->location && $vacancy->location->location_name)
                                        <p class="text-justify m-0"><span class="q-h6 font-weight-bold border-bottom">LOKASI:</span> {{ $vacancy->location->location_name }}</p>
                                    @endif
                                    @if ($vacancy->education_level && $vacancy->education_level->education_level)
                                        <p class="text-justify m-0"><span class="q-h6 font-weight-bold border-bottom">PENDIDIKAN:</span> {{ $vacancy->education_level->education_level }}</p>
                                    @endif
                                    @if ($vacancy->job_type && $vacancy->job_type->job_type)
                                        <p class="text-justify m-0"><span class="q-h6 font-weight-bold border-bottom">TIPE PEKERJAAN:</span> {{ $vacancy->job_type->job_type }}</p>
                                    @endif
                                    @if ($vacancy->experience_years)
                                        <p class="text-justify m-0"><span class="q-h6 font-weight-bold border-bottom">PENGALAMAN:</span> {{ $vacancy->experience_years }}</p>
                                    @endif
                                    @if ($vacancy->salary)
                                        <p class="text-justify m-0"><span class="q-h6 font-weight-bold border-bottom">GAJI:</span> {{ $vacancy->salary }}</p>
                                    @endif
                                    @if ($vacancy->expires_date)
                                        <p class="text-justify m-0"><span class="q-h6 font-weight-bold border-bottom">LOWONGAN BERAKHIR:</span> {{ date('d-m-Y', strtotime($vacancy->expires_date)) }}</p>
                                    @endif
                                </div>
                                <div class="card-footer bg-whitesmoke radius-bottom-10">
                                    <div class="d-flex">
                                        @if (!$vacancy->vacancy_links->isEmpty())
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#applyModal">
                                                <i class="fa fa-share"></i> Melamar
                                            </button>
                                        @endif
                                        <button class="btn btn-secondary share-content text-dark ml-auto">
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

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="applyModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Link Melamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($vacancy->vacancy_links->isEmpty())
                        <p>Tidak ada link yang tersedia.</p>
                    @else
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($vacancy->vacancy_links as $link)
                                    <div class="mb-3">
                                        <a href="{{ $link->job_link }}" target="_blank" class="btn btn-info d-block text-left">{{ $link->link_name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong class="border-bottom">Perhatian</strong>
                            <p>
                                1. Hati-hati penipuan yang mengatasnamakan kami atau perusahaan, seluruh proses seleksi di perusahaan ini TIDAK DIPUNGUT biaya apapun.
                                <br>
                                2. Laporkan apabila terdapat kesalahan dalam penulisan link, judul atau hal lainnya
                                <a href="{{ url('/') }}">disini</a>.
                                <br>
                                3. Jika link sudah tidak bisa lagi diakses kemungkinan lowongan sudah tutup/kouta pelamar telah terpenuhi. Silahkan melihat lowongan terbaru lainnya klik
                                <a href="{{ url('/') }}">disini</a>.
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
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

            .q-h5 {
                font-size: 0.9rem !important;
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

            .q-h5 {
                font-size: 1rem !important;
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

            .q-h5 {
                font-size: 1.2rem !important;
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
            var id = {{ $vacancy->id }};
            var modelType = 'vacancy';

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
