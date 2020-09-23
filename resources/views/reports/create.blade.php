@extends('layouts.app', ['title' => 'Buat Laporan'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h1 class="d-inline">Buat Laporan</h1>
                </div>
                <hr>
                
                <div class="card">
                    <div class="card-body">
                        <form action="/reports" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Ketik Judul Laporan Anda*">
                            </div>
                            <div class="form-group">
                                <textarea style="resize: none;" name="isi" class="form-control @error('isi') is-invalid @enderror" id="isi"  placeholder="Ketik Isi Laporan Anda*" rows="5"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="tgl_kejadian">Tanggal Kejadian</label>
                                <input id="tgl_kejadian" class="form-control" type="date" name="tgl_kejadian" value="{{ date("Y-m-d") }}">
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control  @error('lokasi_kejadian') is-invalid @enderror" id="lokasi_kejadian" name="lokasi_kejadian" placeholder="Ketik Lokasi Kejadian*">
                              </div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto" name="foto">Choose file</label>
                              </div>

                              <button type="submit" class="btn btn-primary mt-3 float-right">Lapor</button>
                            </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection

