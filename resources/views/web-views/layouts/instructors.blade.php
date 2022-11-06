<section id="instructor-home" class="instructor-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">Instructor</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="instructor-button txt-rgt">
                    <a href="#" class="btn btn-secondary" title="All Instructor">
                        All Instructor<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div id="instructor-home-slider" class="instructor-home-main-slider owl-carousel">
            @foreach (instructors() as $instructor)
                <div class="item">
                    <div class="instructor-home-block text-center">
                        <div class="instructor-home-block-one">
                            <a href="{{ route('user.profile', $instructor->slug) }}" title="{{ $instructor->name }}">
                                @if($instructor->hasUserProfile->profile_image)
                                    <img src="{{ asset('public/admin/images/profiles') }}/{{  $instructor->hasUserProfile->profile_image }}" class="img-fluid user-img-one" alt="">
                                @else
                                    <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                @endif
                            </a>
                            <div class="instructor-home-hover-icon">
                                <ul>
                                    <li>
                                        <div class="tooltip">
                                            <div class="tooltip-icon">
                                                <i data-feather="share-2"></i>
                                            </div>
                                            <span class="tooltiptext">
                                                <div class="instructor-home-social-icon">
                                                    <ul>
                                                        <li><a href="{{ $instructor->hasUserProfile->facebook_url }}" target="_blank"><i data-feather="facebook"></i></a></li>
                                                        <li><a href="{{ $instructor->hasUserProfile->twitter_url }}" target="_blank"><i data-feather="twitter"></i></a></li>
                                                        <li><a href="{{ $instructor->hasUserProfile->youtube_url }}" target="_blank"><i data-feather="youtube"></i></a></li>
                                                        <li><a href="{{ $instructor->hasUserProfile->linked_in_url }}" target="_blank"><i data-feather="linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="instructor-home-btn">
                                            <a href="{{ route('user.profile', $instructor->slug) }}" class="btn btn-primary" title="View Profile"><i data-feather="eye"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="instructor-home-dtl">
                                <h4 class="instructor-home-heading"><a href="{{ route('user.profile', $instructor->slug) }}" title="">{{ $instructor->name }}</a></h4>
                                <p>Instructor</p>

                                <div class="instructor-home-info">
                                    <ul>
                                        <li>{{ count($instructor->haveCourses) }} Courses</li>
                                        <li>{{ count($instructor->haveFollowers) }} Follower</li>
                                        <li>{{ count($instructor->haveFollowings) }} Following</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
