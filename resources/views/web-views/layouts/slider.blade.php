<section id="home-background-slider" class="background-slider-block owl-carousel">
    @foreach (slider() as $key=>$slider)
        <div class="lazy item home-slider-img">
            <div id="home" class="home-main-block"
                style="background-image: url('public/admin/images/sliders/{{ $slider->image }}')">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="home-dtl">
                                <div class="home-heading">{{ $slider->title }}</div>
                                <p class="btm-10">{{ $slider->sub_title }}</p>
                                <p class="btm-20">{{ $slider->description }}</p>
                            </div>
                            @if($key==0)
                                <div class="home-search">
                                    <form method="GET" id="searchform" action="https://eclass.mediacity.co.in/demo/public/search">
                                        <div class="search">
                                            <input type="text" name="searchTerm" class="searchTerm"
                                                placeholder="Search Courses">
                                            <button type="submit" class="searchButton">Search
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <div id="home" class="home-main-block"
        style="background-image: url('public/website/images/slider/15974360873025.jpg')">
        <div class="container-xl">
            <div class="row">
                <div
                    class="col-lg-12 ">
                    <div class="home-dtl">
                        <div class="home-heading">Learn Smart Online</div>
                        <p class="btm-10">Become a better researcher</p>
                        <p class="btm-20">online classes
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="home" class="home-main-block"
        style="background-image: url('public/website/images/slider/15974361563617493.jpg')">
        <div class="container-xl">
            <div class="row">
                <div
                    class="col-lg-12 ">
                    <div class="home-dtl">
                        <div class="home-heading">Online Courses</div>
                        <p class="btm-10">Explore a variety of fresh topics</p>
                        <p class="btm-20">Search Online.. Explore Online
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section>
