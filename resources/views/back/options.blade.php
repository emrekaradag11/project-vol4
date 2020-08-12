@extends("back.layout")
@section("content")

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ayarlar</h4>
                <p>Bu sayfada web sitenize dair genel ayarları ve sosyal medyalarınızı düzenleyebilirsiniz.</p>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="nav-vertical">
                        <ul class="nav nav-tabs nav-left">
                            <li class="nav-item">
                                <a class="nav-link active" id="general_site_options-tab" data-toggle="tab" aria-controls="general_site_options"
                                   href="#general_site_options"><i class=" mr-1 fa fa-align-justify"></i> Genel Site Ayarları</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="socialMedia-tab" data-toggle="tab" aria-controls="socialMedia" href="#socialMedia"><i class="fa fa-facebook-square  mr-1"></i> Sosyal Medyalar</a>
                            </li>
                        </ul>
                        <form class="form tab-content px-1 pt-0" method="post" action="">
                            <div role="tabpanel" class="tab-pane active" id="general_site_options" aria-labelledby="general_site_options-tab">
                                <div class="col-md-8 mx-auto">
                                    <div class="card my-0">
                                        <div class="card-content">
                                            <div class="px-3">
                                                {{csrf_field()}}
                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="fa fa-align-justify"></i> Genel Site Ayarları</h4>
                                                    <div class="row mx-0">
                                                        <ul class="nav col-12 nav-tabs m-0">
                                                            @foreach($lng as $l)
                                                                <li class="nav-item">
                                                                    <a class="text-uppercase nav-link {{$l->id==1?'active':null}}" id="tab_{{$l->id}}" data-toggle="tab" aria-controls="tabpane_{{$l->id}}" href="#tabpane_{{$l->id}}">{{$l->lang}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                        <div class="tab-content col-12 px-0 m-0">
                                                            @foreach($lng as $l => $k)
                                                                <div class="tab-pane px-0  {{$k->id==1?'active':null}}" id="tabpane_{{$k->id}}" aria-labelledby="tabpane_{{$k->id}}">
                                                                    <div class="row mx-0">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="siteTitle">Site Başlığı ({{$lng[$l]["lang"]}})</label>
                                                                                <input type="text" id="siteTitle" class="form-control" name="siteTitle[]"{!! !empty($options->getDetail[$l]->title)?'  value="' . $options->getDetail[$l]->title . '"':null!!}>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="keywords">Keywords ({{$lng[$l]["lang"]}})</label>
                                                                                <textarea type="text" id="keywords" class="form-control" name="keywords[]">{!! !empty($options->getDetail[$l]->keywords)? $options->getDetail[$l]->keywords :null!!}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="description">Description ({{$lng[$l]["lang"]}})</label>
                                                                                <textarea type="text" id="description"  class="form-control" name="description[]">{!! !empty($options->getDetail[$l]->description)?$options->getDetail[$l]->description  :null!!}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="siteUrl">Site Uzantısı</label>
                                                                <input type="text" id="siteUrl" class="form-control" name="siteUrl" value="{{!empty($options->url)?$options->url:null}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="socialMedia" aria-labelledby="socialMedia-tab">
                                <div class="col-md-8 mx-auto">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="px-3">
                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="fa fa-facebook-square"></i> Sosyal Medyalar</h4>
                                                    <div class="row">

                                                        @foreach(json_decode($options->socials) as $k => $s)

                                                            @if($k == 0)
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="social1"><i class="fa fa-facebook-square mr-1"></i>Facebook</label>
                                                                        <input type="text" id="social1" class="form-control" name="social[]" value="{{!empty($s)?$s:null}}">
                                                                    </div>
                                                                </div>
                                                            @elseif($k == 1)
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="social2"><i class="fa fa-instagram mr-1"></i>Instagram</label>
                                                                        <input type="text" id="social2" class="form-control" name="social[]" value="{{!empty($s)?$s:null}}">
                                                                    </div>
                                                                </div>
                                                            @elseif($k == 2)
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="social3"><i class="fa fa-twitter-square mr-1"></i>Twitter</label>
                                                                        <input type="text" id="social3" class="form-control" name="social[]" value="{{!empty($s)?$s:null}}">
                                                                    </div>
                                                                </div>
                                                            @elseif($k == 3)
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="social4"><i class="fa fa-youtube-square mr-1"></i>Youtube</label>
                                                                        <input type="text" id="social4" class="form-control" name="social[]" value="{{!empty($s)?$s:null}}">
                                                                    </div>
                                                                </div>
                                                            @elseif($k == 4)
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="social5"><i class="fa fa-pinterest-square mr-1"></i>Pinterest</label>
                                                                        <input type="text" id="social5" class="form-control" name="social[]" value="{{!empty($s)?$s:null}}">
                                                                    </div>
                                                                </div>
                                                            @elseif($k == 5)
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="social6"><i class="fa fa-linkedin-square mr-1"></i>Linked-in</label>
                                                                        <input type="text" id="social6" class="form-control" name="social[]" value="{{!empty($s)?$s:null}}">
                                                                    </div>
                                                                </div>
                                                            @elseif($k == 6)
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="social7"><i class="fa fa-google-plus-square mr-1"></i>Google Plus</label>
                                                                        <input type="text" id="social7" class="form-control" name="social[]" value="{{!empty($s)?$s:null}}">
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        @endforeach

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions text-right">
                                <div class="col-lg-8 mx-auto px-3">
                                    <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                        <i class="fa fa-check-square-o"></i> Kaydet
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("js")
    <script>
        $(document).ready(function () {
            $(".phone-mask").mask('9 (000) 000 00 00');
        })
    </script>
@endsection
