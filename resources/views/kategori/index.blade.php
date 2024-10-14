@extends('layout.app')
@section('title', 'Kategori')
@section('content')
<div class="card">
     <div class="card-header m-0">
          <h3 class="text-center">DATA KATEGORI</h3>
     </div>

     <div class="card-body">
          <a href="/kategori/create" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</a>
          <hr>
          <div class="table-responsive">
               <table class="table table-bordered table-striped" id="kategori-table">
                    <thead>
                         <tr>
                              <th width="10">No</th>
                              <th>Deskripsi</th>
                              <th width="115">#</th>
                         </tr>
                    </thead>
               </table>
          </div>
     </div>

</div>
@endsection

@push('scripts')
<script type="text/javascript">
     $(function () {
          $('#kategori-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: "/kategori",
               columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'deskripsi', name: 'deskripsi'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
               ]
          });
     });

     function alert_delete(id) {
          var dataId = id;
          Swal.fire({
               title: 'Konfirmasi',
               text: "Apakah Anda yakin ingin menghapus data ini?",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#d33',
               cancelButtonColor: '#3085d6',
               confirmButtonText: 'Hapus',
               cancelButtonText: 'Batal'
          }).then((result) => {
               if (result.isConfirmed) {
                    $.ajax({
                         type: "DELETE",
                         data:{ _token: '{{ csrf_token() }}' },
                         url: "/kategori/" + dataId,
                         success: function(response) {
                         Swal.fire({
                              title: 'Sukses',
                              text: response.message,
                              icon: 'success'
                         }).then((result) => {
                              if(result.isConfirmed){
                                   location.reload();
                              }
                         });
                         },
                         error: function(error) {
                         Swal.fire({
                              title: 'Error',
                              text: "Terjadi kesalahan saat menghapus data.",
                              icon: 'error'
                         });
                         }
                    });
               }
          });
     }
</script>

@endpush