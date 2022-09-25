<ul>
    @foreach ($childs as $child)
        <li>
            <a href="browse/subcategory9e1a.html?id=5&amp;category=Web%20Devlopment" title="Web Devlopment">{!! $child->icon !!} {{ $child->name }}
                @if(!empty($child->haveChildren)) <i data-feather="chevron-right" class="float-right"></i> @endif
            </a>
            @if(count($child->haveChildren))
                @include('web-views.layouts.manage-child-categories',['childs' => $child->haveChildren])
            @endif
        </li>
    @endforeach
    {{-- <li>
        <a href="browse/subcategory666d.html?id=6&amp;category=Programming%20Language" title="Programming Language"><i class="fa fa-language rgt-20"></i>Programming Language
        <i data-feather="chevron-right" class="float-right"></i></a>
        <ul>
            <li>
            <a href="browse/childcategory916c.html?id=6&amp;category=JavaScript" title="JavaScript"><i class="fa fa-commenting-o rgt-20"></i>JavaScript</a>
            </li>
            <li>
                <a href="browse/childcategory45ec.html?id=7&amp;category=C%2B%2B" title="C++"><i class="fa fa-object-ungroup rgt-20"></i>C++</a>
            </li>
        </ul>
    </li>
    <li><a href="browse/subcategoryc48b.html?id=7&amp;category=Databases" title="Databases"><i class="fa fa-database rgt-20"></i>Databases
        <i data-feather="chevron-right" class="float-right"></i></a>
        <ul>
            <li>
                <a href="browse/childcategory7c9b.html?id=8&amp;category=MySql" title="MySql"><i class="fa fa-square-o rgt-20"></i>MySql</a>
            </li>
            <li>
                <a href="browse/childcategory950e.html?id=9&amp;category=Oracle%20SQL" title="Oracle SQL"><i class="fa fa-database rgt-20"></i>Oracle SQL</a>
            </li>
        </ul>
    </li> --}}
</ul>
