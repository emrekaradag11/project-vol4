@extends("back.layout")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-header">
                        <h4 class="card-title d-flex justify-content-between align-items-center">Sayfa Ekle<a class="btn btn-success btn-sm" href="pages">Geri Dön</a></h4>
                        <p>Bu menüden sayfalarınızı ekleyebilirsiniz.</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form row" method="post" enctype="multipart/form-data" action="pages">
                                <div class="col-12">
                                    @csrf
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
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="head">Sayfa İsmi ({{$lng[$l]["lang_short"]}})</label>
                                                            <input type="text" id="head" class="form-control" name="title[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="description">Description ({{$lng[$l]["lang_short"]}})</label>
                                                            <input type="text" id="description" class="form-control" name="description[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="keywords">Keywords ({{$lng[$l]["lang_short"]}})</label>
                                                            <input type="text" id="keywords" class="form-control" name="keywords[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="template">Sayfa Şablonu</label>
                                                <select name="template" class="form-control" id="template">
                                                    <option value="1">Text</option>
                                                    <option value="2">Tree</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="redirect">Redirect</label>
                                                <input type="text" id="redirect" class="form-control" name="redirect">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="parent">Üst Sayfa</label>
                                                <select name="parent" class="form-control" id="parent">
                                                    <option value="0">Ana Menü</option>
                                                    @foreach($parent as $p)
                                                        <option value="{{$p->id}}">{{$p->getFirstName->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions col-12 text-right">
                                            <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                                <i class="fa fa-check-square-o"></i> Kaydet
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

