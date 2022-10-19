<footer id="footer" class="footer-main-block">
    <section id="newsletter" class="newsletter-main-block">
        <div class="container-xl">
            <div class="newsletter-block">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <h1 class="newsletter-heading">Join our mailing list</h1>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <form class="email-subscribe" id="email-subscribe" data-action="{{ route('user.email_subscribe') }}">
                            <input type="email" placeholder="Enter your email address" id="subscribed_email" name="subscribed_email">
                            <span style="color: white" id="error-subscribed_email">{{ $errors->first('subscribed_email') }}</span>
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-xl">
        <div class="footer-block">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">   
                    <div class="footer-logo">
                        <a href="{{ route('home') }}" title="logo">
                            <img src="{{ asset('public/website/images/logo/footer_logo.png') }}" alt="logo" class="img-fluid" >
                        </a>
                    </div>

                    <div class="mobile-btn">
                        <a href="https://facebook.com/" title="">
                            <img src="{{ asset('public/website/images/icons/download-google-play.png') }}" alt="logo">
                        </a>
                        <a href="https://facebook.com/" title=""><img src="{{ asset('public/website/images/icons/app-download-ios.png') }}" alt="logo"></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-2 col-4">
                    <div class="widget"><b>Link 01</b></div>
                    <div class="footer-link">
                        <ul>                         
                            <li><a href="#" title="About us">About us</a></li>                            
                            <li><a href="#" title="Contact us">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-4">
                    <div class="widget"><b>Link 02</b></div>
                    <div class="footer-link">
                        <ul>
                            <li><a href="#" title="Blog">Blog</a></li>
                            <li><a href="#" title="Help&amp;Support">Help&amp;Support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-4">
                    <div class="widget"><b>Link 03</b></div>
                    <div class="footer-link">
                        <ul>
                            <li><a href="#" title="demo purpose">Courses</a></li>
                            <li><a href="#" title="Test">Bundles</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-2">
                    <div class="footer-dropdown">
                        <a href="#" class="a" data-toggle="dropdown">
                            <i data-feather="globe"></i>En<i class="fa fa-angle-up lft-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <a href="index.html"><li>English</li></a>
                        </ul>
                    </div>
                    
                    <div class="footer-dropdown footer-dropdown-two">
                        <a href="#" class="a" data-toggle="dropdown">
                            <i class="icon-wallet icons mr-2"></i> USD<i class="fa fa-angle-up lft-10"></i>
                        </a>
                        
                        <ul class="dropdown-menu">
                            <a href="index.html"><li>USD</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="tiny-footer">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo-footer">
                        <ul>
                            <li>Copyright © 2022 E-LEARNING.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="copyright-social">
                        <ul>
                            <li>
                                <a href="#" title="Terms &amp; Condition">Terms &amp; Condition</a>
                            </li> 
                            <li>
                                <a href="#" title="Privacy Policy">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>