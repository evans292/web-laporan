@extends('layouts.app', ['title' => 'Laporan'])

@section('content')
    <div class="container">
        @include('alert')
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h1 class="d-inline">{{ $title ?? 'Semua Laporan' }}</h1>
                    @auth
                    <a href="/reports/create" class="mt-2 btn btn-primary float-right">Buat Laporan</a> 
                    @endauth
                </div>
                <hr>
                @foreach ($reports as $report)
                <div class="card mb-2" >
                    <div class="card-body">
                      <h5 class="card-title">{{ $report->judul }}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{  $report->pelapor->name  }} &middot;  {{ $report->tgl_kejadian->format('d F Y') }} - {!! $report->status !!}</h6>
                      <p class="card-text">{{ Str::limit($report->isi, 80, '.')}} <a href="/reports/{{$report->slug}}">read more</a></p>
                    </div>
                  </div>
                @endforeach   
            </div>
        </div>

        {{ $reports->links() }}
    </div>
@endsection

