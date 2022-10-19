<ul>
    @foreach ($childs as $child)
        <li>
            <a href="{{ route('user.category-wise-course', $child->slug) }}" title="Web Devlopment">{!! $child->icon !!} {{ $child->name }}
                @if(count($child->haveChildren) > 0) <i data-feather="chevron-right" class="float-right"></i> @endif
            </a>
            @if(count($child->haveChildren))
                @include('web-views.layouts.manage-child-categories',['childs' => $child->haveChildren])
            @endif
        </li>
    @endforeach
</ul>
