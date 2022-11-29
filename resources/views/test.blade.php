@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="display-1">Halaman Testing Bebassss</h1>
@stop

{{-- Setup data for datatables --}}
@php
    $heads = ['ID', 'Name', ['label' => 'Phone', 'width' => 40], ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

    $config = [
        'data' => [[22, 'John Bender', '+02 (123) 123456789', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>']],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
@endphp

@section('content')

    <h2>Testing Tabel.</h2>

    {{-- Minimal example / fill data using the component slot --}}

    <div class="container">
        <div class="row">

            <div class="col-sm">
                <x-adminlte-datatable id="table6" :heads="$heads" head-theme="light" theme="dark" :config="$config"
                    striped hoverable with-footer footer-theme="light" beautify>
                    @foreach ($config['data'] as $row)
                        <tr>
                            @foreach ($row as $cell)
                                <td>{!! $cell !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
            <div class="col-sm">
                <x-adminlte-datatable id="table3" :heads="$heads" :config="$config" theme="info" striped hoverable>
                    @foreach ($config['data'] as $row)
                        <tr>
                            @foreach ($row as $cell)
                                <td>{!! $cell !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" theme="warning" :config="$config"
                    striped hoverable with-buttons>
                    @foreach ($config['data'] as $row)
                        <tr>
                            @foreach ($row as $cell)
                                <td>{!! $cell !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
            <div class="col-sm">
                <x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-teal" :config="$config"
                    striped hoverable with-buttons>
                    @foreach ($config['data'] as $row)
                        <tr>
                            @foreach ($row as $cell)
                                <td>{!! $cell !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>

    </div>

    <h2>Testing Profil.</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <x-adminlte-profile-widget name="User Name" />
            </div>
            <div class="col-sm">
                <x-adminlte-profile-widget name="John Doe" desc="Administrator" theme="teal"
                    img="https://picsum.photos/id/1/100">
                    <x-adminlte-profile-col-item title="Followers" text="125" url="#" />
                    <x-adminlte-profile-col-item title="Following" text="243" url="#" />
                    <x-adminlte-profile-col-item title="Posts" text="37" url="#" />
                </x-adminlte-profile-widget>
            </div>
            <div class="col-sm">
                <x-adminlte-profile-widget name="Sarah O'Donell" desc="Commercial Manager" theme="primary"
                    img="https://picsum.photos/id/1011/100">
                    <x-adminlte-profile-col-item class="text-primary border-right" icon="fas fa-lg fa-gift" title="Sales"
                        text="25" size=6 badge="primary" />
                    <x-adminlte-profile-col-item class="text-danger" icon="fas fa-lg fa-users" title="Dependents"
                        text="10" size=6 badge="danger" />
                </x-adminlte-profile-widget>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <x-adminlte-profile-widget name="Robert Gleeis" desc="Sound Manager" theme="warning"
                    img="https://picsum.photos/id/304/100" header-class="text-left" footer-class="bg-gradient-dark">
                    <x-adminlte-profile-col-item title="I'm also" text="Artist" size=3
                        class="text-orange border-right border-warning" />
                    <x-adminlte-profile-col-item title="Loves" text="Music" size=6
                        class="text-orange border-right border-warning" />
                    <x-adminlte-profile-col-item title="Like to" text="Travel" size=3 class="text-orange" />
                </x-adminlte-profile-widget>
            </div>
            <div class="col-sm">
                <x-adminlte-profile-widget name="Alice Viorich" desc="Community Manager" theme="purple"
                    img="https://picsum.photos/id/454/100" footer-class="bg-gradient-pink">
                    <x-adminlte-profile-col-item icon="fab fa-2x fa-instagram" text="Instagram" badge="purple" size=4 />
                    <x-adminlte-profile-col-item icon="fab fa-2x fa-facebook" text="Facebook" badge="purple" size=4 />
                    <x-adminlte-profile-col-item icon="fab fa-2x fa-twitter" text="Twitter" badge="purple" size=4 />
                </x-adminlte-profile-widget>
            </div>
            <div class="col-sm">
                <x-adminlte-profile-widget class="elevation-4" name="Willian Dubling" desc="Web Developer"
                    img="https://picsum.photos/id/177/100" cover="https://picsum.photos/id/541/550/200"
                    header-class="text-white text-right" footer-class='bg-gradient-dark'>
                    <x-adminlte-profile-row-item title="4+ years of experience with"
                        class="text-center border-bottom border-secondary" />
                    <x-adminlte-profile-col-item title="Javascript" icon="fab fa-2x fa-js text-orange" size=3 />
                    <x-adminlte-profile-col-item title="PHP" icon="fab fa-2x fa-php text-orange" size=3 />
                    <x-adminlte-profile-col-item title="HTML5" icon="fab fa-2x fa-html5 text-orange" size=3 />
                    <x-adminlte-profile-col-item title="CSS3" icon="fab fa-2x fa-css3 text-orange" size=3 />
                    <x-adminlte-profile-col-item title="Angular" icon="fab fa-2x fa-angular text-orange" size=4 />
                    <x-adminlte-profile-col-item title="Bootstrap" icon="fab fa-2x fa-bootstrap text-orange" size=4 />
                    <x-adminlte-profile-col-item title="Laravel" icon="fab fa-2x fa-laravel text-orange" size=4 />
                </x-adminlte-profile-widget>
            </div>
        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
