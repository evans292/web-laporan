@extends('admin.layouts.app', ['title' => 'Ekspor Laporan'])

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ekspor Laporan</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
          </div>
         
          <div class="row">
      <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <form method="get" action="/eksport/preview" target="_blank">
            <div class="form-group">
              <label for="tgl1">Mulai Tanggal</label>
              <input id="tgl1" class="form-control" type="date" name="tgl1" value="<?= date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
              <label for="tgl2">Sampai Tanggal</label>
              <input id="tgl2" class="form-control" type="date" name="tgl2" value="<?= date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success" style="float: right;">Buat Laporan</button>
            </div>
          </form>
        </div>
      </div>
          
        </div>
      </div>
      </div>
@endsection