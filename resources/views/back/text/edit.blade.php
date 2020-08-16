@extends("back.layout")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex justify-content-between align-items-center">{{$page->getFirstName->head}}</h4>
                <p>Pellentesque in ipsum id orci porta dapibus.</p>
            </div>


            <div class="col-12">
                <ul class="nav row nav-tabs tabVol2 m-0">
                    <li class="nav-item">
                        <a class="text-uppercase nav-link active" id="tabCont_1" data-toggle="tab" aria-controls="tabpaneCont_1" href="#tabpaneCont_1">Genel Bilgiler</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-uppercase nav-link" id="tabCont_2" data-toggle="tab" aria-controls="tabpaneCont_2" href="#tabpaneCont_2">Görseller</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content col-12 px-0 m-0">
                <div class="tab-pane px-0 active" id="tabpaneCont_1" aria-labelledby="tabpaneCont_1">
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="text/{{$page->id}}" method="post" enctype="multipart/form-data" class="card-body pb-3">
                                @csrf
                                @method('PUT')
                                <ul class="nav col-12 nav-tabs m-0">
                                    @foreach($lng as $l)
                                        <li class="nav-item">
                                            <a class="text-uppercase nav-link {{$l->id==1?'active':null}}" id="tab_{{$l->id}}" data-toggle="tab" aria-controls="tabpane_{{$l->id}}" href="#tabpane_{{$l->id}}">{{$l->lang_short}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content col-12 px-0 m-0">
                                    @foreach($lng as $l => $k)
                                        <div class="tab-pane px-0  {{$k->id==1?'active':null}}" id="tabpane_{{$k->id}}" aria-labelledby="tabpane_{{$k->id}}">
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description{{$l}}">Description ({{$k->lang_short}})</label>
                                                        <input type="text" id="description{{$l}}" class="form-control" name="description[]" value="{{!empty($page->getDetail[$l]->description)?$page->getDetail[$l]->description:null}}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="keywords{{$l}}">Keywords ({{$k->lang_short}})</label>
                                                        <input type="text" id="keywords{{$l}}" class="form-control" name="keywords[]" value="{{!empty($page->getDetail[$l]->keywords)?$page->getDetail[$l]->keywords:null}}">
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="text{{$l}}">Content ({{$k->lang_short}})</label>
                                                    <div class="d-block">
                                                        <textarea name="text[]" id="text{{$l}}" rows="10" cols="80">{{!empty($page->getDetail[$l]->text)?$page->getDetail[$l]->text:null}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row form-group">
                                    <div class="col-12 form-group text-right">
                                        <input type="hidden" name="page_id" value="{{$page->id}}">
                                        <button type="submit" class="btn btn-primary">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-4">

                            @if(count($fields)>0)
                                @include("back\\fields\\edit" , ['field_page_id' => $page->id,"field_parent"=>$page->id])
                            @endif

                        </div>
                    </div>
                </div>
                <div class="tab-pane px-0" id="tabpaneCont_2" aria-labelledby="tabpaneCont_2">
                    <div class="col-12">
                        <div class="card-body px-1">
                            <form action="{{Route("setImg")}}" class="dropzone  dropzone-area"  method="post" enctype="multipart/form-data" id="dpz-multiple-files">
                                @csrf
                                <input type="hidden" name="parent" value="{{$page->id}}">
                                <input type="hidden" name="page_id" value="{{$page->id}}">
                                <input type="hidden" name="type" value="2">
                                <input type="hidden" name="slug_name" value="{{$page->getFirstName->title}}">
                                <div class="dz-message">Görselleri sürükleyip bırakın</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


@section("js")
    <script src="/back/app-assets/vendors/js/katex.min.js" type="text/javascript"></script>
    <script src="/back/app-assets/vendors/js/highlight.min.js" type="text/javascript"></script>
    <script src="/back/app-assets/vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="/back/app-assets/vendors/js/dropzone.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            @foreach($lng as $l => $k)
                CKEDITOR.replace( 'text{{$l}}' );
            @endforeach
            CKEDITOR.config.height = 400;
        });



        Dropzone.options.dpzMultipleFiles = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            dictRemoveFile: " Trash",
            removedfile: function(file)
            {
                var name = file.name;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{Route("deleteImg")}}',
                    data: {
                        filename: name,
                        page_id : "{{$page->id}}"
                    },
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        //console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            @if(!empty($img))
            init: function() {
                var thisDropzone = this;
                    @foreach($img as $im)
                        var mockFile = { name: '{{$im->img}}', size: {{filesize("img/" . $im->img)}}, type: '{{image_type_to_mime_type(exif_imagetype("img/" . $im->img))}}' };
                        thisDropzone.emit("addedfile", mockFile);
                        thisDropzone.emit("success", mockFile);
                        thisDropzone.emit("complete",mockFile);
                        thisDropzone.emit("thumbnail", mockFile, "{{url("img/" . $im->img)}}");
                    @endforeach
                    this.on("maxfilesexceeded", function(file){
                    this.removeFile(file);
                    alert("No more files please!");
                });
            }
            @endif
        }


    </script>
@endsection


@section("css")
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/monokai-sublime.min.css">
@endsection

