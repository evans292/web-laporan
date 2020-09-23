@extends('admin.layouts.app', ['title' => $report->judul])

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><a href="javascript:history.back()">&larr;</a> Laporan ke {{ $report->id }}</h1>
            	<form action="/eksport/cetak_pdf_show" method="POST">
                @csrf
                <input type="hidden" name="id_laporan" value="{{ $report->id }}">
                   <button type="submit" class="btn btn-danger my-3"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
                </form>
          </div>
          
          <div class="row mb-3">
            <div class="col-lg-12">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Judul : <span class="font-weight-bold">{{ $report->judul }}</span></li>
                <li class="list-group-item">Tanggal Laporan :  <span class="font-weight-bold">{{  date("d F Y - g:i a", strtotime($report->created_at)) }}</span></li>
                <li class="list-group-item">Tanggal Kejadian :  <span class="font-weight-bold">{{  date("d F Y - g:i a", strtotime($report->tgl_kejadian)) }}</span></li>
                <li class="list-group-item">Lokasi Kejadian :  <span class="font-weight-bold">{{ $report->lokasi_kejadian }}</span></li>
                <li class="list-group-item">Pelapor : <span class="font-weight-bold">{{ $report->pelapor->name }}</span></li>
                <li class="list-group-item">Status : <span class="font-weight-bold">{!! $report->status !!}</span></li>
              </ul>  
            </div>

          </div>

          <div class="row">
            <div class="col-lg-12">
                  <!-- Illustrations -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                      <h6 class="mt-3 font-weight-bold text-primary">{{ $report->judul }}</h6>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Komentar
                      </button>
                    </div>
                    <div class="card-body">
                      @if ($report->foto)
                      <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4 rounded w-100" style="height: 450px; object-fit: cover; object-position: center;" src="{{ asset('storage/' . $report->foto) }}" alt="">
                      </div>
                      @endif
                      <p>{{ $report->isi }}</p>
                    </div>
                  </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
             <h4>Komentar</h4>
             @foreach ($comments as $comment)
             @if ($comment->report_id == $report->id)
            <div class="card mb-2">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">{{ $comment->user->name }} &middot; </span> <small>{{ $comment->created_at->diffForHumans() }}</small> </h6>
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
                </div>
              <div class="card-body">
                {{ $comment->komentar }}
              </div>
            </div>
             @endif
             @endforeach

            {{ $comments->links() }}
            </div>
          </div>


      </div>


       <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/comments" method="POST">
                  @csrf
                  <input type="hidden" name="report_id" value="{{ $report->id }}">
                <div class="form-group">
                  <label for="komentar">Tambahkan komentar anda untuk laporan berjudul {{ $report->judul }}</label>
                  <textarea name="komentar" class="form-control" style="resize: none;" id="komentar" rows="10"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
              </form> 
            </div>
          </div>
        </div>
@endsection