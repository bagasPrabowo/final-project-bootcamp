@extends('lte_layout.master')

@push('script-head')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush
@section('content')
  <div class="ml-2 mt-2">
  <a href="{{route('pertanyaan.index')}}" class="btn btn-light"> Back </a>
  </div>
  <div class="ml-2">
	<form action="{{route('pertanyaan.store')}}" method='post'>
	  @csrf
		<div class="form-group">
		  <label for="judul">Judul</label>
			<input type="text" name="judul" placeholder="Title" class="form-control" value="{{old('judul')}}">
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
    <div class="form-group">
		  <label for="tags">Tags</label>
			<input type="text" name="tags" placeholder="Tags" class="form-control" id="tags">
		</div>
		<input type="submit" class="btn btn-primary" value="Submit">
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
