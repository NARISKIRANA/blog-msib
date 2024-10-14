<div class="mb-3">
     <label class="form-label" for="created_by">Author</label>
     <select name="created_by" class="form-control" required>
          <option value="" disabled {{ old('created_by', isset($post) ? $post->created_by : '') == '' ? 'selected' : '' }}>Pilih author....</option>
          @foreach ($user as $u)
               <option value="{{ $u->id }}" {{ old('created_by', isset($post) ? $post->created_by : '') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
          @endforeach
     </select>
</div>
<div class="mb-3">
     <label class="form-label" for="title">Title</label>
     <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title', isset($post) ? $post->title : '') }}" required>
</div>
<div class="mb-3">
     <label class="form-label" for="img">Image</label>
     <div style="display: flex; align-items: center;">
          @if(isset($post) && $post->img)
                    <div style="margin-right: 15px;">
                    <img src="{{ asset('storage/'.$post->img) }}" alt="Image post" width="35" height="35">
               </div>
          @endif
          <input type="file" name="img" class="form-control" accept="image/*">
     </div>
</div>
<div class="mb-3">
     <label class="form-label" for="kategori_id">Kategori</label>
     <select name="kategori_id" class="form-control" required>
          <option value="" disabled {{ old('kategori_id', isset($post) ? $post->kategori_id : '') == '' ? 'selected' : '' }}>Pilih kategori....</option>
          @foreach ($kategori as $k)
               <option value="{{ $k->id }}" {{ old('kategori_id', isset($post) ? $post->kategori_id : '') == $k->id ? 'selected' : '' }}>{{ $k->deskripsi }}</option>
          @endforeach
     </select>
</div>
<div class="mb-3">
     <label class="form-label" for="content">Content</label>
     <textarea name="content" class="form-control" rows="4" placeholder="Masukkan content ..." required>{{ old('content', isset($post) ? $post->content : '') }}</textarea>
</div>
<div class="mb-3">
     <label class="form-label" for="status">Status</label>
     <select name="status" class="form-control" required>
          <option value="" disabled {{ old('status', isset($post) ? $post->status : '') == '' ? 'selected' : '' }}>Pilih status...</option>
          <option value="draft" {{ old('status', isset($post) ? $post->status : '') == 'draft' ? 'selected' : '' }}>draft</option>
          <option value="published" {{ old('status', isset($post) ? $post->status : '') == 'published' ? 'selected' : '' }}>published</option>
     </select>
</div>
<div class="mt-3">
     <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i> Simpan</button>
     <a href="{{ route('post.index') }}" class="btn btn-danger"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
</div>
