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
                    <label class="form-label">Kode BAN</label>
                    <input class="form-control" type="text" name="kdban">
                </div>
                <div>
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama">
                </div>
                <div>
                    <label class="form-label">Merk</label>
                    <select class="form-select" name="merkban">
                        @foreach ($merkban as $mb)
                            <option value="{{ $mb->id }}">{{ $mb->nama }}</option>
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