<!-- resources/views/stok/index.blade.php -->

@extends('master')

@section('content')
    <div class="container-fluid">
        <main>
            <h1>StokMasuk</h1>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahstokModal">
                Tambah stok
            </button>


            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>tanggal</th>',
                        <th>Barcode</th>
                        <th>Namaproduk</th>
                        <th>jumlah</th>
                        <th>keterangan</th>
                        <th>Actions</th>
                    </tr>
                </thead id="stok-list">
                @foreach ($stok as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->barcode }}</td>
                        <td>{{ $data->namaproduk }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#modaleditstok{{ $data->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('hapusstok', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah yakin hapus?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </main>

        <!-- Modal Tambah stok -->
        <div class="modal fade" id="tambahstokModal" tabindex="-1" role="dialog" aria-labelledby="tambahstokLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahstokLabel">Tambah stok</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('stok') }}" method="POST" enctype="multipart/form-data" id="stokForm">
                            @csrf

                            <!-- Input Tanggal -->
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>

                            <!-- Input Barcode -->
                            <div class="form-group">
                                <label for="barcode">Barcode:</label>
                                <input type="text" class="form-control" id="barcode" name="barcode" required>
                            </div>

                            <!-- Input NamaProduk -->
                            <div class="form-group">
                                <label for="namaproduk">NamaProduk:</label>
                                <input type="text" class="form-control" id="namaproduk" name="namaproduk" required>
                            </div>

                            <!-- Input Satuan -->
                            <div class="form-group">
                                <label for="jumlah">Jumlah:</label>
                                <input type="text   " class="form-control" id="jumlah" name="jumlah" required>
                            </div>

                            <!-- Input Keterangan -->
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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

        <!-- Modal Edit stok -->
        @foreach ($stok as $data)
            <div class="modal fade" id="modaleditstok{{ $data->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modaleditstok{{ $data->id }}Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaleditstok{{ $data->id }}Label">Modal title
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('stokupdate', $data->id) }}" method="POST"
                                enctype="multipart/form-data" id="stokForm">
                                @csrf
                                @method('PUT')

                                <!-- Input Tanggal -->
                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required
                                        value="{{ $data->tannggal }}">
                                </div>

                                <!-- Input Barcode -->
                                <div class="form-group">
                                    <label for="barcode">Barcode:</label>
                                    <input type="text" class="form-control" id="barcode" name="barcode" required
                                        value="{{ $data->barcode }}">
                                </div>

                                <!-- Input NamaProduk -->
                                <div class="form-group">
                                    <label for="namaproduk">NamaProduk:</label>
                                    <input type="text" class="form-control" id="namaproduk" name="namaproduk"
                                        required value="{{ $data->namaproduk }}">
                                </div>

                                <!-- Input Satuan -->
                                <div class="form-group">
                                    <label for="jumlah">Jumlah:</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" required
                                        value="{{ $data->jumlah }}">
                                </div>

                                <!-- Input Keterangan -->
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <input type="number" class="form-control" id="keterangan" name="keterangan"
                                        required value="{{ $data->keteragan }}">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="savestokBtn">Save</button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
