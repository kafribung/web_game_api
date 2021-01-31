<div class="position-relative form-group">
    <label for="img" class="">Gambar</label>
    @empty(!$game->img)
    <img src="{{ $game->takeImg }}" alt="Error" width="100" for="img">
    @endempty
    <input name="img" id="img"  type="file" accept="image/*" class="form-control" autofocus>
    @error('img')
    <small class="text-danger">{{ $message }}</small> 
    @enderror
</div>
<div class="position-relative form-group">
    <label for="nama" class="">Nama</label>
    <input name="name" id="nama" placeholder="Nama permainan" autocomplete="off" type="text" class="form-control" value="{{ old('name') ?? $game->name }}">
    @if ($errors->has('name'))
    <small class="text-danger">{{ $errors->first('name') }}</small>
    @endif
</div>
<div class="position-relative form-group">
    <label for="duration" class="">Durasi</label>
    <input name="duration" id="duration" placeholder="Lama permainan (menit)" autocomplete="off" type="number" class="form-control" value="{{ old('duration') ?? $game->duration }}">
    @error('duration')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="position-relative form-group">
    <label for="description" class="">Deskripsi</label>
    <textarea name="description" id="description" placeholder="Deskripsi permainan" class="form-control" >{{ old('description') ?? $game->description }}</textarea>
    @error('description')
    <small class="text-danger">{{ $message }}</small> 
    @enderror
</div>