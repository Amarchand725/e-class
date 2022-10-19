@foreach ($childs as $child)
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingelevenxxx">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeleven-{{ $child->slug }}" aria-expanded="false" aria-controls="collapseelevenxxx">
                    {!! $child->icon !!}
                    <label class="sub-cate" data-url="">{{ $child->name }}</label>
                    @if(count($child->haveChildren))
                        <i class="fa fa-chevron-down pull-right"></i>
                    @endif
                </a>
            </h4>
        </div>

        <div id="collapseeleven-{{ $child->slug }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingelevenxxx">
            <div class="panel-body sub-cat">
                @if(count($child->haveChildren))
                    @include('web-views.website.category.manage-child',['childs' => $child->haveChildren])
                @endif
            </div>
        </div>
    </div>
@endforeach