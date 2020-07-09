@extends('lte_layout.master')
@push('script-head')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush
@section('content')
  <div class="mt-2 ml-2">
  <a href="{{route('pertanyaan.index')}}" class="btn btn-danger"> Back </a>
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
		  <textarea name="isi" class="form-control my-editor">{!! old('isi', $isi ?? '') !!}</textarea>
		</div>
		@error('isi')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<input type="submit" value="Submit">
	</form>
  </div>
@endsection
@push('scripts')
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endpush