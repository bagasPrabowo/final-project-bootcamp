@extends('lte_layout.master')

@section('content')
 <div class="ml-2 mt-2">
  <a href="{{route('pertanyaan.index')}}" class="btn btn-light"> Back </a>
  </div>
  @if(isset($pertanyaan))
    <div class="row">
        <div class="col-0.5 ml-4">
            <br>
            <i class="fa fa-chevron-up" aria-hidden="true"></i>
            <br>
            <p class="ml-1 mb-0">X</p>
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </div>
        <div class="col">
            <div class="card ml-2 mt-2">
            <div class="card-body">
                <h2 class="card-text"><b>{{ucfirst($pertanyaan->judul)}}</b></h2>
                <p class="card-text"> {{ ucwords($pertanyaan->user->name) }}</p>
                <p class="card-text">{{$pertanyaan->isi}}</p>
                <a href="{{route('jawaban.index', ['pertanyaan_id' => $pertanyaan->id])}}" class="card-link btn btn-light">Jawab</a>
                <p class="card-text" style="text-align: right;">{{$pertanyaan->updated_at}}</p>
            </div>
            </div>
        </div>
    </div>
        @foreach($pertanyaan -> answers as $key => $answer)
        <div class="row">
            <div class="col-0.5 ml-4 mr-auto mt-3" style="justify-content: center">

                <i class="fa fa-chevron-up" aria-hidden="true"></i>
                <br>
                <p class="ml-1 mb-0">X</p>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </div>
            <div class="col">
            <div class="card ml-2 mt-2">
                <div class="card-body">
                    <h2 class="card-title"><b>{{ ucwords($answer->user->name) }}</b></h2>
                    <p class="card-text">{{$answer->isi}}</p>
                </div>
                </div>
            </div>
        </div>
        @endforeach

  @endif
@endsection
