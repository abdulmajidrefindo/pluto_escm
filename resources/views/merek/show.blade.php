@extends('adminlte::page')

@section('content_header')
    <h1>Rincian Merek</h1>


@stop

@section('content')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-sm table-striped">
                <tr>
                    <td style="width: 1px"></td>
                    <td>ID :</td>
                    <td>
                        {{ $merek->id }}
                    </td>
                    <td style="width: 300px"></td>
                </tr>
                <tr>
                    <td style="width: 1px"></td>
                    <td>Nama Kategori :</td>
                    <td>
                        {{ $merek->nama_merek }}
                    </td>
                    <td style="width: 300px"></td>
                </tr>
                <tr>
                    <td style="width: 1px"></td>
                    <td>Keterangan :</td>
                    <td>
                        {{ $merek->keterangan }}
                    </td>
                    <td style="width: 300px"></td>
                </tr>
                <tr>
                    <td style="width: 1px"></td>
                    <td>Waktu dibuat :</td>
                    <td>
                        {{ $merek->created_at }}
                    </td>
                    <td style="width: 300px"></td>
                </tr>
                <tr>
                    <td style="width: 1px"></td>
                    <td>Terakhir diubah :</td>
                    <td>
                        {{ $merek->updated_at }}
                    </td>
                    <td style="width: 300px"></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('merek.index') }}" class="btn btn-primary">Kembali</a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
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
