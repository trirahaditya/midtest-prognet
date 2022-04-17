@extends('layout.app')
@section('title') Halaman Utama | Kurikulum@endsection
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
    <a href="/package/create" class="btn btn-primary mt-1 mb-1">Tambah Data</a>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Package</th>
          <th scope="col">Normal Price</th>
          <th scope="col">End Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($packages as $package)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $package->name }}</td>
                <input type="hidden" id="normal_price" name="normal_price" value="{{$package->normal_price}}">
                <input type="hidden" id="end_price" name="end_price" value="{{$package->end_price}}">
                <td id="normal_price_preview"><del>{{ $package->normal_price }}</del></td>
                <td id="end_price_preview">{{ $package->end_price }}</td>
                <td>
                    <a href="{{ url('package/detail' . $package->id) }}"
                      class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i>Details</a>
                    <a href="{{ url('package/edit', $package->id) }}"
                        class="btn btn-primary btn-sm"><i class="mdi mdi-tooltip-edit"></i>Edit</a>
                    <a onclick="return confirm('Apakah anda yakin untuk menghapus data package?')"
                        href="{{ url('package/' . $package->id . '/delete') }}"
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