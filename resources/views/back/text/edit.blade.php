@extends("back.layout")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex justify-content-between align-items-center">{{$page->getFirstName->head}}</h4>
                <p>Pellentesque in ipsum id orci porta dapibus.</p>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="corporate/{{$page->id}}" method="post" enctype="multipart/form-data" class="card-body pb-3">
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
                                <button type="submit" name="save_text" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
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
    <script src="/back/app-assets/js/dropzone.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            @foreach($lng as $l => $k)
            CKEDITOR.replace( 'text{{$l}}' );
            @endforeach
            CKEDITOR.config.height = 400;
        });
    </script>
@endsection