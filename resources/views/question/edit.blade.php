@extends('lte_layout.master')

@section('content')
  <div class="mt-2 ml-2">
  <a href="{{route('pertanyaan.index')}}" class="btn btn-light"> Back </a>
  </div>
  <div class="ml-2">	
	<form action="{{route('pertanyaan.update', ['id' => $id->id])}}" method='post'>
	  @method('put')
	  @csrf 
		<div class="form-group">
		  <label for="name">Nama</label>
			<input type="text" name="name" placeholder="Enter Name" class="form-control" value="{{$id->name}}" readonly>
		</div>
		@error('name')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		  <label for="judul">Judul</label>
			<input type="text" name="judul" placeholder="Title" class="form-control" value="{{$id->judul}}" readonly>
		</div>
		@error('judul')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		  <label for="isi">Isi</label>
			<textarea cols="100" rows="6" placeholder="Tanya disini" name="isi">{{$id->isi}}</textarea>
		</div>
		@error('isi')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<input type="submit" value="Submit">
	</form>
  </div>
@endsection