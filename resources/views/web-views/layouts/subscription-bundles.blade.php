<section id="subscription" class="student-main-block">
    <div class="container-xl">
        <h4 class="student-heading">Subscription Bundles</h4>
        <div id="subscription-bundle-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach (bundles() as $key=>$bundle)
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block-{{ $key }}">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="{{ route('bundle.single', $bundle->slug) }}">
                                    <img data-src="{{ asset('public/admin/bundle/banners') }}/{{ $bundle->banner }}" alt="bundle" class="img-fluid owl-lazy">
                                </a>
                            </div>

                            @if($bundle->is_paid)  
                                <div class="badges bg-priamry offer-badge">
                                    @php 
                                        $discount = $bundle->retail_price-$bundle->price;
                                        $percentage = $discount/$bundle->retail_price*100;
                                    @endphp 
                                    
                                    <span>OFF<span>{{ round($percentage) }}%</span></span>
                                </div>
                            @endif

                            <div class="view-user-img">
                                <a href="{{ route('user.profile', $bundle->hasCreatedBy->slug) }}" title="">
                                    @if($bundle->hasUserProfile)
                                        <img src="{{ asset('public/users') }}/{{ $bundle->hasCreatedBy->hasUserProfile->profile_image }}" width="50px"  class="img-fluid user-img-one" alt="">
                                    @else
                                        <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading">
                                    <a href="{{ route('bundle.single', $bundle->slug) }}">{{ $bundle->title }}</a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="{{ route('user.profile', $bundle->hasCreatedBy->slug) }}">{{ $bundle->hasCreatedBy->name }}</a></span></h6>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-date">
                                                <a href="#"><i data-feather="calendar"></i> {{ date('d, M-Y', strtotime($bundle->updated_at)) }}</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="rate text-right">
                                                <ul>
                                                    @if($bundle->is_paid)
                                                        <li><a><b>${{ number_format($bundle->price, 2) }}</b></a></li>
                                                        <li><a><b><strike>${{ number_format($bundle->retail_price, 2) }}</strike></b></a></li>
                                                    @else 
                                                        <li>FREE</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-{{ $key }}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">{{ $bundle->title }}</h5>
                                <div class="main-des">
                                    <p>{!! $bundle->short_detail !!}</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="protip-btn">
                                                <a href="#" class="btn btn-primary">
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Subscribe Now
                                                </a>
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