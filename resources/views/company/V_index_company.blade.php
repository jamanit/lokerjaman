@extends('layouts.app_dashboard')

@push('title')
    Perusahaan
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Perusahaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Perusahaan</div>
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
                                                <th>Nama Perusahaan</th>
                                                <th>Email</th>
                                                <th>No. Telepon</th>
                                                <th>Website</th>
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

    @include('company.V_modal_company')
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
                ajax: "{{ route('companies.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        class: 'width-1'
                    }, {
                        data: 'company_name',
                        name: 'company_name'
                    }, {
                        data: 'email',
                        name: 'email'
                    }, {
                        data: 'phone_number',
                        name: 'phone_number'
                    }, {
                        data: 'website',
                        name: 'website'
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

                modaTitle.text('Hapus Perusahaan');
                form.attr('action', '/companies/' + itemId);
            });

            $('#formModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var modaTitle = $('.modal-title');
                var btnSubmit = $('.btn-submit');
                var form = $(this).find('#modalForm');
                var defaultImg = '{{ Storage::url('') }}images/no-image.svg'

                if (typeof itemId === 'undefined') {
                    modaTitle.text('Tambah Perusahaan');
                    btnSubmit.text('Simpan');
                    form.attr('action', '/companies');
                    form.append('<input type="hidden" name="_method" value="POST">');

                    form.find('#logoPreview').attr('src', defaultImg);
                    form.find('#logoLink').attr('href', defaultImg);
                    form.find('.modal-body input').val('');
                    form.find('.modal-body textarea').val('');
                    form.find('.modal-body select').val('');
                } else {
                    modaTitle.text('Ubah Perusahaan');
                    btnSubmit.text('Perbarui');
                    form.attr('action', '/companies/' + itemId);
                    form.append('<input type="hidden" name="_method" value="PUT">');

                    $.ajax({
                        url: '/companies/' + itemId + '/edit',
                        method: 'GET',
                        success: function(data) {
                            form.find('#company_name').val(data.company_name);
                            form.find('#company_type_id').val(data.company_type_id).change();

                            if (data.logo) {
                                var imageUrl = '{{ Storage::url('') }}' + data.logo;
                                form.find('#logoPreview').attr('src', imageUrl);
                                form.find('#logoLink').attr('href', imageUrl);
                            } else {
                                form.find('#logoPreview').attr('src', defaultImg);
                                form.find('#logoLink').attr('href', defaultImg);
                            }
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
