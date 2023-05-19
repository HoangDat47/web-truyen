<div class="right-side col-md-4 cmszone">
    <div class="comic-wrap Module Module-245">
        <div class="ModuleContent">
            <div class="box-tab box darkBox">
                <ul class="tab-nav clearfix">
                    <a rel="nofollow" title="BXH truyện tranh theo tháng" class="active"
                        style="font-family: 'Indie Flower', cursive;">Bảng xếp hạng truyện tranh</a>
                </ul>
                <div class="tab-pane">
                    <div id="topMonth">
                        <ul class="list-unstyled">
                            @foreach ($bxh_10 as $key => $item)
                                <li class="clearfix">
                                    <span class="txt-rank fn-order pos10">{{ $key + 1 }}</span>
                                    <div class="t-item comic-item" data-id="32185">
                                        <a class="thumb" title="{{ $item->tentruyen }}"
                                            href="{{ route('index.doctruyen', [$item->slug_truyen]) }}">
                                            <img class="lazy"
                                                src="{{ asset('public/uploads/Anh_truyen/' . $item->anhtruyen) }}">
                                        </a>
                                        <h3 class="title">
                                            <a
                                                href="{{ route('index.doctruyen', [$item->slug_truyen]) }}">{{ $item->tentruyen }}</a>
                                        </h3>
                                        <p class="chapter top">
                                            <a
                                                href="{{ route('index.xemchapter', [$item->slug_truyen, $item->max_slug_chapter]) }}">{{ $item->max_chapter }}</a>
                                            <span class="view pull-right">
                                                <i class="fa fa-eye">
                                                </i> {{ $item->views }}</span>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="visited-comics">
            <div class="box darkBox">
                <h2>Lịch sử đọc truyện</h2>
                <ul class="list-unstyled">
                    @if ($lsdt != null)
                        @foreach ($lsdt as $key => $ls)
                            <li class="clearfix">
                                <div class="t-item"><a class="thumb"
                                        href="{{ route('index.doctruyen', [$ls['slug_truyen']]) }}"><img class="center"
                                            src="{{ asset('public/uploads/Anh_truyen/' . $ls['anhtruyen']) }}"></a>
                                    <h3 class="title"><a href="{{ route('index.doctruyen', [$ls['slug_truyen']]) }}">
                                            {{ $ls['tentruyen'] }}</a></h3>
                                    <p class="chapter"><a
                                            href="{{ route('index.xemchapter', [$ls['slug_truyen'], $ls['slug_chapter']]) }}">
                                            {{ $ls['tenchapter'] }}<i class="fa fa-angle-right"></i></a>
                                        <span class="view pull-right"><a class="visited-remove" href="#"><i
                                                    class="fa fa-times"></i> Xóa</a></span>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="clearfix">
                            <h3 class="title">
                                <a href="#">Bạn chưa đọc truyện nào</a>
                            </h3>
                        </li>
                    @endif
                </ul>
            </div>
        </div> --}}
    </div>
</div>
