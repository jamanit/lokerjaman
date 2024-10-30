@if ($recomendations->count() > 0)
    <div class="d-flex align-items-center">
        <h6 class="mr-1">Rekomendasi:</h6>
        <marquee behavior="scroll" direction="left" scrollamount="10" onmouseover="this.stop();" onmouseout="this.start();">
            @foreach ($recomendations as $recomendation)
                <a href="{{ url('/show/' . $recomendation->id . '/Lowongan+Kerja+' . urlencode($recomendation->company_name)) }}" class="custom-ahref mr-5">
                    <img src="{{ asset('storage/' . $recomendation->logo) }}" class="img-fluid mr-1 m-0" width="25">
                    <span class="h6 font-weight-bold m-0">{{ $recomendation->company_name }}</span>
                </a>
            @endforeach
        </marquee>
    </div>
@endif
