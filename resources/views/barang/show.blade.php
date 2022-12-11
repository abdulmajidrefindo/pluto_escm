 @extends('adminlte::page')

@section('content_header')
    <h1>Rincian Barang</h1>


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
                {{$barang->id}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>SKU Barang  :</td>
            <td>
                {{$barang->sku}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Harga Barang  :</td>
            <td>
                {{$barang->harga}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Total Barang Terjual  :</td>
            <td>
                {{$barang->total_terjual}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Total Barang Masuk  :</td>
            <td>
                {{$barang->total_masuk}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Total Stok Barang  :</td>
            <td>
                {{$barang->total_stok}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Waktu dibuat    :</td>
            <td>
                {{$barang->created_at}}
            </td>
            <td style="width: 300px"></td>
        </tr>
        <tr>
            <td style="width: 1px"></td>
            <td>Terakhir diubah    :</td>
            <td>
                {{$barang->updated_at}}
            </td>
            <td style="width: 300px"></td>
        </tr>
    </table>
  </div>
</div>

<div>
    <h4>Daftar Produk dengan Kategori {{$barang->nama_barang}}</h4>
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