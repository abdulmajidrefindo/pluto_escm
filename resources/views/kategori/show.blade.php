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
  <div class="text-center">
    <a href="{{route('kategori.index')}}" class="btn btn-primary">Kembali</a>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        function myFunction() {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
    </script>
</div>

@stop
