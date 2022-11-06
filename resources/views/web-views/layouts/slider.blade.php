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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
