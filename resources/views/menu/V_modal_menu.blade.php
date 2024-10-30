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

<div class="modal fade" tabindex="-1" role="dialog" id="formModal-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalForm-1" method="POST">
                @csrf
                <div class="modal-body">
                    <x-input type="text" name="first_menu_name" label="Nama Menu Pertama" placeholder="Masukkan Nama Menu Pertama" />
                    <x-input type="text" name="first_menu_link" label="Link Menu Pertama" placeholder="Masukkan Link Menu Pertama" />
                    <x-input type="text" name="first_menu_icon" label="Icon Menu Pertama" placeholder="Masukkan Icon Menu Pertama" />
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary btn-loading btn-submit" data-loading-text="Memuat"></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="formModal-2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalForm-2" method="POST">
                @csrf
                <div class="modal-body">
                    <x-select name="first_menu_id" label="Nama Menu Pertama" :options="$menu_first_list" />
                    <x-input type="text" name="second_menu_name" label="Nama Menu Kedua" placeholder="Masukkan Nama Menu Kedua" />
                    <x-input type="text" name="second_menu_link" label="Link Menu Kedua" placeholder="Masukkan Link Menu Kedua" />
                    <x-input type="text" name="second_menu_icon" label="Icon Menu Kedua" placeholder="Masukkan Icon Menu Kedua" />
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary btn-loading btn-submit" data-loading-text="Memuat"></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
