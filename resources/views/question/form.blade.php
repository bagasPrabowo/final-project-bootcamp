@extends('lte_layout.master')

@section('content')
  <div class="ml-2 mt-2">
  <a href="{{route('pertanyaan.index')}}" class="btn btn-light"> Back </a>
  </div>
  <div class="ml-2">
	<form action="{{route('pertanyaan.store')}}" method='post'>
	  @csrf
		<div class="form-group">
		  <label for="name">Nama</label>
			<input type="text" name="name" placeholder="Enter Name" class="form-control" value="{{old('name')}}">
		</div>
		@error('name')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		  <label for="judul">Judul</label>
			<input type="text" name="judul" placeholder="Title" class="form-control" value="{{old('judul')}}">
		</div>
		@error('judul')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		  <label for="isi">Isi</label>
			<textarea cols="100" rows="6" class="form-control" placeholder="Tanya disini" name="isi">{{old('isi')}}</textarea>
		</div>
		@error('isi')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<input type="submit" value="Submit">
	</form>
  </div>
@endsection
