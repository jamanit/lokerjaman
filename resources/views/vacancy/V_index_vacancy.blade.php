@extends('layouts.app_dashboard')

@push('title')
    Lowongan
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Lowongan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Lowongan</div>
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
                                <a href="{{ route('vacancies.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-costume">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>#</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Judul</th>
                                                <th>Dibuat</th>
                                                <th>Status Posting</th>
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
                ajax: "{{ route('vacancies.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        class: 'width-1',
                    }, {
                        data: 'company_name',
                        name: 'company_name'
                    }, {
                        data: 'title',
                        name: 'title'
                    }, {
                        data: 'created_at',
                        name: 'created_at'
                    }, {
                        data: 'post_status',
                        name: 'post_status'
                    },
                    {
                        data: 'uuid',
                        class: 'text-nowrap width-1',
                        "render": function(data, type, row) {
                            return `
                                <a href="/vacancies/${data}/edit" class="btn btn-warning btn-sm" title="Ubah">
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
                form.attr('action', '/vacancies/' + itemId);
            });
        });
    </script>
@endpush
