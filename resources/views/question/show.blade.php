@extends('lte_layout.master')

@section('content')
  <!-- tombol back -->
  <div class="ml-2 mt-2">
  <a href="{{route('pertanyaan.index')}}" class="btn btn-danger"> Back </a>
  </div>
  <!-- end back button -->
  @if(isset($pertanyaan))
    <div class="row">
        <!-- vote -->
        <div class="col-0.5 ml-4">
            <br>
            <!-- upvote -->
            <form action="{{route('vote.store1', ['id' => $pertanyaan->id])}}" method='post'>
                @csrf
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $pertanyaan->user->id }}">
                    <input type="hidden" name="question_id" value="{{ $pertanyaan->id }}">
                    <input type="hidden" name='vote' value="1">
                    <button type="submit" class="fa fa-chevron-up" style="color: black" aria-hidden="true">
                </div>
            </form>
            <!-- count -->
            <p class="ml-2">{{ $pertanyaan->count }}</p>
            <!-- downvote -->
            <form action="{{route('vote.store1', ['id' => $pertanyaan->id])}}" method='post'>
                @csrf
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $pertanyaan->user->id }}">
                    <input type="hidden" name="question_id" value="{{ $pertanyaan->id }}">
                    <input type="hidden" name='vote' value="0">
                    <button type="submit" class="fa fa-chevron-down" style="color: black" aria-hidden="true">
                </div>
            </form>
        </div>
        <!-- end vote -->
        <!-- pertanyaan_id -->
        <div class=col>
        <div class="card ml-2 mt-2">
          <div class="card-body">
            <h4 class="card-text">{{ ucwords($pertanyaan->user->name) }} 
            <small class="bg-secondary" style="font-size: 15px">{{ $pertanyaan->user->contribution }}</small></h4>
            <h2 class="card-text"><b>{{ucfirst($pertanyaan->judul)}}</b></h2>
            <p class="card-text">{!!$pertanyaan->isi!!}</p>
            @foreach($pertanyaan->tags as $tag)
              <button class="btn btn-info btn-sm">{{$tag->tag_name}}</button>
            @endforeach
            <br>
            <a href="{{route('jawaban.index', ['pertanyaan_id' => $pertanyaan->id])}}" class="card-link btn btn-light">Jawab</a>
            <p class="card-text" style="text-align: right;">{{$pertanyaan->created_at}}</p>
          </div>
        </div>
        </div>
        <!-- end pertanyaan_id -->
      </div>
    
    @foreach($pertanyaan -> answers as $key => $answer)
    <div class="row">
          <!-- tombol vote -->
          <div class="col-0.5 ml-4 mr-auto mt-3" style="justify-content: center">
            <!-- upvote -->
            <form action="{{route('vote.store2', ['id' => $pertanyaan->id])}}" method='post'>
                @csrf
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $answer->user->id }}">
                    <input type="hidden" name="answer_id" value="{{$answer->id }}">
                    <input type="hidden" name='vote' value="1">
                    <button type="submit" class="fa fa-chevron-up" style="color: black" aria-hidden="true">
                </div>
            </form>
            <!-- count -->
            <p class="ml-2">{{ $answer->count }}</p>
            <!-- down vote -->
            <form action="{{route('vote.store2', ['id' => $pertanyaan->id])}}" method='post'>
                @csrf
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $answer->user->id }}">
                    <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                    <input type="hidden" name='vote' value="0">
                    <button type="submit" class="fa fa-chevron-down" style="color: black" aria-hidden="true">
                </div>
            </form>
          </div>
          <!-- end vote -->
        <div class="col">
          <div class="card ml-2 mt-2">
            <div class="card-body">
              <h2 class="card-title"><b>{{ucfirst($answer->user->name)}} 
              <small class="bg-secondary" style="font-size: 15px">{{ $answer->user->contribution }}</small></b></h2>
              <p class="card-text">{!!$answer->isi!!}</p>
            </div>
          </div>
        </div>
    </div>
    @endforeach
    <!-- end jawaban -->
  @endif
@endsection
