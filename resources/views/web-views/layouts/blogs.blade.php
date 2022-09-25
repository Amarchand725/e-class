<section id="student" class="student-main-block">
    <div class="container-xl">
        <h4 class="student-heading">Recent Blogs</h4>
        <div id="blog-post-slider" class="student-view-slider-main-block owl-carousel">
            @foreach (latestBlogs() as $blog)
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block-{{ $blog->id }}">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="#">
                                    @if($blog->extension=='jpg' || $blog->extension=='png' || $blog->extension=='jpeg')
                                        <img data-src="{{ asset('public/admin/images/blogs') }}/{{ $blog->attachment }}" alt="blog" class="img-fluid owl-lazy">
                                    @else
                                        <img style="border-radius: 50%;" src="{{ asset('public/default.png') }}" width="50  px" height="50px" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="view-user-img">
                                <a href="" title="">
                                    @if($blog->hasCreatedBy->hasUserProfile)
                                        <img src="{{ asset('public/users') }}/{{ $blog->hasCreatedBy->hasUserProfile->profile_image }}" width="50px"  class="img-fluid user-img-one" alt="">
                                    @else
                                        <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="tooltip">
                                <div class="tooltip-icon">
                                    <i data-feather="share-2"></i>
                                </div>
                                <span class="tooltiptext">
                                    <div class="instructor-home-social-icon">
                                        <ul>
                                            <li><a href="https://facebook.com/"><i data-feather="facebook"></i></a></li>
                                            <li><a href="#"><i data-feather="twitter"></i></a></li>
                                            <li><a href="https://www.youtube.com/watch?v=2cbvZf1jIJM"><i data-feather="youtube"></i></a></li>
                                            <li><a href="https://www.youtube.com/watch?v=ImtZ5yENzgE"><i data-feather="linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </span>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading">
                                    <a href="">
                                        {{ $blog->title }}
                                    </a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="#">{{ $blog->hasCreatedBy->roles->first()->name }}</a></span></h6>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-date">
                                                <a href="#">
                                                    <i data-feather="calendar"></i>
                                                    {{ date('d-m-Y', strtotime($blog->created_at)) }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-time">
                                                <a href="#">
                                                    <i data-feather="clock"></i>
                                                    {{ date('H:i:s A', strtotime($blog->created_at)) }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-{{ $blog->id }}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">{{ $blog->title }}</h5>
                                <div class="row btm-20">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i> {{ date('d-m-Y', strtotime($blog->created_at)) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i> 12{{ date('H:is A', strtotime($blog->created_at)) }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-des">
                                    <p style="text-align: justify !important">{!! $blog->description !!}</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

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
                    data-pt-title="#prime-next-item-description-block-82">
                    <div class="view-block">
                        <div class="view-img">
                                                                                    <a href="detail/blog/2/blogging-content-writing-masterclass.html">

                                    <img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978018683.jpg" alt="course"
                                        class="img-fluid owl-lazy">
                                </a>
                                                        </div>
                        <div class="view-user-img">

                                                        <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                    class="img-fluid user-img-one" alt=""></a>


                        </div>
                        <div class="tooltip">
                            <div class="tooltip-icon">
                                <i data-feather="share-2"></i>
                            </div>
                            <span class="tooltiptext">
                                <div class="instructor-home-social-icon">
                                    <ul>
                                        <li><a href="https://facebook.com/"><i data-feather="facebook"></i></a></li>
                                        <li><a href="#"><i data-feather="twitter"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=2cbvZf1jIJM"><i data-feather="youtube"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=ImtZ5yENzgE"><i data-feather="linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading">
                                                                <a href="detail/blog/2/blogging-content-writing-masterclass.html">
                                    Blogging &amp; Content Writin...
                                                                        </a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                            </div>
                            <div class="view-footer">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                23-01-2020</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                12:41:34 PM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-82" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">Blogging &amp; Content Writing Masterclass</h5>
                            <div class="row btm-20">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-date">
                                        <a href="#"><i data-feather="calendar"></i> 01-01-1970</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-time">
                                        <a href="#"><i data-feather="clock"></i> 12:00:00 AM</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-des">
                                <p>Lorem Ipsumis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s wi
                                </p>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">

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
                    data-pt-title="#prime-next-item-description-block-83">
                    <div class="view-block">
                        <div class="view-img">
                                                                                    <a href="detail/blog/3/blogging-masterclass.html">

                                    <img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978055225.jpg" alt="course"
                                        class="img-fluid owl-lazy">
                                </a>
                                                        </div>
                        <div class="view-user-img">

                                                        <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                    class="img-fluid user-img-one" alt=""></a>


                        </div>
                        <div class="tooltip">
                            <div class="tooltip-icon">
                                <i data-feather="share-2"></i>
                            </div>
                            <span class="tooltiptext">
                                <div class="instructor-home-social-icon">
                                    <ul>
                                        <li><a href="https://facebook.com/"><i data-feather="facebook"></i></a></li>
                                        <li><a href="#"><i data-feather="twitter"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=2cbvZf1jIJM"><i data-feather="youtube"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=ImtZ5yENzgE"><i data-feather="linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading">
                                                                <a href="detail/blog/3/blogging-masterclass.html">
                                    Blogging Masterclass
                                                                        </a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                            </div>
                            <div class="view-footer">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                23-01-2020</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                12:55:27 PM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-83" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">Blogging Masterclass</h5>
                            <div class="row btm-20">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-date">
                                        <a href="#"><i data-feather="calendar"></i> 01-01-1970</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-time">
                                        <a href="#"><i data-feather="clock"></i> 12:00:00 AM</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-des">
                                <p>Lorem Ipsum&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 19
                                </p>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">

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
                    data-pt-title="#prime-next-item-description-block-85">
                    <div class="view-block">
                        <div class="view-img">
                                                                                    <a href="detail/blog/5/build-a-successful-creative-blog.html">

                                    <img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978167090.jpg" alt="course"
                                        class="img-fluid owl-lazy">
                                </a>
                                                        </div>
                        <div class="view-user-img">

                                                        <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                    class="img-fluid user-img-one" alt=""></a>


                        </div>
                        <div class="tooltip">
                            <div class="tooltip-icon">
                                <i data-feather="share-2"></i>
                            </div>
                            <span class="tooltiptext">
                                <div class="instructor-home-social-icon">
                                    <ul>
                                        <li><a href="https://facebook.com/"><i data-feather="facebook"></i></a></li>
                                        <li><a href="#"><i data-feather="twitter"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=2cbvZf1jIJM"><i data-feather="youtube"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=ImtZ5yENzgE"><i data-feather="linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading">
                                                                <a href="detail/blog/5/build-a-successful-creative-blog.html">
                                    Build a Successful Creati...
                                                                        </a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                            </div>
                            <div class="view-footer">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                23-01-2020</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                01:13:30 PM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-85" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">Build a Successful Creative Blog</h5>
                            <div class="row btm-20">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-date">
                                        <a href="#"><i data-feather="calendar"></i> 01-01-1970</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-time">
                                        <a href="#"><i data-feather="clock"></i> 12:00:00 AM</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-des">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat p
                                </p>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">

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
                    data-pt-title="#prime-next-item-description-block-86">
                    <div class="view-block">
                        <div class="view-img">
                                                                                    <a href="detail/blog/6/built-to-blog.html">

                                    <img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978219697.jpg" alt="course"
                                        class="img-fluid owl-lazy">
                                </a>
                                                        </div>
                        <div class="view-user-img">

                                                        <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                    class="img-fluid user-img-one" alt=""></a>


                        </div>
                        <div class="tooltip">
                            <div class="tooltip-icon">
                                <i data-feather="share-2"></i>
                            </div>
                            <span class="tooltiptext">
                                <div class="instructor-home-social-icon">
                                    <ul>
                                        <li><a href="https://facebook.com/"><i data-feather="facebook"></i></a></li>
                                        <li><a href="#"><i data-feather="twitter"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=2cbvZf1jIJM"><i data-feather="youtube"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=ImtZ5yENzgE"><i data-feather="linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading">
                                                                <a href="detail/blog/6/built-to-blog.html">
                                    Built to Blog
                                                                        </a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                            </div>
                            <div class="view-footer">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                23-01-2020</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                01:23:16 PM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-86" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">Built to Blog</h5>
                            <div class="row btm-20">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-date">
                                        <a href="#"><i data-feather="calendar"></i> 01-01-1970</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-time">
                                        <a href="#"><i data-feather="clock"></i> 12:00:00 AM</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-des">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat p
                                </p>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">

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
                    data-pt-title="#prime-next-item-description-block-84">
                    <div class="view-block">
                        <div class="view-img">
                                                                                    <a href="detail/blog/4/blogging-for-your-business.html">

                                    <img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978163994.jpg" alt="course"
                                        class="img-fluid owl-lazy">
                                </a>
                                                        </div>
                        <div class="view-user-img">

                                                        <a href="all/profile/1.html" title=""><img src="{{ asset('public/website') }}/images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg"
                                    class="img-fluid user-img-one" alt=""></a>


                        </div>
                        <div class="tooltip">
                            <div class="tooltip-icon">
                                <i data-feather="share-2"></i>
                            </div>
                            <span class="tooltiptext">
                                <div class="instructor-home-social-icon">
                                    <ul>
                                        <li><a href="https://facebook.com/"><i data-feather="facebook"></i></a></li>
                                        <li><a href="#"><i data-feather="twitter"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=2cbvZf1jIJM"><i data-feather="youtube"></i></a></li>
                                        <li><a href="https://www.youtube.com/watch?v=ImtZ5yENzgE"><i data-feather="linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading">
                                                                <a href="detail/blog/4/blogging-for-your-business.html">
                                    Blogging for Your Busines...
                                                                        </a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="all/profile/1.html"> Admin</a></span></h6>
                            </div>
                            <div class="view-footer">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                23-01-2020</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                01:12:09 PM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-84" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">Blogging for Your Business</h5>
                            <div class="row btm-20">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-date">
                                        <a href="#"><i data-feather="calendar"></i> 01-01-1970</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-time">
                                        <a href="#"><i data-feather="clock"></i> 12:00:00 AM</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-des">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat p
                                </p>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">

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
