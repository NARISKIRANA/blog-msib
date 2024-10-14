@extends('layout.app')
@section('title', 'Detail Kategori')
@section('content')
<div class="card">
     <div class="card-header">
          <h3 class="text-center">DETAIL DATA KATEGORI</h3>
     </div>

     <div class="card-body">
          <div class="table-responsive">
               <table class="table">
                    <tr>
                         <th>Deskripsi</th>
                         <td width="2">:</td>
                         <td>{{ $kategori->deskripsi }}</td>
                    </tr>
                    <tr>
                         <th>Dibuat</th>
                         <td width="2">:</td>
                         <td>{{ $kategori->created_at }}</td>
                    </tr>
               </table>
          </div>
     </div>

     <div class="card-footer">
          <a href="/kategori" class="btn btn-danger">Kembali</a>
     </div>
</div>
@endsection