@extends('lte_layout.master')

@section('content')
 <div class="ml-2 mt-2">
  <a href="{{route('pertanyaan.index')}}" class="btn btn-danger"> Back </a>
  </div>
  @if(isset($pertanyaan))
    <div class="row">
        <div class="col-0.5 ml-4">
            <br>
            <a href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
            <br>
            <p class="ml-1 mb-0">X</p>
            <a href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
        </div>
        <div class=col>
        <div class="card ml-2 mt-2">
          <div class="card-body">
            <h4 class="card-text">{{ ucwords($pertanyaan->user->name) }}</h4>
            <h2 class="card-text"><b>{{ucfirst($pertanyaan->judul)}}</b></h2>
            <p class="card-text">{!!$pertanyaan->isi!!}</p>
            <a href="{{route('jawaban.index', ['pertanyaan_id' => $pertanyaan->id])}}" class="card-link btn btn-light">Jawab</a>
            <p class="card-text" style="text-align: right;">{{$pertanyaan->created_at}}</p>
          </div>
        </div>
        </div>
      </div>
    @foreach($pertanyaan -> answers as $key => $answer)
    <div class="row">
          <div class="col-0.5 ml-4 mr-auto mt-3" style="justify-content: center">
            <a href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
            <br>
            <p class="ml-1 mb-0">X</p>
            <a href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
          </div>
        <div class="col">
          <div class="card ml-2 mt-2">
            <div class="card-body">
              <h2 class="card-title"><b>{{ucfirst($answer->user->name)}}</b></h2>
              <p class="card-text">{!!$answer->isi!!}</p>        
            </div>
          </div>
        </div>
    </div>
    @endforeach
  @endif
@endsection
