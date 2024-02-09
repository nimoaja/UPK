<!-- resources/views/stok/index.blade.php -->

@extends('master')

@section('content')
    <div class="container-fluid">
        <main>
            <h1>Stok Keluara</h1>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahstokkeluarModal">
                Tambah stokkeluar
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
                </thead id="stokkeluar-list">
                @foreach ($stokkeluar as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->barcode }}</td>
                        <td>{{ $data->namaproduk }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#modaleditstokkeluar{{ $data->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('hapusstokkeluar', $data->id) }}" method="POST" enctype="multipart/form-data">
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
        <div class="modal fade" id="tambahstokkeluarModal" tabindex="-1" role="dialog"
            aria-labelledby="tambahstokkeluarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahstokkeluarLabel">Tambah stokkeluar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('stokkeluar') }}" method="POST" enctype="multipart/form-data">
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
        @foreach ($stokkeluar as $data)
            <div class="modal fade" id="modaleditstokkeluar{{ $data->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modaleditstokkeluar{{ $data->id }}Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaleditstokkeluar{{ $data->id }}Label">Modal title
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('stokkeluarupdate', $data->id) }}" method="POST"
                                enctype="multipart/form-data" id="stokkeluarForm">
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
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        required value="{{ $data->keterangan }}">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="savestokkeluarBtn">Save</button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
