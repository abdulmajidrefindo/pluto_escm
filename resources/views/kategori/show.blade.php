@extends('adminlte::page')

@section('content_header')
    <h1>Rincian Kategori</h1>


@stop

@section('content')
<div class="card">
  <!-- /.card-header -->
  <div class="card-body" >
    <table class="table table-sm table-striped">
        <tr>
            <td style="width: 1px"></td>
            <td>ID  :</td>
            <td>
                {{$kategori->id}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Nama Kategori  :</td>
            <td>
                {{$kategori->nama_kategori}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Keterangan  :</td>
            <td>
                {{$kategori->keterangan}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Waktu dibuat    :</td>
            <td>
                {{$kategori->created_at}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Terakhir diubah    :</td>
            <td>
                {{$kategori->updated_at}}
            </td>
            <td style="width: 300px"></td>
        </tr>
    </table>
  </div>
</div>

<div>
    <h4>Daftar Produk dengan Kategori {{$kategori->nama_kategori}}</h4>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Daftar Produk</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered">
      <thead>                  
        <tr>
          <th style="width: 10px">ID</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Dibuat</th>
          <th>Terakhir Diubah</th>
        </tr>
      </thead>
      <tbody>
        @foreach($kategori->produk as $produk)
        <tr>
          <td>{{$produk->id}}</td>
          <td>{{$produk->nama_produk}}</td>
          <td>{{$produk->harga}}</td>
          <td>{{$produk->stok}}</td>
          <td>{{$produk->created_at}}</td>
          <td>{{$produk->updated_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <ul class="pagination


<!-- /.card --


<!-- /.card -->

@stop
