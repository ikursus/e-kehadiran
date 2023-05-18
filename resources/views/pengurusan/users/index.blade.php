@extends('layouts.induk')

@section('page-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Senarai Users</h1>
        <a href="{{ route('pengurusan.users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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

                    @include('layouts.alerts')

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

                            @foreach ($senaraiUsers as $user)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telefon }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td>

                                    <a href="{{ route('pengurusan.users.show', $user->id) }}" class="btn btn-primary btn-sm">
                                        Semak Kehadiran
                                    </a>

                                    <a href="{{ route('pengurusan.users.edit', $user->id) }}" class="btn btn-info btn-sm">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('pengurusan.users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

