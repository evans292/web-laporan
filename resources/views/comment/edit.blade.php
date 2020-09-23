@extends('layouts.app', ['title' => 'Edit komentar'])

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="/comments/{{ $comment->id }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                    <textarea name="komentar" class="form-control" style="resize: none;" id="komentar" rows="8">{{ $comment->komentar }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
@endsection

