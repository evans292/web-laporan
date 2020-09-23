@extends('admin.layouts.app-pdf', ['title' => 'laporan - ' . $data->pelapor->name . " " . $data->created_at])
@section('content')
	<div class="container">
		<div class="text-center my-3">
            <h5 class="text-info"> {{ config('app.name', 'Laravel') }}</h5>
		</div>

        <div class="row mb-3">
            <div class="col-lg-12">
                <p>Judul : <span class="font-weight-bold">{{ $data->judul }}</span></p>
                <p>Tanggal Laporan :  <span class="font-weight-bold">{{  date("d F Y - g:i a", strtotime($data->created_at)) }}</span></p>
                <p>Tanggal Kejadian :  <span class="font-weight-bold">{{  date("d F Y - g:i a", strtotime($data->tgl_kejadian)) }}</span></p>
                <p>Lokasi Kejadian :  <span class="font-weight-bold">{{ $data->lokasi_kejadian }}</span></p>
                <p>Pelapor : <span class="font-weight-bold">{{ $data->pelapor->name }}</span></p>
                <p>Status : <span class="font-weight-bold">{!! $data->status !!}</span></p>
            </div>

		  </div>
		  
		    <div class="row">
            <div class="col-lg-12">
           <h6 class="m-0 font-weight-bold text-primary">{{ $data->judul }}</h6>
           <p class="text-justify">{{ $data->isi }}</p>
        </div>
      </div>

 
	</div>
@endsection 
	