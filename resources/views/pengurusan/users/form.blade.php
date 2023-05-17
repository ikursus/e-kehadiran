<div class="form-group">
    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" required value="{{ isset($user) ? $user->nama : old('nama') }}">
    @error('nama')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Alamat emel" required value="{{ isset($user) ? $user->email : old('email') }}">
    @error('email')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Katalaluan" required>
    @error('password')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <input type="password" class="form-control" name="password_confirmation" placeholder="Pengesahan Katalaluan" required>
    <span class="text-muted">Sila ulang taip password untuk pengesahan (jika membuat pertukaran)</span>
</div>

<div class="form-group">
    <input type="text" class="form-control" name="telefon" placeholder="No telefon" value="{{ isset($user) ? $user->telefon : old('telefon') }}">
</div>

<div class="form-group">
    <textarea class="form-control" name="alamat" placeholder="Alamat surat menyurat">{{ isset($user) ? $user->alamat : old('alamat') }}</textarea>
</div>
