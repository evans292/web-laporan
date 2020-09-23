@extends('admin.layouts.app', ['title' => 'User'])
@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
          </div>
         
            <!-- Content Row -->
           <div class="row">
            <!-- DataTales Example -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">List User Terdaftar</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Dibuat</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Dibuat</th>
                          <th>Opsi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->nama_role }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at) }}</td>
                            <td>
                            <!-- Button trigger modal -->
                            <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                                <form action="/user/{{ $user->id }}/delete" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  <form action="/user/{{ $user->id }}/edit" method="POST">
                                      @csrf
                                      @method('patch')
                                      <input type="hidden" name="report_id" value="">
                                        <div class="form-group">
                                         <label for="role">Ubah Role Untuk User {{ $user->name }}</label>
                                        <select class="form-control" id="role" name="role">
                                          @foreach ($roles as $role)
                                              <option value="{{ $role->id }}">{{ $role->name }}</option>
                                          @endforeach
                                        </select>
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