@extends('layouts.main')

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

@section('container')
    <form action="{{ url("buku") }}" method="POST">
        @csrf
        <input type="text" class="form-control" placeholder="Judul Buku" aria-describedby="basic-addon1" name="Judul">
        <input type="text" class="form-control" placeholder="Author" aria-describedby="basic-addon1" name="Author">
        <input type="text" class="form-control" placeholder="Synopsis" aria-describedby="basic-addon1" name="Synopsis">
        <input type="text" class="form-control" placeholder="Penerbit" aria-describedby="basic-addon1" name="Penerbit">

        <button type="submit" class="btn btn-success">Save changes</button>
    </form>
@endsection