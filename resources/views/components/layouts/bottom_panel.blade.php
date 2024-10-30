<footer class="main-footer bg-dark-blue text-light radius-top-10">
    <div class="text-center">
        <span>
            Hak cipta &copy; {{ config('app.brand', 'Brand') . ' ' . config('app.year', 'Year') }}
            <i class="bullet"></i> Dikembangkan Oleh <a href="#">{{ config('app.created_by', 'Created By') }}</a>
        </span>
        <h6><a href="{{ url('about') }}">Tentang Kami</a> || <a href="{{ url('contact') }}">Kontak Kami</a></h6>
    </div>
</footer>
