@extends('admin.layouts.app-pdf')
@section('content')
	<div class="container">
		<div class="text-center my-3">
			<h4>Laporan Tanggal {{ $from }} - {{ $to }}</h4>
			<h5 class="text-info"> {{ config('app.name', 'Laravel') }}</h5>
		</div>
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Judul</th>
					<th>Lokasi Kejadian</th>
					<th>Tanggal Laporan</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($datas as $data)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$data->judul}}</td>
					<td>{{$data->lokasi_kejadian}}</td>
					<td>{{ $data->created_at->format(' d F Y') }}</td>
					<td>{!!$data->status!!}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
 
	</div>

@endsection
	