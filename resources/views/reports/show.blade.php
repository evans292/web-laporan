@extends('layouts.app', ['title' => $report->judul])

@section('content')
    <div class="container">
        @include('alert')
        <div class="row mb-3">
            <div class="col-md-12">
                <div>
                    <h1 class="d-inline">{{ $report->judul }}</h1>
                    <p class="my-2">{{  $report->pelapor->name  }} &middot; {{ $report->tgl_kejadian->format('d F Y') }} ({{ $report->lokasi_kejadian }}) - {!! $report->status !!}</p>
                </div>
                <hr>
                
                <div class="card">
                    <div class="card-body">
                        @if ($report->foto)
                        <img style="height: 450px; object-fit: cover; object-position: center;" class="rounded w-100 mb-3" src="{{asset("storage/" . $report->foto)  }}" alt="">
                        @endif
                        <p>{{ $report->isi }}</p>
                    </div>
                  </div>
            </div>
        </div>
        <hr>
         <div class="row">
            <div class="col-md-6">
             <h4>Komentar</h4>
             @foreach ($comments as $comment)
             @if ($comment->report_id == $report->id)
            <div class="card mb-2">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">{{ $comment->user->name }} &middot; </span> <small>{{ $comment->created_at->diffForHumans() }}</small> </h6>
                  @can('update', $comment)
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="/comments/{{ $comment->id }}/edit">Edit</a>
                      <form action="/comments/{{ $comment->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="dropdown-item">Hapus</button>
                      </form>
                    </div>
                  </div>
                  @endcan
                </div>
              <div class="card-body">
                {{ $comment->komentar }}
              </div>
            </div>
             @endif
             @endforeach

            {{ $comments->links() }}
            </div>

            <div class="col-md-6">
             <h4>Buat komentar</h4>
                <form action="/comments" method="POST">
                    @csrf
                    <input type="hidden" name="report_id" value="{{ $report->id }}">
                      <div class="form-group">
                      <textarea name="komentar" class="form-control" style="resize: none;" id="komentar" rows="8"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
          </div>

    </div>

   
@endsection

