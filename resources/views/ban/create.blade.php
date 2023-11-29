
@extends('layout.master')

@section('title', 'Tambah Ban')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/ban') }}">BAN</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Form Tambah Ban</h4>
            </div>
        </div>
        <form action="{{ url('/ban') }}" method="POST">
            <div class="card-body">
                @csrf
                <div>
                    <label class="form-label @error('kdban') text-danger @enderror">Kode BAN</label>
                    <input class="form-control @error('kdban') is-invalid @enderror" type="text" name="kdban">
                    @error('kdban')
                    <div class="invalid-feedback mb-2">{{$message }}</div?>
                        @enderror
                </div>
                <div>
                    <label class="form-label @error('nama') text-danger @enderror">Nama</label>
                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama">
                    @error('nama')
                    <div class="invalid-feedback mb-2">{{$message }}</div?>
                        @enderror
                </div>
                <div>
                    <label class="form-label @error('harga') text-danger @enderror">Harga</label>
                    <input class="form-control @error('harga') is-invalid @enderror" type="text" name="harga">
                    @error('harga')
                    <div class="invalid-feedback mb-2">{{$message }}</div?>
                        @enderror
                </div>
                <div>
                    <label class="form-label @error('jenisban') text-danger @enderror">Jenis</label>
                    <select class="form-select @error('jenisban') is-invalid @enderror" name="jenisban">
                        @foreach ($jenisban as $jb)
                            <option value="{{ $jb->id }}">{{ $jb->nama }}</option>
                        @endforeach
                        @error('jenisban')
                        <div class="invalid-feedback mb-2">{{$message }}</div?>
                            @enderror
                    </select>
                </div>
                <div>
                    <label class="form-label @error('merkban') text-danger @enderror">Merk</label>
                    <select class="form-select @error('merkban') is-invalid @enderror" name="merkban">
                        @foreach ($merkban as $mb)
                            <option value="{{ $mb->id }}">{{ $mb->nama }}</option>
                        @endforeach
                        @error('merkban')
                        <div class="invalid-feedback mb-2">{{$message }}</div?>
                            @enderror
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection