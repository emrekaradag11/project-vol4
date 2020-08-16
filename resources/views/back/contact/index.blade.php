@extends("back.layout")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex justify-content-between align-items-center">İletişim <a class="btn btn-success btn-sm" href="contact/create">İletişim Bilgisi Ekle</a></h4>
            </div>
            <ul class="card-content sortables pl-0 pb-3">
                @foreach($contact as $c)
                    <li id="item-{{$c->id}}" data-content="{{$c->id}}" class="px-0 col-12 d-block">
                        <div class="list_item d-flex justify-content-between align-items-center">
                            <span>{{$c->title}} </span>
                            <span>
                                <a href="contact/{{$c->id}}/edit" class="btn-sm btn btn-raised btn-icon btn-github my-0 mr-1"><i class="fa fa-pencil-square-o"></i></a>
                                 <a href="" class="btn btn-sm btn-raised btn-icon btn-vimeo my-0 mr-1"> <i class="fa fa-eye"></i> </a>
                                 <a href="javascript:void(0);" data-id="{{$c->id}}" class="btn btn-sm js_delete btn-raised btn-icon btn-danger my-0 mr-1"> <i class="fa fa-trash-o"></i> </a>
                            </span>
                        </div>
                    </li>
                @endforeach

            </ul>
            <form action="" class="d-none js_delete_form" method="POST">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>

@endsection
