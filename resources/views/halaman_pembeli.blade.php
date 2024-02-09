@extends('master')

@section('content')
    <div class="container-fluid">

        <main>
            <h2 class="text-center">Daftar Pembeli</h2>
            <h1 class="text-center">Selamat datang di Halaman Pembeli</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPembeliModal">
                Tambah Pembeli
            </button>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="pembeli-list">
                    @foreach ($pembeli as $key => $data)
                        <!-- Add more buyers as needed -->
                        <tr>
                            <td>{{ $data->namapembeli }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->nomortelepon }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <button class="btn btn-warning" class="btn btn-warning" data-toggle="modal"
                                    data-target="#editPembeliModal{{ $data->id }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('hapuspembeli', $data->id) }}" method="POST"
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
                    <!-- ... (repeat for other buyers) ... -->
                </tbody>
            </table>
        </main>
        <!-- Modal Tambah Pembeli -->

        <div class="modal fade" id="tambahPembeliModal" tabindex="-1" role="dialog" aria-labelledby="tambahPembeliLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPembeliLabel">Tambah Pembeli</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pembeli') }}" method="POST" enctype="multipart/form-data" id="pembeliForm">
                            @csrf
                            <!-- Input Nama Pembeli -->
                            <div class="form-group">
                                <label for="namaPembeli">Nama Pembeli:</label>
                                <input type="text" class="form-control" id="namaPembeli" name="namapembeli" required>
                            </div>

                            <!-- Input Alamat -->
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>

                            <!-- Input Nomor Telepon -->
                            <div class="form-group">
                                <label for="nomorTelepon">Nomor Telepon:</label>
                                <input type="tel" class="form-control" id="nomorTelepon" name="nomortelepon" required>
                            </div>

                            <!-- Input Email -->
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>

        <!--Edit pembeli -->
        @foreach ($pembeli as $key => $data)
            <div class="modal fade" id="editPembeliModal{{ $data->id }}" role="dialog"
                aria-labelledby="editPembeliLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPembeliLabel">Edit Pembeli</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('updatepembeli', $data->id) }}" method="POST"
                                enctype="multipart/form-data" id="pembeliForm">
                                @csrf
                                @method('PUT')
                                <!-- Input Nama Pembeli -->
                                <div class="form-group">
                                    <label for="namaPembeli">Nama Pembeli:</label>
                                    <input type="text" class="form-control" id="namaPembeli" name="namapembeli" required
                                        value="{{ $data->namapembeli }}">
                                </div>

                                <!-- Input Alamat -->
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required
                                        value="{{ $data->alamat }}">
                                </div>

                                <!-- Input Nomor Telepon -->
                                <div class="form-group">
                                    <label for="nomorTelepon">Nomor Telepon:</label>
                                    <input type="tel" class="form-control" id="nomorTelepon" name="nomortelepon"
                                        required value="{{ $data->nomortelepon }}">
                                </div>

                                <!-- Input Email -->
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        value="{{ $data->email }}">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id=savePembeli>Save</button>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
