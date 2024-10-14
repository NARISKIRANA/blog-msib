@extends('layout.app')
@section('title', 'Detail POST')
@section('content')
<div class="card">
     <div class="card-header text-center">
          <h3>DETAIL POST</h3>
     </div>

     <div class="card-body">
          <div class="d-flex justify-content-center">
               <div class="title text-center">
                    <img src="{{ asset('storage/'.$post->img) }}" alt="Image post" width="80" height="80" class="mb-2">
                    <h3>{{ $post->title }}</h3>
                    <p>Author : {{ $post->user->name }}</p>
               </div>
          </div>
          <hr>
          <div class="content">
               <p>{{ $post->content }}</p>
          </div>
     </div>

     <div class="card-footer">
          <a href="/home" class="btn btn-danger">Kembali</a>
     </div>
</div>
@endsection