@extends('layouts.induk')

@section('page-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    @include('layouts.alerts')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4 class="m-0 font-weight-bold text-primary">TEMPOH BEKERJA</h4>
                </div>
                <div class="card-body text-center">

                    @if (!is_null($currentKehadiran))
                    <div id="timer"></div>
                    @else
                    Sila Punch In
                    @endif

                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow">
                <div class="card-body">

                    <form method="POST" action="{{ route('kehadiran.punchin') }}">

                        @csrf

                        <button type="submit" class="btn btn-primary btn-block" {{ !is_null($currentKehadiran) ? 'disabled' : NULL }}>
                            Punch In
                        </button>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow">
                <div class="card-body">

                    <form method="POST" action="{{ route('kehadiran.punchout') }}">

                        @csrf

                        <button type="submit" class="btn btn-warning btn-block" {{ is_null($currentKehadiran) ? 'disabled' : NULL }}>
                            Punch Out
                        </button>

                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->
@endsection

@push('script')

@if (!is_null($currentKehadiran))
<script>
    // Set the target date and time
    var targetDateTime = new Date("{{ $currentKehadiran->masa_masuk }}");

    // Function to update the timer
    function updateTimer() {
      var currentTime = new Date();
      var timeDiff = currentTime.getTime() - targetDateTime.getTime();

      // Calculate the hours, minutes, and seconds
      var seconds = Math.floor(timeDiff / 1000) % 60;
      var minutes = Math.floor(timeDiff / (1000 * 60)) % 60;
      var hours = Math.floor(timeDiff / (1000 * 60 * 60));

      // Display the timer in the "timer" div
      var timerDiv = document.getElementById("timer");
      timerDiv.innerHTML =
        "Timer: " +
        hours.toString().padStart(2, "0") +
        ":" +
        minutes.toString().padStart(2, "0") +
        ":" +
        seconds.toString().padStart(2, "0");
    }

    // Update the timer every second
    setInterval(updateTimer, 1000);
</script>

@endif

@endpush

