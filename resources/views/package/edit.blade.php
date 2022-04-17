@extends('layout.app')
@section('title') Halaman Utama @stop
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-2">
    <ul class="list-group">
        <li class="list-group-item"><a href="/category">Category</a></li>
        <li class="list-group-item"><a href="/product" >Product</a></li>
        <li class="list-group-item active"><a href="/package" style="color:white" >Package</a></li>
    </ul>
  </div>
  <div class="col-lg-10">
    <h2>Edit Data Package</h2>
    <form action="{{ url('package/update', $package->id) }}" method="post">
        @csrf
       <input name="_method" type="hidden">
        <div class="form-group">
            <label>Nama Package</label>
            <input type="text" class="form-control" placeholder="Nama Package" name="name" value="{{ $package->name }}">
        </div>
        <div class="form-group">
            <label>Normal Price</label>
            <input type="number" class="form-control" placeholder="Normal Price" name="normal_price">
        </div>
        <div class="form-group">
            <label>End Price</label>
            <input type="number" class="form-control" placeholder="End Price" name="end_price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
</div>
@stop