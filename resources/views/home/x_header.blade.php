<div class="card-header" style="display: block !important;">
    <div class="d-flex align-items-center mb-3">
        <img src="{{ asset('storage/' . $company->logo) }}" class="img-fluid mr-3 q-img" width="100">
        <div>
            <div class="q-h3 mb-0 font-weight-bold">{{ $company->company_name }}</div>
            <div class="q-h6 text-muted">{{ $company->company_type->company_type }}</div>
            <div class="q-h6 text-muted">{{ $label_visit }} <span id="total_visit"></span> kali</div>
        </div>
    </div>
    @if ($company->description)
        <p class="m-0 text-justify">{{ $company->description }}</p>
    @endif
    @if ($company->website)
        <p class="m-0">Website: {{ $company->website }}</p>
    @endif
    @if ($company->telepone)
        <p class="m-0">Telepon: {{ $company->telepone }}</p>
    @endif
    @if ($company->email)
        <p class="m-0">Email: {{ $company->email }}</p>
    @endif
    @if ($company->address)
        <p class="m-0">Alamat: {{ $company->address }}</p>
    @endif
</div>
