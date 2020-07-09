@extends('lte_layout.master')

@section('content')
    <div class="ml-2 mt-2">
      <a href="/pertanyaan/create" class="btn btn-light">
        <i class="icon fa fa-question-circle-o" aria-hidden="true"></i>
        Buat Pertanyaan</a>
    </div>
      @foreach($questions as $key => $question)
        <div class="card ml-2 mt-2">
          <div class="card-body">
            <h2 class="card-text"><b>{{ucfirst($question->judul)}}</b></h2>
            <p class="card-text"> {{ ucwords($user->name) }}</p>
            <p class="card-text">{{$question->isi}}</p>
            <form action="{{route('pertanyaan.delete', ['id' => $question->id])}}" method='post'>
            <a href="{{route('pertanyaan.show', ['id' => $question->id])}}" class="card-link btn btn-light">Lihat Detail</a>
            <a href="{{route('pertanyaan.edit',['id' => $question->id])}}" class="card-link btn btn-light">Edit</a>
            @csrf
            @method('delete')
             <button type="submit" class="card-link btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">Delete</button>
           </form>
          </div>
        </div>
      @endforeach

@endsection
