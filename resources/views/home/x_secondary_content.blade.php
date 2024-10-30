<div class="col-lg-4">
    <div class="row">
        @if ($swasta_vacancies->count() > 0)
            <div class="col-lg-12">
                <section class="section">
                    <div class="section-body">
                        <h2 class="section-title mb-3">Swasta</h2>
                        <div class="card radius-10">
                            <div class="card-body">
                                @foreach ($swasta_vacancies as $index => $swasta_vacancy)
                                    <a href="{{ url('/show/' . $swasta_vacancy->id . '/Lowongan+Kerja+' . urlencode($swasta_vacancy->company_name)) }}" class="custom-ahref d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $swasta_vacancy->logo) }}" class="img-fluid mr-3" width="25">
                                        <div class="m-0 h6 font-weight-bold title-text-limit">{{ $swasta_vacancy->company_name }}</div>
                                    </a>
                                    @if ($index < count($swasta_vacancies) - 1)
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endif
        @if ($bumn_vacancies->count() > 0)
            <div class="col-lg-12">
                <section class="section">
                    <div class="section-body">
                        <h2 class="section-title mb-3">BUMN</h2>
                        <div class="card radius-10">
                            <div class="card-body">
                                @foreach ($bumn_vacancies as $index => $bumn_vacancy)
                                    <a href="{{ url('/show/' . $bumn_vacancy->id . '/Lowongan+Kerja+' . urlencode($bumn_vacancy->company_name)) }}" class="custom-ahref d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $bumn_vacancy->logo) }}" class="img-fluid mr-3" width="25">
                                        <div class="m-0 h6 font-weight-bold title-text-limit">{{ $bumn_vacancy->company_name }}</div>
                                    </a>
                                    @if ($index < count($bumn_vacancies) - 1)
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endif
    </div>
</div>
