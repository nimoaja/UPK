@extends('master')

@section('content')
    <div class="container-fluid">


        <main>
            <h2 class="text-center">Daftar Penjualan</h2>
            <h1 class="text-center">Selamat datang di Halaman Penjualan</h1>
            <!-- Button trigger modal -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPenjualanModal">
                Tambah Penjualan
            </button>

            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Diskon</th>
                        <th>Stok</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="penjualan-list">
                    @foreach ($penjualans as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->namabarang }}</td>
                            <td>{{ $data->merek }}</td>
                            <td>{{ $data->hargabeli }}</td>
                            <td>{{ $data->hargajual }}</td>
                            <td>{{ $data->diskon }}</td>
                            <td>{{ $data->stok }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>
                                <button class="btn btn-warning" class="btn btn-warning" data-toggle="modal"
                                    data-target="#editPenjualanModal{{ $data->id }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('hapuspenjualan', $data->id) }}" method="POST"
                                    enctype="multipart/form-data">
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

        <!-- Modal Tambah Penjualan -->
        <div class="modal fade" id="tambahPenjualanModal" tabindex="-1" role="dialog"
            aria-labelledby="tambahPenjualanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPenjualanLabel">Tambah Penjualan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('jual') }}" method="POST" enctype="multipart/form-data" id="penjualanForm">
                            @csrf
                            <!-- Input Nama Barang -->
                            <div class="form-group">
                                <label for="namaBarang">Nama Barang:</label>
                                <input type="text" class="form-control" id="namaBarang" name="namabarang" required>
                            </div>

                            <!-- Input Merek -->
                            <div class="form-group">
                                <label for="merek">Merek:</label>
                                <input type="text" class="form-control" id="merek" name="merek" required>
                            </div>

                            <!-- Input Harga Beli -->
                            <div class="form-group">
                                <label for="hargaBeli">Harga Beli:</label>
                                <input type="number" class="form-control" id="hargaBeli" name="hargabeli" required>
                            </div>

                            <!-- Input Harga Jual -->
                            <div class="form-group">
                                <label for="hargaJual">Harga Jual:</label>
                                <input type="number" class="form-control" id="hargaJual" name="hargajual" required>
                            </div>

                            <!-- Input Tanggal -->
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>


                            <!-- Input Diskon -->
                            <div class="form-group">
                                <label for="diskon">Diskon:</label>
                                <input type="number" class="form-control" id="diskon" name="diskon" required>
                            </div>

                            <!-- Input Stok -->
                            <div class="form-group">
                                <label for="stok">Stok:</label>
                                <input type="number" class="form-control" id="stok" name="stok" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="savePenjualanBtn">Save</button>

                                </button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>

        <!-- Modal Edit Penjualan -->
        @foreach ($penjualans as $key => $data)
            <div class="modal fade" id="editPenjualanModal{{ $data->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editPenjualanLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPenjualanLabel">Edit Penjualan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('updatepenjualan', $data->id) }}" method="POST"
                                enctype="multipart/form-data" id="penjualanForm">
                                @csrf
                                @method('PUT')
                                <!-- Input Nama Barang -->
                                <div class="form-group">
                                    <label for="namaBarang">Nama Barang:</label>
                                    <input type="text" class="form-control" id="namaBarang" name="namabarang"
                                        required value="{{ $data->namabarang }}">
                                </div>

                                <!-- Input Merek -->
                                <div class="form-group">
                                    <label for="merek">Merek:</label>
                                    <input type="text" class="form-control" id="merek" name="merek" required
                                        value="{{ $data->merek }}">
                                </div>

                                <!-- Input Harga Beli -->
                                <div class="form-group">
                                    <label for="hargaBeli">Harga Beli:</label>
                                    <input type="number" class="form-control" id="hargaBeli" name="hargabeli" required
                                        value="{{ $data->hargabeli }}">
                                </div>

                                <!-- Input Harga Jual -->
                                <div class="form-group">
                                    <label for="hargaJual">Harga Jual:</label>
                                    <input type="number" class="form-control" id="hargaJual" name="hargajual" required
                                        value="{{ $data->hargajual }}">
                                </div>

                                <!-- Input Tanggal -->
                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required
                                        value="{{ $data->tanggal }}">
                                </div>


                                <!-- Input Diskon -->
                                <div class="form-group">
                                    <label for="diskon">Diskon:</label>
                                    <input type="number" class="form-control" id="diskon" name="diskon" required
                                        value="{{ $data->diskon }}">
                                </div>

                                <!-- Input Stok -->
                                <div class="form-group">
                                    <label for="stok">Stok:</label>
                                    <input type="number" class="form-control" id="stok" name="stok" required
                                        value="{{ $data->stok }}">
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
        @endforeach

    </div>
@endsection
