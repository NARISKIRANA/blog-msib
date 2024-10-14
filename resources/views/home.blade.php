@extends('layout.app')
@section('title', 'Home')
@section('content')
     <h1 class="text-center p-3">Blog MSIB - Naris</h1>
     <div class="row">
          @if (count($posts) > 0)
               @foreach ($posts as $post)
                    <div class="col-md-6">
                         <div class="list-group-item justify-content-between align-items-center d-flex mb-3 p-5" style="border: 1px solid black; border-radius: 10px;">
                              <div class="d-flex">
                                   @if ($post->img)
                                        <img src="{{ asset('storage/'.$post->img) }}" alt="Post img" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
                                   @else
                                        <img src="https://via.placeholder.com/100" alt="Default img" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
                                   @endif

                                   <div>
                                        <h5>{{ $post->title }}</a></h5>
                                        <p>in category {{ $post->kategori->deskripsi }}</p>
                                        <p>author: {{ ucfirst($post->user->name) }}</p>
                                        <p>created: {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</p>
                                   </div>
                              </div>
                              
                              <div class="align-self-center">
                                   <a href="{{ route('post.show', $post->id) }}">See more ....</a>
                              </div>
                         </div>
                    </div>
               @endforeach
          @else
               <div class="col-12">
                    <div class="list-group-item justify-content-between align-items-center">
                         No data
                    </div>
               </div>
          @endif
     </div>
@endsection

@push('css')
     <style>
          p {
               margin: 0;
               padding: 0;
          }
          a {
               text-decoration: none;
               color:black;
          }
          a:hover {
               text-decoration: underline;
          }

          .list-group-item {
               transition: background-color 0.3s, color 0.3s;
               color: black;
          }
          .list-group-item:hover {
               background-color: #002fff;
               color: white;
          }
          .list-group-item:hover a{
               color: white;
          }
     </style>
@endpush
