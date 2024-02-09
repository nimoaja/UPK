@extends('master')

@section('content')
    <div class="container-fluid">
        <main>
            <h1>Kategori</h1>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkategoriModal">
                Tambah kategori
            </button>
            @include('kategori.modalAddKategori')
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
                            <td>{{ $data->nama_kategori }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modaleditkategori{{ $data->id_kategori }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <a href="{{route('hapuskategori', ['id' => $data->id_kategori ])}}" type="button" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                                {{-- <form action="{{ route('hapuskategori', $data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah yakin hapus?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                        @include('kategori.modalEditKategori')
                    @endforeach
                </tbody>
            </table>
        </main>

        <!-- Modal Tambah kategori -->


        <!-- Modal Edit kategori -->
        @foreach ($kategori as $data)
            <div class="modal fade" id="modaleditkategori{{ $data->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modaleditkategori{{ $data->id }}Label" aria-hidden="true">
                <!-- Isi modal edit kategori disini -->
            </div>
        @endforeach
    </div>
@endsection
