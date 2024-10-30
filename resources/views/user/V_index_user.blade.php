@extends('layouts.app_dashboard')

@push('title')
    Pengguna
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengguna</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Pengguna</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-costume">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>#</th>
                                                <th>Nama Lengkap</th>
                                                <th>Nama Panggilan</th>
                                                <th>Email</th>
                                                <th>Nama Peran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <x-delete-modal :title="'Hapus Pengguna'" :message="'Apakah kamu ingin melanjutkan?'" />
@endsection

@push('styles')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#table-costume").DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, 'desc']
                ],
                ajax: "{{ route('users.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        class: 'width-1',
                    }, {
                        data: 'full_name',
                        name: 'full_name'
                    }, {
                        data: 'nick_name',
                        name: 'nick_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role_name',
                        name: 'role_name'
                    },
                    {
                        data: 'uuid',
                        class: 'text-nowrap width-1',
                        "render": function(data, type, row) {
                            return `
                                <a href="/users/${data}/edit" class="btn btn-warning btn-sm" title="Ubah">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteModal" data-id="${data}" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </a>
                            `;
                        }
                    },
                ]
            });

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var form = $(this).find('#deleteForm');
                form.attr('action', '/users/' + itemId);
            });
        });
    </script>
@endpush
