@extends('layouts.induk')

@section('page-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah User Baru</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Maklumat User Baru</h6>
                </div>
                <div class="card-body">

                    @include('pengurusan.users.form')

                </div>
                <div class="card-footer">
                    <a href="{{ route('users.index') }}" class="btn btn-light mr-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

