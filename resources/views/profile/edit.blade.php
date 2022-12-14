@extends('adminlte::page')

@section('title')
<title>Edit Profile {{ $user->name }}</title>
@endsection

@section('content-title')
<h1>Edit Profile {{ $user->name }}</h1>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Edit Profile {{ $user->name }}</h4>
            </div>

            <div class="card-body">
                <div class="card">
                    <form action="{{ route('user.profile.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label for="name">Name</label>

                            <input value="{{ $user->name }}" name="name" id="name" type="text" class="form-control"
                                placeholder="Masukkan nama">

                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>

                            <select name="gender" class="form-control" id="gender">
                                <option value="0" {{ $user->gender == 0 ? "selected" : "" }}>Laki-Laki</option>
                                <option value="1" {{ $user->gender == 1 ? "selected" : "" }}>Perempuan</option>
                            </select>

                            <p class="text-danger">{{ $errors->first("gender") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>

                            <input value="{{ $user->email }}" name="email" id="email" type="email" class="form-control"
                                placeholder="Masukkan email">

                            <p class="text-danger">{{ $errors->first("email") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>

                            <input value="{{ $user->password }}" name="password" id="password" type="password"
                                class="form-control" placeholder="Masukkan password">

                            <p class="text-danger">{{ $errors->first("password") }}</p>

                        </div>

                        <div class="form-group">
                            <label for="phone_number">No Telepon</label>

                            <input value="{{ $user->phone_number }}" name="phone_number" id="phone_number" type="number"
                                class="form-control" placeholder="Masukkan nomor telepon">

                            <p class="text-danger">{{ $errors->first("phone_number") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="job_id">Pilih Pekerjaan</label>

                            <select name="job_id" class="form-control" id="job_id">
                                @foreach ($jobs as $job)
                                <option value="{{ $job->id }}" {{ $user->job->id == $job->id ? "selected" : "" }}>
                                    {{ $job->name }}</option>
                                @endforeach
                            </select>

                            <p class="text-danger">{{ $errors->first("job_id") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="image">Masukkan Foto KTP</label>
                            <input name="image" type="file" class="form-control-file" id="image">

                            <img alt="image" src="{{ asset('assets/images/' . $user->image) }}" class="img-fluid"
                                style="width: 200px; margin-top: 1rem;">

                            <p class="text-danger">{{ $errors->first("image") }}</p>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
