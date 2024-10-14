<div class="mb-3">
     <label class="form-label" for="deskripsi">Deskripsi</label>
     <input type="text" name="deskripsi" placeholder="Deskripsi / Nama Kategori" class="form-control" value="{{ old('name', $kategori->deskripsi ?? '') }}" required>
</div>
<div class="mt-3">
     <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i> Simpan</button>
     <a href="{{ route('kategori.index') }}" class="btn btn-danger"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
</div>
