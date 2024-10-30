@extends('layouts.app_dashboard')

@push('title')
    Lokasi
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Lokasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Lokasi</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-serverside">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>#</th>
                                                <th>Nama Lokasi</th>
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

    @include('location.V_modal_location')
@endsection

@push('styles')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#table-serverside").DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, 'desc']
                ],
                ajax: "{{ route('locations.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        class: 'width-1'
                    }, {
                        data: 'location_name',
                        name: 'location_name'
                    },
                    {
                        data: 'uuid',
                        class: 'width-1 text-nowrap',
                        "render": function(data, type, row) {
                            return ` 
                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#formModal" data-id="${data}" title="Ubah">
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
                var modaTitle = $('.modal-title');
                var form = $(this).find('#deleteForm');

                modaTitle.text('Hapus Lokasi');
                form.attr('action', '/locations/' + itemId);
            });

            $('#formModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var modaTitle = $('.modal-title');
                var btnSubmit = $('.btn-submit');
                var form = $(this).find('#modalForm');

                if (typeof itemId === 'undefined') {
                    modaTitle.text('Tambah Lokasi');
                    btnSubmit.text('Simpan');
                    form.attr('action', '/locations');
                    form.append('<input type="hidden" name="_method" value="POST">');

                    form.find('.modal-body input').val('');
                } else {
                    modaTitle.text('Ubah Lokasi');
                    btnSubmit.text('Perbarui');
                    form.attr('action', '/locations/' + itemId);
                    form.append('<input type="hidden" name="_method" value="PUT">');

                    $.ajax({
                        url: '/locations/' + itemId + '/edit',
                        method: 'GET',
                        success: function(data) {
                            form.find('#location_name').val(data.location_name);
                        },
                        error: function(xhr) {
                            console.error("Error fetching data:", xhr);
                        }
                    });
                }
            });
        });
    </script>
@endpush
