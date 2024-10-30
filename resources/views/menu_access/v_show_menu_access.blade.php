@extends('layouts.app_dashboard')

@push('title')
    Akses Menu
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Akses Menu</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('roles') }}">Peran</a></div>
                    <div class="breadcrumb-item">Akses Menu</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <form action="{{ route('menu_accesses.store') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ !empty($role_list) ? 'Nama Peran: ' . $role_list->role_name : '' }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-serverside">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th>#</th>
                                                    <th>Nama Menu</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; @endphp
                                                @foreach ($menu_list as $menu)
                                                    @php
                                                        $checked = '';
                                                        $accessmenu = App\Models\M_menu_access::where('first_menu_id', $menu->first_menu_id)
                                                            ->where('second_menu_id', $menu->second_menu_id)
                                                            ->where('role_id', $role_list->id)
                                                            ->first();
                                                        if ($accessmenu) {
                                                            $checked = 'checked';
                                                        }
                                                    @endphp
                                                    <tr class="menu-row">
                                                        <input type="hidden" name="role_id" id="role_id" value="{{ $role_list->id }}">
                                                        <td class="width-1">{{ $i++ }}</td>
                                                        <td>{{ implode(' > ', array_filter([$menu->first_menu_name, $menu->second_menu_name])) }}</td>
                                                        <td class="width-1 text-nowrap">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" name="id_menu[]" id="id_menu" value="{{ $role_list->id . ',' . $menu->first_menu_id . ',' . $menu->second_menu_id }}" {{ $checked }}>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">Aktif</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
            $('.menu-row').click(function() {
                var checkbox = $(this).find('#id_menu');
                checkbox.prop('checked', !checkbox.prop('checked'));
            });
        });
    </script>
@endpush
