<section id="categories" class="categories-main-block">
    <div class="container-xl">
        <h3 class="categories-heading">Featured Categories</h3>
        <div class="row">
            @foreach (mainCategories() as $category)
                <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                    <div class="cat-container btm-20 text-center">
                        <a href="browse/categorya943.html?id=2&amp;category=devlopment">
                            <div class="cat-img">
                                <img src="{{ asset('public/admin/images/categories') }}/{{ $category->thumbnail }}">
                            </div>
                            <div class="cat-dtl">
                                <div>
                                    <span>
                                        <h5 class="cat-name">{!! $category->icon !!} {{ $category->name }}</h5>
                                        <div class="cat-img-count">5 Courses</div>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>