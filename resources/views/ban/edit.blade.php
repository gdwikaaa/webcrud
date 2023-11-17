@extends('layout.master')

@section('title', 'Ubah ban')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/ban') }}">ban</a></li>
    <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Ubah BAN</h4>
            </div>
        </div>
        <form action="{{ url('/ban/' . $id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div>
                    <label class="form-label">NIM</label>
                    <input class="form-control" type="text" name="nim" value="{{ $banban->kdbarang }}">
                </div>
                <div>
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama" value="{{ $banban->nama }}">
                </div>
                <div>
                    <label class="form-label">Harga</label>
                    <input class="form-control" type="number" name="harga" value="{{ $banban->harga }}">
                </div>
                <div>
                    <label class="form-label">merk</label>
                    <select class="form-select" name="merk">
                        @foreach ($merkban as $mb)
                            <option {{ $banban->merk_id == $m->id ? 'selected' : '' }} value="{{ $mb->id }}">{{ $mb->nama }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection