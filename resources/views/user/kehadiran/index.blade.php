@extends('layouts.induk')


@section('page-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Senarai Kehadiran</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekod Kehadiran</h6>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>BIL</th>
                                <th>PENGGUNA</th>
                                <th>TARIKH</th>
                                <th>MASA MASUK</th>
                                <th>MASA KELUAR</th>
                                <th>JUMLAH BEKERJA (MINIT)</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($senaraiKehadiran as $kehadiran)
                            <tr>
                                {{-- ini komen --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kehadiran->user_id }}</td>
                                <td>{{ $kehadiran->tarikh_kehadiran }}</td>
                                <td>{{ $kehadiran->masa_masuk }}</td>
                                <td>{{ $kehadiran->masa_keluar }}</td>
                                <td>{{ $kehadiran->jumlah_bekerja }}</td>
                                <td>
                                    <form method="POST" action="{{ route('kehadiran.punchout') }}">

                                        @csrf

                                        <button type="submit" class="btn btn-warning sm" {{ !is_null($kehadiran->masa_keluar) ? 'disabled' : NULL }}>
                                            Punch Out
                                        </button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $senaraiKehadiran->links() }}

                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

