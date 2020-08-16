
@foreach($tree as $t)
    <li id="item-{{$t->id}}" data-content="{{$t->id}}" class="px-0 col-12 d-block">
        <div class="list_item d-flex justify-content-between align-items-center">
            <span>{{$t->getFirstName->title}}</span>
            <span>
                <a href="tree/{{$t->id}}/edit/{{$t->page_id}}" class="btn btn-sm btn-raised btn-icon btn-secondary my-0 mr-1"> <i class="fa fa-pencil-square-o"></i> </a>
                <a href="" class="btn btn-raised btn-icon btn-vimeo my-0 mr-1 btn-sm"> <i class="fa fa-eye"></i> </a>
                <a href="javascript:void(0);" data-id="{{$t->id}}" class="btn btn-sm js_delete btn-raised btn-icon btn-danger my-0 mr-1"> <i class="fa fa-trash-o"></i> </a>
            </span>
        </div>

        @if(count($t->getSubControl)>0)
            <ul>
                @include("back.tree.subCategory",["tree" => $t->getSubCategories])
            </ul>
        @endif
    </li>
@endforeach
