@foreach ($childs as $child)
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingelevenxxx">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeleven-{{ $child->slug }}" aria-expanded="false" aria-controls="collapseelevenxxx">
                        {!! $category->icon !!} 
                        <label class="sub-cate" data-url="{{ route('user.category-wise-course', $child->slug) }}">{{ $child->name }}</label>
                    </a>
                </h4>
            </div>
           
            <div id="collapseeleven-{{ $child->slug }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingelevenxxx">
                {{-- <div class="panel-body sub-cat">
                    <i class="fa fa-language rgt-10"></i> 
                    <label class="child-cate" data-url="">All Web Devlopment </label>
                </div> --}}
                @if(count($child->haveChildren))
                    @include('web-views.website.category.manage-child',['childs' => $child->haveChildren])
                @endif
            </div>
        </div>
    </div>
@endforeach