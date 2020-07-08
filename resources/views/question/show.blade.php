@extends('lte_layout.master')

@section('content')
 <div class="ml-2 mt-2">
  <a href="{{route('pertanyaan.index')}}" class="btn btn-light"> Back </a>
  </div>
  @if(isset($pertanyaan))
    <div class="card ml-2 mt-2">
      <div class="card-body">
        <h2 class="card-title"><b>{{ucfirst($pertanyaan->judul)}}</b></h2>
        <p class="card-text">{{$pertanyaan->isi}}</p>
        <a href="{{route('jawaban.index', ['pertanyaan_id' => $pertanyaan->id])}}" class="card-link btn btn-light">Jawab</a>
        <p class="card-text" style="text-align: right;">{{$pertanyaan->created_at}}</p>

      </div>
    </div>
    @foreach($pertanyaan -> answers as $key => $answer)
        <div class="card ml-2 mt-2">
          <div class="card-body">
            <h2 class="card-title"><b>{{ucfirst($answer->name)}}</b></h2>
            <p class="card-text">{{$answer->isi}}</p>        
          </div>
        </div>
   @endforeach
  @endif
@endsection