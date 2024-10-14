@extends('layout.app')
@section('title', 'Create Post')
@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="text-center">TAMBAH DATA POST</h3>
          </div>

          <div class="card-body">
               @if ($errors->any())
               <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                         @endforeach
                    </ul>
               </div>
               @endif

               <form class="form-horizontal" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('post.form')
               </form>
          </div>
     </div>
@endsection