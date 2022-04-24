@extends('layout.master')

@section('judul')
    Daftar Materi
@endsection

{{-- @push('style')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush --}}

@section('content')
<div class="row mt-5">
    <div class="row">
      @if (auth()->user()->level=="admin")
        <div>
            <a href="/modul/materi/create/{{$modul->id}}" class="btn bg-gradient-success text-capitalize mb-4"><span class="material-icons">bookmark_add</span> Tambah Materi</a>
        </div>
        @endif
        @forelse ($materi as $key=>$value)
            <div class="col-md-10">
                <div class="accordion" id="accordionRental">
                    <div class="accordion-item mb-3">
                      <h5 class="accordion-header" id="headingOne">
                        <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{'key'}}" aria-expanded="false" aria-controls="collapseOne">
                          Materi {{$key + 1}}
                          <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                          <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                        </button>
                      </h5>
                      <div id="{{'key'}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
                        <div class="accordion-body text-sm opacity-8">
                            <p>Judul : {{$value->judul}}</p>
                            <p>Link Materi : <a href="{{asset('files/' . $value->file_materi)}}" target="_blank" rel="noopener noreferrer" class="text-decoration-none">{{$value->file_materi}}</a></p>
                        </div>
                      </div>
                      @if (auth()->user()->level=="admin")
                      <div>
                          <form action="/modul/materi/{{$value->id}}" method="POST" class="pt-2">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn bg-gradient-danger text-capitalize ms-2"><span class="material-icons text-white">delete</span></button>
                          </form>
                      </div>
                    @endif
                    </div>
                </div>
                {{-- <div class="accordion accordion-flush" id="accordionFlushExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$value->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                        Accordion Item #1
                      </button>
                    </h2>
                    <div id="{{$value->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body text-sm">
                        <p>Judul : {{$value->judul}}</p>
                        <p>Link Materi : <a href="{{$value->file_materi}}" target="_blank" rel="noopener noreferrer" class="text-decoration-none">{{$value->file_materi}}</a></p>
                      </div>
                    </div>
                  </div>
                </div> --}}
            </div>
        @empty
            <h4 class="text-center">Materi tidak ada!</h4>
        @endforelse
  </div>
@endsection

