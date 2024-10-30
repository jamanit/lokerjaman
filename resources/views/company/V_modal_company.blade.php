<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah kamu ingin melanjutkan?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-loading">Iya</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="formModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <x-input type="file" name="logo" label="Logo" placeholder="Masukkan Logo" />
                            <x-input type="text" name="company_name" placeholder="Nama Perusahaan">
                                <x-slot name="label">
                                    Nama Perusahaan<span class="text-danger">*</span>
                                </x-slot>
                            </x-input>
                            <x-input type="email" name="email" label="Email" placeholder="Masukkan Email" />
                            <x-input type="text" name="phone_number" label="No. Telepon" placeholder="Masukkan No. Telepon" />
                            <x-input type="text" name="website" label="Website" placeholder="Masukkan Website" />
                        </div>
                        <div class="col-md-6">
                            <x-input type="text" name="address" label="Alamat" placeholder="Masukkan Alamat" />
                            <x-select name="company_type_id" :options="$company_types">
                                <x-slot name="label">
                                    Tipe Perusaaan<span class="text-danger">*</span>
                                </x-slot>
                            </x-select>
                            <x-textarea type="text" name="description" label="Deskripsi" placeholder="Masukkan Deskripsi" rows="5" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary btn-loading btn-submit" data-loading-text="Memuat"></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
