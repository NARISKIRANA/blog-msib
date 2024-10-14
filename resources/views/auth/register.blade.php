@extends('layout.app') {{-- Pastikan layout yang digunakan benar --}}
@section('title', 'Register')

@section('content')
<div class="card">
     <div class="card-header">
          <h3 class="text-center">REGISTER</h3>
     </div>

     <div class="card-body">
          <form action="{{ route('register') }}" method="POST">
               @csrf
               
               <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                         <small class="text-danger">{{ $message }}</small>
                    @enderror
               </div>

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

               <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
               </div>

               <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">Agree to terms and conditions</label>
               </div>

               <button type="submit" class="btn btn-primary">Submit</button>
          </form>
     </div>

     <div class="card-footer"></div>
</div>
@endsection
