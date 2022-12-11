 @extends('adminlte::page')

@section('content_header')
    <h1>Rincian Pelanggan</h1>


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
                {{$pelanggan->id}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Nama Pelanggan :</td>
            <td>
                {{$pelanggan->nama_pelanggan}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Alamat Pelanggan  :</td>
            <td>
                {{$pelanggan->alamat_pelanggan}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Kontak Pelanggan  :</td>
            <td>
                {{$pelanggan->kontak_pelanggan}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Waktu dibuat    :</td>
            <td>
                {{$pelanggan->created_at}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Terakhir diubah    :</td>
            <td>
                {{$pelanggan->updated_at}}
            </td>
            <td style="width: 300px"></td>
        </tr>
    </table>
  </div>
</div>

<div>
    <h4>Daftar Produk dengan Kategori {{$pelanggan->nama_pelanggan}}</h4>
</div>

<div class="card">
    <div class="card-body">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rizki</td>
                    <td>23</td>
                    <td>Jakarta</td>
                </tr>
                <tr>
                    <td>Adi</td>
                    <td>25</td>
                    <td>Bogor</td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="text-center">
            <ul class="pagination pagination-centered">
                <li><a href="#" style="color: black; float: left; padding: 8px 16px; text-decoration: none; transition: background-color .3s; border: 1px solid #ddd; margin: 0 4px;">1</a></li>
                <li><a href="#" style="color: black; float: left; padding: 8px 16px; text-decoration: none; transition: background-color .3s; border: 1px solid #ddd; margin: 0 4px;">2</a></li>
                <li><a href="#" style="color: black; float: left; padding: 8px 16px; text-decoration: none; transition: background-color .3s; border: 1px solid #ddd; margin: 0 4px;">3</a></li>
                <li><a href="#" style="color: black; float: left; padding: 8px 16px; text-decoration: none; transition: background-color .3s; border: 1px solid #ddd; margin: 0 4px;">4</a></li>
                <li><a href="#" style="color: black; float: left; padding: 8px 16px; text-decoration: none; transition: background-color .3s; border: 1px solid #ddd; margin: 0 4px;">5</a></li>
            </ul>
            <br>
        </div>
    </div>
</div>
<!-- /.card --


<!-- /.card -->

@stop
