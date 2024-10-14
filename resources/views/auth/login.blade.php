@extends('layout.app') {{-- Pastikan layout yang digunakan benar --}}
@section('title', 'Login')

@section('content')
<div class="card">
     <div class="card-header">
          <h3 class="text-center">LOGIN</h3>
     </div>

     <div class="card-body">
          <form action="{{ route('login') }}" method="POST">
               @csrf

               <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                         <small class="text-danger">{{ $message }}</small>
                    @enderror
               </div>

               <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                         <small class="text-danger">{{ $message }}</small>
                    @enderror
               </div>

               <button type="submit" class="btn btn-primary">Login</button>
          </form>
     </div>

     <div class="card-footer"></div>
</div>
@endsection
