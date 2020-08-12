@extends("back.layout")
@section("content")

    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-header">
                        <h4 class="card-title">{{$page->getFirstName->title}} Düzenle</h4>
                        <p>Pellentesque in ipsum id orci porta dapibus.</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form row" method="post" enctype="multipart/form-data" action="pages/{{$page->id}}">
                                <input type="hidden" name="id" value="{{$page->id}}">
                                <div class="col-12">
                                    @csrf
                                    @method("PUT")
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
                                                            <label for="head{{$l}}">Sayfa İsmi ({{$lng[$l]["lang_short"]}})</label>
                                                            <input type="text" id="head{{$l}}" class="form-control" name="title[]" value="{{!empty($page->getDetail[$l]->title)?$page->getDetail[$l]->title:null}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="description{{$l}}">Description ({{$lng[$l]["lang_short"]}})</label>
                                                            <input type="text" id="description{{$l}}" class="form-control" name="description[]" value="{{!empty($page->getDetail[$l]->description)?$page->getDetail[$l]->description:null}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="keywords{{$l}}">Keywords ({{$lng[$l]["lang_short"]}})</label>
                                                            <input type="text" id="keywords{{$l}}" class="form-control" name="keywords[]" value="{{!empty($page->getDetail[$l]->keywords)?$page->getDetail[$l]->keywords:null}}">
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
                                                    <option {{$page->template == "1"?"selected":null}} value="1">Text</option>
                                                    <option {{$page->template == "2"?"selected":null}} value="2">Tree</option>
                                                    <option {{$page->template == "3"?"selected":null}} value="3">Images</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="redirect">Redirect</label>
                                                <input type="text" id="redirect" class="form-control" value="{{$page->redirect}}" name="redirect">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="parent">Üst Sayfa</label>
                                                <select name="parent" class="form-control" id="parent">
                                                    <option value="0">Ana Menü</option>
                                                    @foreach($parent as $p)
                                                        <option {{$page->parent == $p->id?"selected":null}} value="{{$p->id}}">{{$p->getFirstName->title}}</option>
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
                <div class="col-lg-4">
                    <div class="card-header">
                        <h4 class="card-title">Ek Alanlar</h4>
                        <p>Sayfaya tanımlı ek alanları görebilirsiniz.</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="text-right">
                                <button type="button" class="js-addSpace btn btn-primary btn-lg" data-toggle="modal" data-target="#add_spaces"><i class="fa fa-pencil"></i> Ekle</button>
                            </div>

                            {{--<ul class="sortables pl-0">
                                @if($fields>0)
                                    @foreach($fields as $f)
                                        <li id="item-{{$f->id}}" class="d-block" data-content="{{$f->id}}">
                                        <span class="list_item px-2 d-flex justify-content-between align-items-center">
                                            <span>{{$f->getFirstName->name}}</span>
                                            <span>
                                                 <a data-info="{{$f}}" data-names="{{$f->getNames}}" class="js-edit btn text-white btn-sm btn-raised btn-icon btn-secondary my-0 mr-1"> <i class="fa fa-pencil-square-o"></i> </a>
                                                 <a class="btn text-white btn-sm btn-raised btn-icon btn-vimeo my-0 mr-1"> <i class="fa fa-eye"></i> </a>
                                                 <a class="btn text-white btn-sm btn-raised btn-icon btn-danger my-0 mr-1"> <i class="fa fa-trash-o"></i> </a>
                                            </span>
                                        </span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("modal")
    <div class="modal fade js-edit_modal" id="add_spaces" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alan Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form row" method="post" enctype="multipart/form-data" action="">
                        @csrf
                        <ul class="nav col-12 nav-tabs m-0 px-3">
                            @foreach($lng as $l)
                                <li class="nav-item">
                                    <a class="text-uppercase nav-link {{$l->id==1?'active':null}}" id="tab_{{$l->id}}_add" data-toggle="tab" aria-controls="tabpane_{{$l->id}}_add" href="#tabpane_{{$l->id}}_add">{{$l->lang_short}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content col-12 m-0">
                            @foreach($lng as $l => $k)
                                <div class="tab-pane px-0  {{$k->id==1?'active':null}}" id="tabpane_{{$k->id}}_add" aria-labelledby="tabpane_{{$k->id}}_add">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Alan İsmi</label>
                                                <input type="text" id="name" required class="form-control" name="name[]">
                                            </div>
                                        </div>
                                        <div class="col-12 js-selectType d-none">
                                            <div class="form-group">
                                                <label for="properties">Select Tipi</label>
                                                <div class="d-block">
                                                    <textarea name="properties[]" class="form-control" id="properties" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 js-selectedType">
                            <div class="form-group">
                                <label for="type">Alan Tipi</label>
                                <select name="type" class="form-control" required id="type">
                                    <option>Please Select</option>
                                    <option value="1">Text Input</option>
                                    <option value="2">Select Box</option>
                                    <option value="3">Text Box</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 js-inputType d-none">
                            <div class="form-group">
                                <label for="options">Input Type</label>
                                <div class="d-block">
                                    <div class="custom-control custom-radio d-inline-block custom-control-inline">
                                        <input id="type1" type="radio" value="text" name="options" class="custom-control-input">
                                        <label for="type1" class="custom-control-label">Text</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block custom-control-inline">
                                        <input id="type2" type="radio" value="phone" name="options" class="custom-control-input">
                                        <label for="type2" class="custom-control-label">Phone</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block custom-control-inline">
                                        <input id="type3" type="radio" value="mail" name="options" class="custom-control-input">
                                        <label for="type3" class="custom-control-label">Mail</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block custom-control-inline">
                                        <input id="type4" type="radio" value="date" name="options" class="custom-control-input">
                                        <label for="type4" class="custom-control-label">Date</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="page_id" value="{{$page->id}}">
                        <input type="hidden" name="id">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section("js")
    <script src="/admin/app-assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/admin/app-assets/vendors/js/toastr.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $( ".sortables" ).sortable({
                revert: true,
                handle: ".list_item",
                stop: function (event, ui) {
                    let data = $(this).sortable('toArray', {attribute: 'data-content'});
                    $.ajax({
                        type:"post",
                        data: {
                            data : data,
                            table : "add_space"
                        },
                        url: "{!!route('admin.sortable')!!}",
                        success: function (msg) {
                            console.log(msg);
                            if (msg) {
                                toastr.success("Sıralama gerçekleştirildi", "İşlem Başarılı!", {
                                    showMethod: "slideDown",
                                    hideMethod: "slideUp",
                                    timeOut: 3e3,
                                    progressBar: !0,
                                    closeButton: !0
                                })
                            } else {
                                toastr.warning("Bir sorun var gibi görünüyor", "İşlem Başarısız", {
                                    showMethod: "slideDown",
                                    hideMethod: "slideUp",
                                    timeOut: 3e3,
                                    progressBar: !0,
                                    closeButton: !0
                                })
                            }
                        }
                    });

                }
            });
            $('.sortables').disableSelection();

        });

        $(".js-addSpace").click(function () {
            $(".js-edit_modal form")[0].reset();
            $(".js-inputType").addClass("d-none");
            $(".js-selectType").addClass("d-none");
            $(".js-edit_modal [name='id']").val("");
        });

        $(".js-edit").click(function () {
            let modal = $(".js-edit_modal");
            let id = $(this).data("info").id;
            let type = $(this).data("info").type;
            let options = $(this).data("info").options;
            let names = $(this).data("names");
            let name_inputs = modal.find("[name='name[]']");
            let props_inputs = modal.find("[name='properties[]']");


            $(names).each(function(x,y){
                $(name_inputs[x]).val(y.name);
                $(props_inputs[x]).val(y.properties);
            })

            modal.find("[name='id']").val(id);
            modal.find("[name='type']").val(type).trigger("change");
            modal.find("[name='options'][value='" + options + "']").prop("checked" , true);

            modal.modal().show();
        });

        $(".js-selectedType select").on("change",function () {
            if($(this).val() == 1){
                $(".js-inputType").removeClass("d-none");
                $(".js-selectType").addClass("d-none");
            }else if($(this).val() == 2){
                $(".js-selectType").removeClass("d-none");
                $(".js-inputType").addClass("d-none");
            }else{
                $(".js-inputType").addClass("d-none");
                $(".js-selectType").addClass("d-none");
            }
        })
    </script>

@endsection
