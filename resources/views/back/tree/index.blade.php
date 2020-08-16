@extends("back.layout")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex justify-content-between align-items-center">{{$page->getFirstName->title}} <a class="btn btn-success btn-sm" href="tree/create/{{$page->id}}">Ekle {{$page->getFirstName->title}}</a></h4>
            </div>
            <ul class="card-content sortables pl-0 pb-3">
                @include("back.tree.subCategory",["tree" => $tree])
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
