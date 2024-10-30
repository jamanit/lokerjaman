<footer class="main-footer bg-dark-blue text-light">
    <div class="footer-left">
        Hak cipta &copy; {{ config('app.brand', 'Brand') . ' ' . config('app.year', 'Year') }} <div class="bullet"></div> Dikembangkan Oleh <a href="#">{{ config('app.created_by', 'Created By') }}</a>
    </div>
    <div class="footer-right">
        <h6><a href="{{ url('about') }}">Tentang Kami</a> || <a href="{{ url('contact') }}">Kontak Kami</a></h6>
    </div>
</footer>
