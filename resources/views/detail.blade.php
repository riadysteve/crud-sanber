@extends('layout.master')

@section('title', 'Detail Pertanyaan')

@section('content')
    <section class="details mb-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                  <li class="breadcrumb-item"><a href="/pertanyaan">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail Pertanyaan</li>
                </ol>
              </nav>
            </div>
            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="detail mb-5">
              <h2>{{ $datapertanyaan->judul }}</h2>
              <hr>
              <small class="text-muted">Isi Pertanyaan</small>
              <h3 class="mt-2">{{ $datapertanyaan->isi }}</h3>
              <small class="text-muted">Tanggal Dibuat: {{ $datapertanyaan->tanggal_dibuat }} | Tanggal Diperbaharui: {{ $datapertanyaan->tanggal_diperbaharui }}</small>
            </div>

            
            <div class="jawaban mb-5">
              @if ($jawaban->isEmpty())
                  <div class="d-flex flex-column justify-content-center align-items-center" style="height: 50px;">
                    <p class="text-muted mb-1">Maaf, masih belum ada yang merespon.</p>
                  </div>
              @else
                  <h4 class="text-muted mb-2">Jawaban</h4>
                  @foreach ($jawaban as $item)
                  <div class="card mb-3">
                    <div class="card-body">
                      <p>{{ $item->isi }}</p>
                      <small class="text-muted">{{ $item->tanggal_dibuat }}</small>
                    </div>
                  </div>
                  @endforeach
              @endif
            </div>
            
            <hr>

            <form action="/jawaban/{{ $datapertanyaan->id }}" method="POST">
              @csrf
              <div class="form-group">
                  <label for="exampleInputEmail1">Jawaban</label>
                  <textarea name="isi" placeholder="Posting Jawaban Anda" class="form-control" id="exampleInputEmail1" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <input type="hidden" name="pertanyaan_id" value="{{ $datapertanyaan->id }}">
              </div>
              <div class="form-group">
                <input type="hidden" name="tanggal_dibuat" value="{{ \Carbon\Carbon::now() }}">
              </div>
              <div class="form-group">
                <input type="hidden" name="tanggal_diperbaharui" value="{{ \Carbon\Carbon::now() }}">
              </div>

              <button type="submit" class="btn btn-primary">Post</button>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
