<section id="student" class="student-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-7">
                    <h4 class="student-heading">Featured Courses</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-5">
                    <div class="view-button txt-rgt">
                        <a href="featuredcourse/view.html" class="btn btn-secondary" title="View More">View More<i data-feather="chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div id="student-view-slider" class="student-view-slider-main-block owl-carousel">
                @foreach (featuredCourses() as $course)
                    <div class="item student-view-block student-view-block-1">
                        <div class="genre-slide-image  protip "
                            data-pt-placement="outside" data-pt-interactive="false"
                            data-pt-title="#prime-next-item-description-block{{ $course->id }}">
                            <div class="view-block">
                                <div class="view-img">
                                    <a href="course/21/travel-hacking-smart-fun-travel-copy-166373019920.html">
                                        <img data-src="{{ asset('public/admin/images/courses') }}/{{ $course->thumbnail }}" alt="course"
                                                class="img-fluid owl-lazy">
                                    </a>
                                </div>

                                @if($course->sale_price != NULL)
                                    <div class="badges bg-priamry offer-badge">
                                        @php $percentage = $course->sale_price/$course->price*100; @endphp
                                        <span>OFF<span>{{ (int)$percentage }}%</span></span>
                                    </div>
                                @endif

                                <div class="advance-badge">
                                    @if($course->sale_price != NULL)
                                        <span class="badge bg-info">On-sale</span>
                                    @elseif($course->is_featured)
                                        <span class="badge bg-primary">Featured</span>
                                    @elseif($course->is_featured)
                                        <span class="badge bg-warning">Trending</span>
                                    @endif
                                </div>
                                <div class="view-user-img">
                                    <a href="#" title="">
                                        @if($course->hasUserProfile)
                                            <img src="{{ asset('public/users') }}/{{ $course->hasUserProfile->profile_image }}" width="50px"  class="img-fluid user-img-one" alt="">
                                        @else
                                            <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="view-dtl">
                                    <div class="view-heading">
                                        <a href="#">{{ $course->title }}</a>
                                    </div>
                                    <div class="user-name">
                                        <h6>By <span><a href="#">{{ $course->hasCreatedBy->roles->first()->name }}</a></span></h6>
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
                                            <!-- overall rating-->

                                                                                                                    <!-- <li>
                                                    <b>4</b>
                                                </li> -->
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
                                                        <li><a><b>${{ number_format($course->sale_price, 2) }}</b></a></li>
                                                        <li><a><b><strike>${{ number_format($course->price, 2) }}</strike></b></a></li>
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
                        <div id="prime-next-item-description-block{{ $course->id }}" class="prime-description-block">
                            <div class="prime-description-under-block">
                                <div class="prime-description-under-block">
                                    <h5 class="description-heading">{{ $course->title }}</h5>
                                    <div class="main-des">
                                        <p>Last Updated: {{ date('d F Y', strtotime($course->updated_at)) }}</p>
                                    </div>

                                    <ul class="description-list">
                                        <li>
                                            <i data-feather="play-circle"></i>
                                            <div class="class-des">
                                                Classes: 10
                                            </div>
                                        </li>
                                        &nbsp;
                                        <li>
                                            <div>
                                                <div class="time-des">
                                                    <span class="">
                                                        <i data-feather="clock"></i>
                                                        19 Minutes
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="lang-des"></div>
                                        </li>
                                    </ul>

                                    <div class="product-main-des">
                                        <p>{{ $course->short_description }}</p>
                                    </div>
                                    <div>
                                        @if(!empty($course->haveWhatLearns))
                                            @foreach ($course->haveWhatLearns as $learn)
                                                <div class="product-learn-dtl">
                                                    <ul>
                                                        <li>
                                                            <i data-feather="check-circle"></i>{{ $learn->title }}.
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

                {{-- <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block19">
                        <div class="view-block">
                            <div class="view-img">
                                                            <a href="course/19/the-nail-art-tutorial-modern-nail-designs.html"><img
                                        data-src="https://eclass.mediacity.co.in/demo/public/images/course/nails-design-hands-with-bright-yellow-manicure-background-close-up-female-hands-art-nail-tiger-manicure_288539-61.jpg" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                                        </div>
                            <div class="badges bg-priamry offer-badge"><span>OFF<span>60%</span></span></div>


                            <div class="advance-badge">
                                <span class="badge bg-info">Onsale</span>
                            </div>
                                                                                                                            <div class="view-user-img">

                                                            <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                        class="img-fluid user-img-one" alt=""></a>


                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="course/19/the-nail-art-tutorial-modern-nail-designs.html">The Nail Art Tutorial - Modern...</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                                                                                                            <div class="pull-left">No Rating</div>
                                                                                </li>
                                        <!-- overall rating-->

                                                                                                                <li class="reviews">
                                            (0 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    1</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                    <div class="rate text-right">
                                                <ul>


                                                    <li><a><b>400.00₹</b></a>
                                                    </li>

                                                    <li><a><b><strike>1000.00₹</strike></b></a>
                                                    </li>


                                                                                                </ul>
                                            </div>
                                                                                </div>
                                    </div>
                                </div>



                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>

                                            <li class="protip-wish-btn"><a
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=The%20Nail%20Art%20Tutorial%20-%20Modern%20Nail%20Designs"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                    <li class="protip-wish-btn"><a href="login.html" title="heart"><i
                                                        data-feather="heart"></i></a></li>
                                                                                </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block19" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">The Nail Art Tutorial - Modern Nail Designs</h5>
                                <div class="main-des">
                                    <p>Last Updated: 28th June 2022</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes:
                                            2                                    </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                                                                    11 Minutes
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                                                                                                            <i data-feather="globe"></i> English
                                                                                                                        </div>
                                    </li>

                                </ul>

                                <div class="product-main-des">
                                    <p>Learn by creating amazing nail designs, create gorgeous GEL manicures and start your own nail business from home.</p>
                                </div>
                                <div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>You&#039;ll be able to draw onto your clients nails some sophisticated
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>You&#039;ll have a different perspective about designing nails
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Practice to be able to reach
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                                                                                                                                                    <form id="demo-form2" method="post"
                                                action="https://eclass.mediacity.co.in/demo/public/guest/addtocart/19" data-parsley-validate
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
                                                                                                            <li class="protip-wish-btn"><a href="login.html"
                                                                title="heart"><i data-feather="heart"></i></a></li>
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

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block18">
                        <div class="view-block">
                            <div class="view-img">
                                                            <a href="course/18/hair-styling-the-ultimate-hair-course.html"><img
                                        data-src="https://eclass.mediacity.co.in/demo/public/images/course/hair.jpg" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                                        </div>
                            <div class="badges bg-priamry offer-badge"><span>OFF<span>58%</span></span></div>

                                                                                                                                                                                                    <div class="view-user-img">

                                                            <a href="all/profile/2.html" title=""><img src="{{ asset('public/website') }}/images/user_img/159116551043.jpg"
                                        class="img-fluid user-img-one" alt=""></a>


                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="course/18/hair-styling-the-ultimate-hair-course.html">Hair styling- The Ultimate Hai...</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="all/profile/2.html"> Instructor</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                                                                                                            <div class="pull-left">No Rating</div>
                                                                                </li>
                                        <!-- overall rating-->

                                                                                                                <li class="reviews">
                                            (0 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    0</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                    <div class="rate text-right">
                                                <ul>


                                                    <li><a><b>500.00₹</b></a>
                                                    </li>

                                                    <li><a><b><strike>1200.00₹</strike></b></a>
                                                    </li>


                                                                                                </ul>
                                            </div>
                                                                                </div>
                                    </div>
                                </div>



                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>

                                            <li class="protip-wish-btn"><a
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=Hair%20styling-%20The%20Ultimate%20Hair%20Course"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                    <li class="protip-wish-btn"><a href="login.html" title="heart"><i
                                                        data-feather="heart"></i></a></li>
                                                                                </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block18" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Hair styling- The Ultimate Hair Course</h5>
                                <div class="main-des">
                                    <p>Last Updated: 18th July 2022</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes:
                                            4                                    </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                                                                    25 Minutes
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                                                                                                            <i data-feather="globe"></i> English
                                                                                                                        </div>
                                    </li>

                                </ul>

                                <div class="product-main-des">
                                    <p>You won&#039;t visit a hairdresser again! Cut, dye  and style your hair yourself at home.</p>
                                </div>
                                <div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Curl your hair
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Straighten your hai
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Cut your own hair
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Dye your own hair naturally at hom
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                                                                                                                                                    <form id="demo-form2" method="post"
                                                action="https://eclass.mediacity.co.in/demo/public/guest/addtocart/18" data-parsley-validate
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
                                                                                                            <li class="protip-wish-btn"><a href="login.html"
                                                                title="heart"><i data-feather="heart"></i></a></li>
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

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block17">
                        <div class="view-block">
                            <div class="view-img">
                                                            <a href="course/17/how-to-paint-portrait-painting-from-photograph.html"><img
                                        data-src="https://eclass.mediacity.co.in/demo/public/images/course/157976358156.jpg" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                                        </div>
                            <div class="badges bg-priamry offer-badge"><span>OFF<span>42%</span></span></div>

                                                                                                                                                                                                    <div class="view-user-img">

                                                            <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                        class="img-fluid user-img-one" alt=""></a>


                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="course/17/how-to-paint-portrait-painting-from-photograph.html">HOW TO PAINT- Portrait Paintin...</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                                                                                                            <div class="pull-left">No Rating</div>
                                                                                </li>
                                        <!-- overall rating-->

                                                                                                                <li class="reviews">
                                            (0 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    1</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                    <div class="rate text-right">
                                                <ul>
                                                    <li><a><b>Free</b></a></li>
                                                </ul>
                                            </div>
                                                                                </div>
                                    </div>
                                </div>



                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>

                                            <li class="protip-wish-btn"><a
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=HOW%20TO%20PAINT-%20Portrait%20Painting%20From%20Photograph"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                    <li class="protip-wish-btn"><a href="login.html" title="heart"><i
                                                        data-feather="heart"></i></a></li>
                                                                                </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block17" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">HOW TO PAINT- Portrait Painting From Photograph</h5>
                                <div class="main-des">
                                    <p>Last Updated: 23rd April 2020</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes:
                                            4                                    </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                                                                    26 Minutes
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                                                                                                            <i data-feather="globe"></i> English
                                                                                                                        </div>
                                    </li>

                                </ul>

                                <div class="product-main-des">
                                    <p>Learn How to Draw and Paint Colorful and Vibrant Portrait Paintings in Watercolor</p>
                                </div>
                                <div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>By the end of the class you’ll paint a portrait in full color.
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>The best way to light and photograph, portrait (or any other subject) for a painting.
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>You’ll Learn the difference between chroma, color and values and how to control them.
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>An easy system to drawing anything you want!
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                                                                                                            <div class="protip-btn">
                                                <a href="login.html" class="btn btn-primary"
                                                    title="Enroll Now"><i data-feather="shopping-cart"></i>Enroll Now</a>
                                            </div>
                                                                                                                        </div>
                                        <div class="col-lg-4">
                                            <div class="img-wishlist">
                                                <div class="protip-wishlist">
                                                    <ul>
                                                                                                            <li class="protip-wish-btn"><a href="login.html"
                                                                title="heart"><i data-feather="heart"></i></a></li>
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

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block16">
                        <div class="view-block">
                            <div class="view-img">
                                                            <a href="course/16/art-science-of-drawing-ultimate-drawing-course.html"><img
                                        data-src="https://eclass.mediacity.co.in/demo/public/images/course/157976281055.jpg" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                                        </div>
                            <div class="badges bg-priamry offer-badge"><span>OFF<span>40%</span></span></div>

                                                                                                                                                                                                    <div class="view-user-img">

                                                            <a href="all/profile/2.html" title=""><img src="{{ asset('public/website') }}/images/user_img/159116551043.jpg"
                                        class="img-fluid user-img-one" alt=""></a>


                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="course/16/art-science-of-drawing-ultimate-drawing-course.html">Art &amp; Science of Drawing-  Ult...</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="all/profile/2.html"> Instructor</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                                                                                                            <div class="pull-left">No Rating</div>
                                                                                </li>
                                        <!-- overall rating-->

                                                                                                                <li class="reviews">
                                            (0 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    0</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                    <div class="rate text-right">
                                                <ul>


                                                    <li><a><b>600.00₹</b></a>
                                                    </li>

                                                    <li><a><b><strike>1000.00₹</strike></b></a>
                                                    </li>


                                                                                                </ul>
                                            </div>
                                                                                </div>
                                    </div>
                                </div>



                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>

                                            <li class="protip-wish-btn"><a
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=Art%20&amp;%20Science%20of%20Drawing-%20%20Ultimate%20Drawing%20Course"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                    <li class="protip-wish-btn"><a href="login.html" title="heart"><i
                                                        data-feather="heart"></i></a></li>
                                                                                </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block16" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Art &amp; Science of Drawing-  Ultimate Drawing Course</h5>
                                <div class="main-des">
                                    <p>Last Updated: 18th July 2022</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes:
                                            6                                    </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                                                                    21 Minutes
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                                                                                                            <i data-feather="globe"></i> English
                                                                                                                        </div>
                                    </li>

                                </ul>

                                <div class="product-main-des">
                                    <p>A comprehensive video and ebook course designed for people wanting to learn the core concepts of drawing.</p>
                                </div>
                                <div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Draw the human face
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Draw perspective drawings
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Drawing Fundamentals
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Character design
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>How to create concept art
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                                                                                                                                                    <form id="demo-form2" method="post"
                                                action="https://eclass.mediacity.co.in/demo/public/guest/addtocart/16" data-parsley-validate
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
                                                                                                            <li class="protip-wish-btn"><a href="login.html"
                                                                title="heart"><i data-feather="heart"></i></a></li>
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

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block15">
                        <div class="view-block">
                            <div class="view-img">
                                                            <a href="course/15/guitar-system-ultimate-masterclass.html"><img
                                        data-src="https://eclass.mediacity.co.in/demo/public/images/course/157976197516.jpg" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                                        </div>
                            <div class="badges bg-priamry offer-badge"><span>OFF<span>50%</span></span></div>

                                                                                                                                                                                                    <div class="view-user-img">

                                                            <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                        class="img-fluid user-img-one" alt=""></a>


                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="course/15/guitar-system-ultimate-masterclass.html">Guitar System - Ultimate Maste...</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                                                                                                            <div class="pull-left">No Rating</div>
                                                                                </li>
                                        <!-- overall rating-->

                                                                                                                <li class="reviews">
                                            (0 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    0</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                    <div class="rate text-right">
                                                <ul>


                                                    <li><a><b>400.00₹</b></a>
                                                    </li>

                                                    <li><a><b><strike>800.00₹</strike></b></a>
                                                    </li>


                                                                                                </ul>
                                            </div>
                                                                                </div>
                                    </div>
                                </div>



                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>

                                            <li class="protip-wish-btn"><a
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=Guitar%20System%20-%20Ultimate%20Masterclass"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                    <li class="protip-wish-btn"><a href="login.html" title="heart"><i
                                                        data-feather="heart"></i></a></li>
                                                                                </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block15" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Guitar System - Ultimate Masterclass</h5>
                                <div class="main-des">
                                    <p>Last Updated: 23rd April 2020</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes:
                                            4                                    </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                                                                    24 Minutes
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                                                                                                            <i data-feather="globe"></i> English
                                                                                                                        </div>
                                    </li>

                                </ul>

                                <div class="product-main-des">
                                    <p>Beginner guitar lessons. Go from knowing nothing about the guitar and learn to play songs everbody loves in just weeks</p>
                                </div>
                                <div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Spend less time fighting with the DAW and more time focusing on the music.
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Discover the quickest and easiest ways to write music in Logic Pro.
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Professional by following my step-by-step mixing system using stock plugins.
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                                                                                                                                                    <form id="demo-form2" method="post"
                                                action="https://eclass.mediacity.co.in/demo/public/guest/addtocart/15" data-parsley-validate
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
                                                                                                            <li class="protip-wish-btn"><a href="login.html"
                                                                title="heart"><i data-feather="heart"></i></a></li>
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

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block13">
                        <div class="view-block">
                            <div class="view-img">
                                                            <a href="course/13/the-complete-oracle-sql-become-sql-developer-from-scratch.html"><img
                                        data-src="https://eclass.mediacity.co.in/demo/public/images/course/sql.jpg" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                                        </div>
                            <div class="badges bg-priamry offer-badge"><span>OFF<span>-3%</span></span></div>

                                                    <div class="advance-badge">
                                <span class="badge bg-warning">Trending</span>
                            </div>
                                                                                                                                                                                                    <div class="view-user-img">

                                                            <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                        class="img-fluid user-img-one" alt=""></a>


                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="course/13/the-complete-oracle-sql-become-sql-developer-from-scratch.html">The Complete Oracle SQL : Beco...</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                                                                                                            <div class="pull-left">No Rating</div>
                                                                                </li>
                                        <!-- overall rating-->

                                                                                                                <li class="reviews">
                                            (0 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    1</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                    <div class="rate text-right">
                                                <ul>
                                                    <li><a><b>Free</b></a></li>
                                                </ul>
                                            </div>
                                                                                </div>
                                    </div>
                                </div>



                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>

                                            <li class="protip-wish-btn"><a
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=The%20Complete%20Oracle%20SQL%20:%20Become%20SQL%20Developer%20From%20Scratch!"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                    <li class="protip-wish-btn"><a href="login.html" title="heart"><i
                                                        data-feather="heart"></i></a></li>
                                                                                </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block13" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">The Complete Oracle SQL : Become SQL Developer From Scratch!</h5>
                                <div class="main-des">
                                    <p>Last Updated: 30th August 2022</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes:
                                            4                                    </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                                                                    33 Minutes
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                                                                                                            <i data-feather="globe"></i> English
                                                                                                                        </div>
                                    </li>

                                </ul>

                                <div class="product-main-des">
                                    <p>Become Job Ready to Start Contributing as a Database Developer Day 1</p>
                                </div>
                                <div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Have the Ability to Solve any SQL Problem
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Allow your clients to update their websites by themselves by creating user accounts
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Data has become the hottest topic in technology
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                                                                                                            <div class="protip-btn">
                                                <a href="login.html" class="btn btn-primary"
                                                    title="Enroll Now"><i data-feather="shopping-cart"></i>Enroll Now</a>
                                            </div>
                                                                                                                        </div>
                                        <div class="col-lg-4">
                                            <div class="img-wishlist">
                                                <div class="protip-wishlist">
                                                    <ul>
                                                                                                            <li class="protip-wish-btn"><a href="login.html"
                                                                title="heart"><i data-feather="heart"></i></a></li>
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

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block12">
                        <div class="view-block">
                            <div class="view-img">
                                                            <a href="course/12/sql-learn-sql-for-data-analysis.html"><img
                                        data-src="https://eclass.mediacity.co.in/demo/public/images/course/oracle.jpg" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                                        </div>
                            <div class="badges bg-priamry offer-badge"><span>OFF<span>50%</span></span></div>

                                                                                                                                                                                                    <div class="view-user-img">

                                                            <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                        class="img-fluid user-img-one" alt=""></a>


                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="course/12/sql-learn-sql-for-data-analysis.html">SQL: Learn SQL for data analys...</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                                                                                                            <div class="pull-left">No Rating</div>
                                                                                </li>
                                        <!-- overall rating-->

                                                                                                                <li class="reviews">
                                            (0 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    1</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                    <div class="rate text-right">
                                                <ul>


                                                    <li><a><b>500.00₹</b></a>
                                                    </li>

                                                    <li><a><b><strike>1000.00₹</strike></b></a>
                                                    </li>


                                                                                                </ul>
                                            </div>
                                                                                </div>
                                    </div>
                                </div>



                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>

                                            <li class="protip-wish-btn"><a
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=SQL:%20Learn%20SQL%20for%20data%20analysis"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                    <li class="protip-wish-btn"><a href="login.html" title="heart"><i
                                                        data-feather="heart"></i></a></li>
                                                                                </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block12" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">SQL: Learn SQL for data analysis</h5>
                                <div class="main-des">
                                    <p>Last Updated: 23rd April 2020</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes:
                                            3                                    </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                                                                    26 Minutes
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                                                                                                            <i data-feather="globe"></i> English
                                                                                                                        </div>
                                    </li>

                                </ul>

                                <div class="product-main-des">
                                    <p>Step by Step SQL with MySQL Database for Beginners, Non-Techs, newbs - Quick way to learn SQL using MySQL Database</p>
                                </div>
                                <div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Be comfortable putting SQL and PostgreSQL on their resume
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Use SQL to perform data analysis
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Be confident while working with constraints and relating data tables
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Tons of exercises that will solidify your knowledge
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                                                                                                                                                    <form id="demo-form2" method="post"
                                                action="https://eclass.mediacity.co.in/demo/public/guest/addtocart/12" data-parsley-validate
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
                                                                                                            <li class="protip-wish-btn"><a href="login.html"
                                                                title="heart"><i data-feather="heart"></i></a></li>
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

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block11">
                        <div class="view-block">
                            <div class="view-img">
                                                            <a href="course/11/learn-c-programming.html"><img
                                        data-src="https://eclass.mediacity.co.in/demo/public/images/course/app-development-concept-with-programming-languages_23-2148688949.jpg" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                                        </div>
                            <div class="badges bg-priamry offer-badge"><span>OFF<span>7%</span></span></div>

                                                                                                                                                                                                    <div class="view-user-img">

                                                            <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                        class="img-fluid user-img-one" alt=""></a>


                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="course/11/learn-c-programming.html">Learn C++ Programming</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                                                                                                            <div class="pull-left">No Rating</div>
                                                                                </li>
                                        <!-- overall rating-->

                                                                                                                <li class="reviews">
                                            (0 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    0</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                    <div class="rate text-right">
                                                <ul>
                                                    <li><a><b>Free</b></a></li>
                                                </ul>
                                            </div>
                                                                                </div>
                                    </div>
                                </div>



                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>

                                            <li class="protip-wish-btn"><a
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=Learn%20C++%20Programming"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                    <li class="protip-wish-btn"><a href="login.html" title="heart"><i
                                                        data-feather="heart"></i></a></li>
                                                                                </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block11" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Learn C++ Programming</h5>
                                <div class="main-des">
                                    <p>Last Updated: 22nd November 2021</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes:
                                            4                                    </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                                                                    25 Minutes
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                                                                                                            <i data-feather="globe"></i> English
                                                                                                                        </div>
                                    </li>

                                </ul>

                                <div class="product-main-des">
                                    <p>Discover intermediate to advanced C++, including C++ 11&#039;s fantastic additions to the C++ standard.</p>
                                </div>
                                <div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Be in a position to apply for jobs requiring good C++ knowledge
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Learn How to Develop an Application
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>And of Course Create your First Program in C++ with the Easiest way Possible
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Find out if you are interested in C++ Language
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                                                                                                            <div class="protip-btn">
                                                <a href="login.html" class="btn btn-primary"
                                                    title="Enroll Now"><i data-feather="shopping-cart"></i>Enroll Now</a>
                                            </div>
                                                                                                                        </div>
                                        <div class="col-lg-4">
                                            <div class="img-wishlist">
                                                <div class="protip-wishlist">
                                                    <ul>
                                                                                                            <li class="protip-wish-btn"><a href="login.html"
                                                                title="heart"><i data-feather="heart"></i></a></li>
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

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block10">
                        <div class="view-block">
                            <div class="view-img">
                                                            <a href="course/10/the-mordern-javascript-the-complete-guide.html"><img
                                        data-src="https://eclass.mediacity.co.in/demo/public/images/course/157976014948.jpg" alt="course"
                                        class="img-fluid owl-lazy"></a>
                                                        </div>
                            <div class="badges bg-priamry offer-badge"><span>OFF<span>20%</span></span></div>

                                                    <div class="advance-badge">
                                <span class="badge bg-warning">Trending</span>
                            </div>
                                                                                                                                                                                                    <div class="view-user-img">

                                                            <a href="all/profile/2.html" title=""><img src="{{ asset('public/website') }}/images/user_img/159116551043.jpg"
                                        class="img-fluid user-img-one" alt=""></a>


                            </div>

                            <div class="view-dtl">
                                <div class="view-heading"><a
                                        href="course/10/the-mordern-javascript-the-complete-guide.html">The Mordern JavaScript - The C...</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="all/profile/2.html"> Instructor</a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                                                                                                            <div class="pull-left">No Rating</div>
                                                                                </li>
                                        <!-- overall rating-->

                                                                                                                <li class="reviews">
                                            (0 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i><span>
                                                    0</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                    <div class="rate text-right">
                                                <ul>


                                                    <li><a><b>800.00₹</b></a>
                                                    </li>

                                                    <li><a><b><strike>1000.00₹</strike></b></a>
                                                    </li>


                                                                                                </ul>
                                            </div>
                                                                                </div>
                                    </div>
                                </div>



                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>

                                            <li class="protip-wish-btn"><a
                                                    href="https://calendar.google.com/calendar/r/eventedit?text=The%20Mordern%20JavaScript%20-%20The%20Complete%20Guide"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                    <li class="protip-wish-btn"><a href="login.html" title="heart"><i
                                                        data-feather="heart"></i></a></li>
                                                                                </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block10" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">The Mordern JavaScript - The Complete Guide</h5>
                                <div class="main-des">
                                    <p>Last Updated: 18th July 2022</p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes:
                                            5                                    </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                                                                    22 Minutes
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des">
                                                                                                                            <i data-feather="globe"></i> English
                                                                                                                        </div>
                                    </li>

                                </ul>

                                <div class="product-main-des">
                                    <p>Modern JavaScript from the beginning - all the way up to JS expert level! THE must-have JavaScript resource in 2020.</p>
                                </div>
                                <div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Get friendly and fast support in the course Q&amp;A
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>What&#039;s new in ES6: arrow functions, classes, default and rest parameters, etc.
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Organize and structure your code using JavaScript patterns like modules
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i
                                                    data-feather="check-circle"></i>Get friendly and fast support in the course Q&amp;A
                                            </li>
                                        </ul>
                                    </div>
                                                                                                                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                                                                                                                                                    <form id="demo-form2" method="post"
                                                action="https://eclass.mediacity.co.in/demo/public/guest/addtocart/10" data-parsley-validate
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
                                                                                                            <li class="protip-wish-btn"><a href="login.html"
                                                                title="heart"><i data-feather="heart"></i></a></li>
                                                                                                        </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>
