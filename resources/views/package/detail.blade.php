@extends('layout.app')
@section('title') Halaman Utama | Kurikulum@endsectio
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
      <a type="submit" class="btn btn-primary">Back</a>
      <div class="col-lg-10">
        <h2>Detail of Packages</h2>
        <form action="{{ url('/package/detail', $packages->id) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Package</label>
                <input type="text" class="form-control" placeholder="Nama Package" name="name" value="{{ $package->name }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Normal Price</label>
                <input type="text" class="form-control" placeholder="Normal Price" name="normal_price" value="{{ $package->normal_price }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">End Price</label>
                <input type="text" class="form-control" placeholder="End Price" name="end_price" value="{{ $package->end_price }}" readonly>
            </div>
        </form>
      </div>
    </div>
    </div>
    @stop