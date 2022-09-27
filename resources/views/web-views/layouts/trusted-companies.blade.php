<section id="trusted" class="trusted-main-block">
    <div class="container-xl">
        <div class="patners-block">
            <h6 class="patners-heading btm-40">Trusted By Companies</h6>
            <div id="patners-slider" class="patners-slider owl-carousel">
                @foreach (trustCompanies() as $company)
                    <div class="item-patners-img">
                        <a href="{{ $company->website_link }}" target="_blank">
                            <img data-src="{{ asset('public/admin/images/trust-companies') }}/{{ $company->logo }}" class="img-fluid owl-lazy" alt="{{ $company->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>