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



@section("js")
    <script src="/back/app-assets/js/jquery-ui.min.js" type="text/javascript"></script>

    <script type="text/javascript">

        $(".js_delete").on("click",function () {
            $(".js_delete_form").attr("action","pages/" + $(this).data("id")).submit();
        })

        $( ".sortables" ).sortable({
            revert: true,
            handle: ".list_item",
            stop: function (event, ui) {
                let data = $(this).sortable('toArray', {attribute: 'data-content'});
                $.ajax({
                    type:"post",
                    method:"post",
                    data: {
                        data : data,
                    },
                    url: "{!!route('pageSortable')!!}",
                    success: function (res) {

                        if(res.type == "success"){

                            toastr.success(
                                res.message,
                                res.head,
                                {progressBar:!0}
                            )

                        }else {

                            toastr.warning(
                                res.message,
                                res.head,
                                {progressBar:!0}
                            )

                        }
                    }
                });

            }
        });

        $('.sortables').disableSelection();

        $(document).on("click",".js-hidden",function (){
            item = $(this);
            $.ajax({
                type:"post",
                method:"post",
                data: {
                    id : this.dataset.id,
                    hidden : this.dataset.hidden,
                },
                url: "{!!route('pageHidden')!!}",
                success: function (res) {
                    item.find("i").removeAttr("class").addClass("fa " + res.icon);
                }
            });
        });

    </script>
@endsection
