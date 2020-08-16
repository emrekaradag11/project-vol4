@extends("back.layout")
@section("content")

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex justify-content-between align-items-center">Sayfalar <a class="btn btn-success btn-sm" href="pages/create">Sayfa Ekle</a></h4>
                <p>Bu menüden sayfalarınızı görüntüleyebilir ve düzenleyebilirsiniz. </p>
            </div>
            <ul class="card-content sortables pl-0 pb-3">
                @include("back/pages/subCategory",["pages" => $pages])
            </ul>
            <form action="" class="d-none js_delete_form" method="POST">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>

@endsection
