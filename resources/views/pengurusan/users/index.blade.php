@extends('layouts.induk')

@section('page-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Senarai Users</h1>
        <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-user-plus fa-sm text-white-50"></i> Tambah User</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekod Users</h6>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>TELEFON</th>
                                <th>ALAMAT</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

