@extends('layout.app')
@section('title') Halaman Utama @stop
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-2">
    <ul class="list-group">
        <li class="list-group-item active"><a href="/category" style="color:white;">Category</a></li>
        <li class="list-group-item"><a href="/product" >Product</a></li>
        <li class="list-group-item"><a href="/package" >Package</a></li>
    </ul>
  </div>
  <div class="col-lg-10">
    <h2>Edit Data Kategori</h2>
    <form action="{{ url('category/update', $category->id) }}" method="post">
        @csrf
       <input name="_method" type="hidden" >
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" placeholder="Nama Kategori" name="id_category" value="{{ $category->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
</div>
@stop