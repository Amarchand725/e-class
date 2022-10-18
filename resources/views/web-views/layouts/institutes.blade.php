<section id="instructor-home" class="instructor-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">Institute</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="instructor-button txt-rgt">
                </div>
            </div>
        </div>
        
        <div id="institute-home-slider" class="instructor-home-main-slider owl-carousel">
            @foreach (institutes() as $institute)
                <div class="item">
                    <div class="instructor-home-block text-center">
                        <div class="instructor-home-block-one">
                            <a href="{{ route('institute.single', $institute->slug) }}" title="">
                                <img src="{{ asset('public/admin/images/institutes') }}/{{ $institute->logo }}"  class="img-fluid" />
                            </a>
                            <div class="instructor-home-hover-icon">
                                <ul>
                                    <li>
                                        <div class="instructor-home-btn">
                                            <a href="{{ route('institute.single', $institute->slug) }}" class="btn btn-primary" title="View Page">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>  
                            <div class="instructor-home-dtl">
                                <h4 class="instructor-home-heading">
                                    <a href="#" title="">{{ $institute->name }}</a>
                                </h4>
                                <p>
                                    <a href="#" class="__cf_email__" data-cfemail="{{ $institute->email }}">{{ $institute->email }}</a>
                                </p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>