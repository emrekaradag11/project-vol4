@foreach($pages as $p)
    <li id="item-{{$p->id}}" data-content="{{$p->id}}" class="px-0 col-12 d-block">
        <div class="list_item d-flex justify-content-between align-items-center">
            <span>{{$p->getFirstName->title}} (Şablon {{$p->template}}) </span>
            <span>
                @if ($p->template == 1)
                    <a href="text/{{$p->id}}/edit" class="btn-sm btn btn-raised btn-icon btn-secondary my-0 mr-1"> <i class="fa fa-pencil-square-o"></i> </a>
                @elseif($p->template == 2)
                    <a href="tree/{{$p->id}}" class="btn-sm btn btn-raised btn-icon btn-secondary my-0 mr-1"> <i class="fa fa-pencil-square-o"></i> </a>
                @elseif($p->template == 3)
                    <a href="images/{{$p->id}}/edit" class="btn-sm btn btn-raised btn-icon btn-secondary my-0 mr-1"> <i class="fa fa-pencil-square-o"></i> </a>
                @else
                    <a href="#" class="btn-sm btn btn-raised btn-icon btn-secondary my-0 mr-1"> <i class="fa fa-pencil-square-o"></i> </a>
                @endif
                    <a href="pages/{{$p->id}}/edit" class="btn-sm btn btn-raised btn-icon btn-github my-0 mr-1"> <i class="fa fa-star"></i> </a>
                     <a href="" class="btn btn-sm btn-raised btn-icon btn-vimeo my-0 mr-1"> <i class="fa fa-eye"></i> </a>
                     <a href="javascript:void(0);" data-id="{{$p->id}}" class="btn btn-sm js_delete btn-raised btn-icon btn-danger my-0 mr-1"> <i class="fa fa-trash-o"></i> </a>
                </span>
        </div>
        @if(count($p->getSubControl)>0)
            <ul>
                @include("back/pages/subCategory",["pages" => $p->getSubCategories])
            </ul>
        @endif
    </li>
@endforeach
