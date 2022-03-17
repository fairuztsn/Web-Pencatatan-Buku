@if (session('success'))
    <div class="alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
@if ($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>${{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@extends('layouts.main')

@section('container')
    {{-- <form action="{{ url("buku") }}" method="POST" class="search">
        {{csrf_field()}}
        <input type="text" name="search" id="" class="form-control">
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </form> --}}

    <a href="buku/create" class="btn btn-outline-secondary">Tambah Buku</a>

    <div class="list-buku">
        <table>
            <tr>
                <th>Judul</th>
                <th>Author</th>
                <th>Synopsis</th>
                <th>Penerbit</th>
                <th>Aksi</th>
            </tr>
            @foreach($bukus as $buku)
            <tr>
                    <td>{{ $buku->Judul    }}</td>
                    <td>{{ $buku->Author   }}</td>
                    <td>{{ $buku->Synopsis }}</td>
                    <td>{{ $buku->Penerbit }}</td>
                    
                    <td class="action">
                        <a href="buku/{{$buku->id}}/edit" class="btn btn-success">Edit</a>
                        <form action="{{ url("buku", $buku->id) }}" method="POST">
                            @csrf
                            @method("Delete")
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection