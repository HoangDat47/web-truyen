@extends('../layout')
@section('title', 'Lịch sử đọc truyện')
@section('content')
    <div class="center-side col-md-8">
        <ul class="breadcrumb">
            <li><a href="{{ Route('index.home') }}" class="itemcrumb"><span>Trang chủ</span></a></li>
            <li><a href="" class="itemcrumb"><span>Lịch sử đọc truyện</span></a></li>
        </ul>
        <div class="visited-comics">
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
                                        <span class="view pull-right"><a class="visited-remove" 
                                            href="{{ route('index.xoa_lich_su_doc_truyen', [$ls['truyen_id'], $ls['chapter_id']]) }}"><i
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
        </div>
    </div>
    @include('pages.right_side')
@endsection
