@extends('layout.app')
@section('title', 'Edit Kategori')
@section('content')
<div class="card">
     <div class="card-header">
          <h3 class="text-center">EDIT DATA KATEGORI</h3>
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

          <form class="form-horizontal" action="{{ route('kategori.update', $kategori->id) }}" method="POST">
               @csrf
               @method('PUT')
               @include('kategori.form', ['kategori' => $kategori])
          </form>
     </div>
</div>
@endsection
