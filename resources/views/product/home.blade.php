@extends('layout.app')
@section('title') Halaman Utama | Kurikulum@endsection
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-2">
    <ul class="list-group">
        <li class="list-group-item"><a href="/category" >Category</a></li>
        <li class="list-group-item active"><a href="/product" style="color:white;">Product</a></li>
        <li class="list-group-item"><a href="/package" >Package</a></li>
    </ul>
  </div>
  <div class="col-lg-10">
    <a href="/product/create" class="btn btn-primary mt-1 mb-1">Tambah Data</a>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Product</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->categories->name }}</td>
                    <td>
                        <a href="{{ url('product/edit', $product->id) }}"
                            class="btn btn-primary btn-sm"><i class="mdi mdi-tooltip-edit"></i>Edit</a>
                        <a onclick="return confirm('Apakah anda yakin untuk menghapus data product?')"
                            href="{{ url('product/' . $product->id . '/delete') }}"
                            class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i>Delete</a>
                    </td>
                </tr>
                @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@stop