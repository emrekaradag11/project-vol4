@extends("back.layout")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex justify-content-between align-items-center">{{$page->getFirstName->title}} <a class="btn btn-success btn-sm" href="tree/create/{{$page->id}}">Ekle {{$page->getFirstName->title}}</a></h4>
            </div>
            <ul class="card-content sortables pl-0 pb-3">
                @foreach($tree as $t)
                    <li id="item-{{$t->id}}" data-content="{{$t->id}}" class=" col-12 d-block">
                        <div class="list_item d-flex justify-content-between align-items-center">
                            <span>{{$t->getFirstName->title}}</span>
                            <span>
                                <a href="tree/{{$t->id}}/edit/{{$t->page_id}}" class="btn btn-sm btn-raised btn-icon btn-secondary my-0 mr-1"> <i class="fa fa-pencil-square-o"></i> </a>
                                <a href="" class="btn btn-raised btn-icon btn-vimeo my-0 mr-1 btn-sm"> <i class="fa fa-eye"></i> </a>
                                <a href="javascript:void(0);" data-id="{{$t->id}}" class="btn btn-sm js_delete btn-raised btn-icon btn-danger my-0 mr-1"> <i class="fa fa-trash-o"></i> </a>
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
@section("js")
    <script type="text/javascript">
        $(".js_delete").on("click",function () {
            $(".js_delete_form").attr("action","tree/" + $(this).data("id")).submit();
        })
    </script>
@endsection
