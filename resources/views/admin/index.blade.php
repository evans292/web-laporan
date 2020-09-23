@extends('admin.layouts.app', ['title' => 'Daftar Laporan'])

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Laporan</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
          </div>
          
           <!-- Content Row -->
           <div class="row">
            <!-- DataTales Example -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Semua Laporan</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Judul</th>
                          <th>Lokasi Kejadian</th>
                          <th>Tanggal Laporan</th>
                          <th>Status</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Judul</th>
                          <th>Lokasi Kejadian</th>
                          <th>Tanggal Laporan</th>
                          <th>Status</th>
                          <th>Opsi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($reports as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="/admin-page/{{ $report->slug }}">{{ $report->judul }}</a></td>
                            <td>{{ $report->lokasi_kejadian }}</td>
                            <td>{{ $report->created_at->format(' d F Y') }}</td>
                            <td>{!! $report->status !!}</td>
                            <td>
                                @if ($report->status == '<span class="text-warning">Menunggu</span>')
                                    <form action="/admin-page/update" method="POST">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="id" value="{{ $report->id }}">
                                        <input type="hidden" name="status" value='<span class="text-info">Diproses</span>''>
                                        <button type="submit" class="badge badge-info">Proses</button> 
                                    </form>
                                @elseif ($report->status == '<span class="text-info">Diproses</span>')
                                    <form action="/admin-page/update" method="POST">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="id" value="{{ $report->id }}">
                                        <input type="hidden" name="status" value='<span class="text-success">Selesai</span>''>
                                        <button type="submit" class="badge badge-success">Selesai</button> 
                                    </form>
                                @else
                                    -
                                @endif
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

      </div>
@endsection