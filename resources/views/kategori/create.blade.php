@extends('layout.app')
@section('title', 'Create Kategori')
@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="text-center">TAMBAH DATA KATEGORI</h3>
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

               <form class="form-horizontal" action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    @include('kategori.form')
               </form>
          </div>
     </div>
@endsection