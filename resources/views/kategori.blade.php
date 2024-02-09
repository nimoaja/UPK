@extends('master')

@section('content')
    <div class="container-fluid">
        <main>
            <h1>Kategori</h1>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkategoriModal">
                Tambah kategori
            </button>


            <table class="table table-bordered text-center" id="kategori-list">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modaleditkategori{{ $data->id }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('hapuskategori', $data->id) }}" method="POST"
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

        <!-- Modal Tambah kategori -->
        <div class="modal fade" id="tambahkategoriModal" tabindex="-1" role="dialog" aria-labelledby="tambahkategoriLabel"
            aria-hidden="true">
            <!-- Isi modal tambah kategori disini -->
        </div>

        <!-- Modal Edit kategori -->
        @foreach ($kategori as $data)
            <div class="modal fade" id="modaleditkategori{{ $data->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modaleditkategori{{ $data->id }}Label" aria-hidden="true">
                <!-- Isi modal edit kategori disini -->
            </div>
        @endforeach
    </div>
@endsection
