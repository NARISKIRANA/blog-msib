@extends('layout.app')
@section('title', 'Posts')
@section('content')
          <div class="card">
               <div class="card-header">
                    <h3 class="text-center m-0">DATA POSTS</h3>
               </div>

               <div class="card-body">
                    <a href="/post/create" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</a>
                    <hr>
                    <div class="table-responsive">
                         <table class="table table-bordered table-striped" id="post-table">
                              <thead>
                                   <tr>
                                        <th width="10">No</th>
                                        <th>img</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Kategori</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th width="75">#</th>
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
          $('#post-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: "/post",
               columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'img', name: 'img', orderable: false, searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'user.name', name: 'user.name'},
                    {data: 'kategori.deskripsi', name: 'kategori.deskripsi'},
                    {data: 'content', name: 'content'},
                    {data: 'status', name: 'status'},
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
                         url: "/post/" + dataId,
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
