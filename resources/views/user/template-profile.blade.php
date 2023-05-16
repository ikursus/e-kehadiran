@extends('layouts.induk')


@section('page-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kemaskini Profil</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Approach -->
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            @method('PATCH')

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kemaskini Profile</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama">
                        @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Alamat emel">
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Katalaluan">
                        <span class="text-muted">Biarkan kosong jika tidak mahu tukar password</span>
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Pengesahan Katalaluan">
                        <span class="text-muted">Sila ulang taip password untuk pengesahan (jika membuat pertukaran)</span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="telefon" placeholder="No telefon">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="alamat" placeholder="Alamat surat menyurat"></textarea>
                    </div>

                    <input type="file" name="gambar">

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
            </div>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

