@extends('layout.app')
@section('title') Halaman Utama @stop
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-2">
    <ul class="list-group">
        <li class="list-group-item"><a href="/category">Category</a></li>
        <li class="list-group-item active"><a href="/product" style="color:white" >Product</a></li>
        <li class="list-group-item"><a href="/package" >Package</a></li>
    </ul>
  </div>
  <div class="col-lg-10">
    <h2>Tambah Data Product</h2>
    <form action="{{ route('proses-create-product') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Product</label>
            <input type="text" class="form-control" placeholder="Nama Product" name="name">
        </div>
        <div class="form-group">
            <label>Nama Kategori</label>
            <select class="form-control" name="id_category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
</div>
@stop