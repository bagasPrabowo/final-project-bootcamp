@extends('lte_layout.master')


@section('content')
  <div class="ml-2 mt-2">
  <a href="{{route('pertanyaan.show',['id' => $pertanyaan->id])}}" class="btn btn-light"> Back </a>
  </div>
  @if(isset($pertanyaan))
    <div class="card ml-2 mt-2">
      <div class="card-body">
        <h2 class="card-title"><b>{{ucfirst($pertanyaan->judul)}}</b></h2>
        <p class="card-text">{{$pertanyaan->isi}}</p>
      </div>
    </div>
  
    <div class="ml-2">  
      <form action="{{route('jawaban.store', ['pertanyaan_id' => $pertanyaan->id])}}" method='post'>
        @csrf
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" name="name" placeholder="Enter Name" class="form-control" value="{{old('name')}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
          <label for="isi">Isi</label>
          <textarea cols="100" rows="6" placeholder="Tanya disini" name="isi">{{old('isi')}}</textarea>
        </div>
        @error('isi')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="hidden" name="question_id" value="{{$pertanyaan->id}}">
        <input type="submit" value="Submit">
      </form>
    </div>
    @else 
    <div class="alert alert-danger" style="text-align: center;">Pertanyaan Tidak Ditemukan!</div>
    @endif
@endsection