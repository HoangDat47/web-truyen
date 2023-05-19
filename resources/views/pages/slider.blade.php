<div class="altcontent1 cmszone">
    <div class="top-comics Module Module-244">
        <div class="ModuleContent">
            <h2 class="page-title">Truyện đề cử <i class="fa fa-angle-right"></i></h2>
            <div class="items-slide">
                <div class="owl-carousel owl-theme">
                    @foreach ($slider as $value)
                        <div class="item">
                            <a href="{{ route('index.doctruyen', [$value->slug_truyen]) }}">
                                <img class="lazyOwl" src="{{ asset('public/uploads/Anh_truyen/' . $value->anhtruyen) }}">
                            </a>
                            <div class="slide-caption">
                                <h3>
                                    <a href="{{ route('index.doctruyen', [$value->slug_truyen]) }}">{{ $value->tentruyen }}</a>
                                </h3>
                                @foreach ($value->chapter_index->take(1) as $key => $tl)
                                <a href="{{ route('index.xemchapter', [$value->slug_truyen, $tl->slug_chapter]) }}">{{ $tl->tenchapter }}</a>
                                <span class="time">
                                    <i class="fa fa-clock-o">
                                    </i> {{ gettimeago($tl->created_at) }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        stagePadding: 50,
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>
