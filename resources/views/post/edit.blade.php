@extends('layout.app')
@section('title', 'Edit POST')
@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="text-center">EDIT DATA POST</h3>
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

               <form class="form-horizontal" action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('post.form', ['post' => $post])
               </form>
          </div>
     </div>
@endsection
