<section id="student" class="student-main-block top-40">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">Top Discounted Courses</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="#" class="btn btn-secondary" title="View More">View More<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="discounted-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach (topDiscountCourses() as $discount_course_key=>$discount_course)
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block-discount-{{ $discount_course_key }}{{ $discount_course->id }}">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="{{ route('course.single', $discount_course->slug) }}">
                                    <img data-src="{{ asset('public/admin/images/courses') }}/{{ $discount_course->thumbnail }}" alt="course"
                                            class="img-fluid owl-lazy">
                                </a>
                            </div>

                            <div class="badges bg-priamry offer-badge">
                                @if($discount_course->discount_type=='percent')
                                    @php
                                        $percentage = $discount_course->discount;
                                    @endphp
                                @else
                                    @php
                                        $percentage = $discount_course->discount/$discount_course->retail_price*100;
                                    @endphp
                                @endif
                                <span>OFF<span>{{ round($percentage) }}%</span></span>
                            </div>

                            <div class="advance-badge">
                                <span class="badge bg-info">On-sale</span>
                            </div>
                            <div class="view-user-img">
                                <a href="{{ route('user.profile', $discount_course->hasInstructor->slug) }}" title="">
                                    @if($discount_course->hasUserProfile)
                                        <img src="{{ asset('public/users') }}/{{ $discount_course->hasUserProfile->profile_image }}" width="50px"  class="img-fluid user-img-one" alt="">
                                    @else
                                        <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading">
                                    <a href="{{ route('course.single', $discount_course->slug) }}">{{ $discount_course->title }}</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="{{ route('user.profile', $discount_course->hasInstructor->slug) }}">{{ $discount_course->hasInstructor->name }}</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span
                                                        style="width:86.666666666667%"
                                                        class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="reviews">
                                            (1 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i>
                                                <span>0</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="rate text-right">
                                                <ul>
                                                    @if($discount_course->is_paid)
                                                        <li><a><b>${{ number_format($discount_course->price, 2) }}</b></a></li>
                                                        @if($discount_course->discount != NULL)
                                                            <li><a><b><strike>${{ number_format($discount_course->retail_price, 2) }}</strike></b></a></li>
                                                        @endif
                                                    @else
                                                        <li>FREE</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>
                                            <li class="protip-wish-btn">
                                                <a href="https://calendar.google.com/calendar/r/eventedit?text=Travel%20Hacking%20-Smart%20&amp;%20Fun%20Travel"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i>
                                                </a>
                                            </li>
                                            <li class="protip-wish-btn">
                                                <a href="login.html" title="heart"><i data-feather="heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-discount-{{ $discount_course_key }}{{ $discount_course->id }}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">{{ $discount_course->title }}</h5>
                                <div class="main-des">
                                    <p>Last Updated: {{ date('d F Y', strtotime($discount_course->updated_at)) }}</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes: {{ count($discount_course->haveClasses) }}
                                        </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                @php
                                                    $sum_minutes = 0;
                                                    foreach ($discount_course->haveClasses as $discount_course_class){
                                                        $explodedTime = array_map('intval', explode(':', $discount_course_class->lecture_duration ));
                                                        $sum_minutes += $explodedTime[0]*60+$explodedTime[1];
                                                    }
                                                    $lecture_duration_total_time = floor($sum_minutes/60).':'.floor($sum_minutes % 60);
                                                @endphp
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                    {{ $lecture_duration_total_time }}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des"></div>
                                    </li>
                                </ul>

                                <div class="product-main-des">
                                    <p>{{ $discount_course->short_description }}</p>
                                </div>
                                <div>
                                    @if(!empty($discount_course->haveWhatLearns))
                                        @foreach ($discount_course->haveWhatLearns as $learn)
                                            <div class="product-learn-dtl">
                                                <ul>
                                                    <li>
                                                        <i data-feather="check-circle"></i>{{ $learn->detail }}.
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form id="demo-form2" method="post"
                                                action="https://eclass.mediacity.co.in/demo/public/guest/addtocart/21" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                <input type="hidden" name="_token" value="leZ79T21enQSxfzfbeOTzvgubGXd6jlVMG4Ztrf9">

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;Add To Cart</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="img-wishlist">
                                                <div class="protip-wishlist">
                                                    <ul>
                                                        <li class="protip-wish-btn">
                                                            <a href="login.html" title="heart"><i data-feather="heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
