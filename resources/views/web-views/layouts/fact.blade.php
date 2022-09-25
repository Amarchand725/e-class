<section id="facts" class="fact-main-block">
    <div class="container-xl">
        <div class="row">
            @foreach (facts() as $fact)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="facts-block text-center">
                        <div class="facts-block-one">
                            <div class="facts-block-img">
                                <img src="{{ asset('public/admin/images/facts') }}/{{ $fact->image }}" class="img-fluid" alt="" />
                                <div class="facts-count">{{ $fact->counter }}</div>
                            </div>
                            <h5 class="facts-title"><a href="#" title="">{{ $fact->title }}</a></h5>
                            <p>{{ $fact->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
