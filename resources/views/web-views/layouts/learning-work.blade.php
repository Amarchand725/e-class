<section id="learning-work" class="learning-work-main-block">
    <div class="container-xl">
        <div class="row">
            @foreach (learningLabels() as $learning)
                <div class="col-lg-4 col-md-4">
                    <div class="learning-work-block">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="learning-work-icon">
                                    {!! $learning->icon !!}
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="learning-work-dtl">
                                    <div class="work-heading">{{ $learning->label }}</div>
                                    <p>{{ $learning->message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
