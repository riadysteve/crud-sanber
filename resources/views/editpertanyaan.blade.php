@extends('layout.master')

@section('title', 'Pertanyaan')

@section('content')

    <section class="info my-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <form action="/pertanyaan/{{ $pertanyaan->id }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Pertanyaan</label>
                    <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Judul Pertanyaan Anda" value="{{ $pertanyaan->judul }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Isi Pertanyaan</label>
                    <input name="isi" type="text" class="form-control @error('isi') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Isi Pertanyaan" value="{{ $pertanyaan->isi }}">
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                  <input type="hidden" name="tanggal_dibuat" value="{{ $pertanyaan->tanggal_dibuat }}">
                </div>
                <div class="form-group">
                  <input type="hidden" name="id" value="{{ $pertanyaan->id }}">
                </div>
                <div class="form-group">
                  <input type="hidden" name="tanggal_diperbaharui" value="{{ \Carbon\Carbon::now() }}">
                </div>
                
                <hr>
                <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>

        </div>
      </div>
    </section>
@endsection