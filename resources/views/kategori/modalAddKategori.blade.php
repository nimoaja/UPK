<div class="modal fade" id="tambahkategoriModal" tabindex="-1" role="dialog" aria-labelledby="tambahstokLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahstokLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tambahKategori') }}" method="POST" enctype="multipart/form-data"
                    id="stokForm">
                    @csrf
                    <!-- Input NamaProduk -->
                    <div class="form-group">
                        <label for="namaproduk">NamaProduk:</label>
                        <input type="text" class="form-control" id="namaproduk" name="nama_kategori" required>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="savePenjualanBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
