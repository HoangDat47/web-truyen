@extends('../layout')
@section('title')
    {{ $truyen->tentruyen }}
@endsection
@section('content')
    <div class="center-side col-md-8">
        <ul class="breadcrumb">
            <li><a href="{{ Route('index.home') }}" class="itemcrumb"><span>Trang chủ</span></a></li>
            <li><a href="{{ route('index.doctruyen', [$truyen->slug_truyen]) }}"
                    class="itemcrumb"><span>{{ $truyen->tentruyen }}</span></a></li>
        </ul>
        <article id="item-detail">
            <h1 class="title-detail">{{ $truyen->tentruyen }}</h1>
            <time class="small">
                [Cập nhật lúc: {{ $truyen->update_at }}]
            </time>
            <div class="detail-info">
                <div class="row">
                    <div class="col-xs-4 col-image">
                        <img src="{{ asset('public/uploads/Anh_truyen/' . $truyen->anhtruyen) }}">
                    </div>
                    <div class="col-xs-8 col-info">
                        <ul class="list-info">
                            <li class="author row">
                                <p class="name col-xs-4">
                                    <i class="fa fa-user">
                                    </i> Tác giả
                                </p>
                                <p class="col-xs-8">{{ $truyen->tacgia }}</p>
                            </li>
                            <li class="status row">
                                <p class="name col-xs-4">
                                    <i class="fa fa-rss">
                                    </i> Tình trạng
                                </p>
                                <p class="col-xs-8">
                                    @if ($truyen->tinhtrang == 0)
                                        Đang tiến hành
                                    @else
                                        Hoàn thành
                                    @endif
                                </p>
                            </li>
                            <li class="kind row">
                                <p class="name col-xs-4">
                                    <i class="fa fa-tags">
                                    </i> Thể loại
                                </p>
                                <p class="col-xs-8">
                                    @foreach ($truyen->theloai as $key => $tl)
                                        <span class="badge bg-warning text-dark">
                                            <a
                                                href="{{ route('index.theloai', [$tl->slug_theloai]) }}">{{ $tl->tentheloai }}</a>
                                        </span>
                                    @endforeach
                                </p>
                            </li>
                            <li class="author row">
                                <p class="name col-xs-4">
                                    <i class="fa fa-user">
                                    </i> Người đăng
                                </p>
                                <p class="col-xs-8">{{ $nguoi_dang->name }}</p>
                            </li>
                            <li class="row">
                                <p class="name col-xs-4">
                                    <i class="fa fa-eye">
                                    </i> Lượt xem
                                </p>
                                <p class="col-xs-8">{{ $truyen->views }}</p>
                            </li>
                        </ul>
                        <div class="follow">
                            @if ($theo_doi == null)
                                <a class="follow-link btn btn-success"
                                    href="{{ route('index.theo_doi_truyen', [$truyen->id]) }}"><i
                                        class="fa-solid fa-bookmark"></i></i>
                                    <span>Theo dõi</span></a>
                            @else
                                <a class="follow-link btn btn-danger"
                                    href="{{ route('index.huy_theo_doi_truyen', [$truyen->id]) }}"><i
                                        class="fa fa-times"></i> <span>Bỏ theo dõi</span></a>
                            @endif
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            @if (session('status'))
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Danger:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>{{ session('status') }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <span>
                                <b>{{count_theo_doi($truyen->id)}}</b> Lượt theo dõi</span>
                        </div>
                        <div class="read-action mrt10">
                            <a class="btn btn-warning mrb5"
                                href="{{ route('index.xemchapter', [$truyen->slug_truyen, $chapter_dau->slug_chapter]) }}">
                                Đọc từ
                                đầu</a>
                            <a class="btn btn-warning mrb5"
                                href="{{ route('index.xemchapter', [$truyen->slug_truyen, $chapter_cuoi->slug_chapter]) }}">
                                Đọc
                                mới nhất</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-content">
                <h3 class="list-title">
                    <i class="fa fa-file-text-o">
                    </i> Nội dung
                </h3>
                <p>
                    {!! html_entity_decode($truyen->noidungtruyen) !!}
                </p>{{-- <a href="#" class="morelink">Xem thêm <i class="fa fa-angle-right"></i></a> --}}
            </div>
            <div class="list-chapter">
                <h2 class="list-title clearfix">
                    <i class="fa fa-list">
                    </i> Danh sách chương
                </h2>
                <div class="row heading">
                    <div class="col-xs-5 no-wrap">Số chương</div>
                    <div class="col-xs-4 no-wrap text-center">Cập nhật</div>
                    <div class="col-xs-3 no-wrap text-center">Xem</div>
                </div>
                <nav>
                    <ul>
                        @foreach ($chapter as $key => $value)
                            <li class="row">
                                <div class="col-xs-5 chapter">
                                    <a
                                        href="{{ route('index.xemchapter', [$truyen->slug_truyen, $value->slug_chapter]) }}">{{ $value->tenchapter }}</a>
                                </div>
                                <div class="col-xs-4 text-center small no-wrap">{{ gettimeago($value->created_at) }}</div>
                                <div class="col-xs-3 text-center small">{{ $value->views }}</div>
                            </li>
                        @endforeach
                    </ul>
                    {{-- <a class="hidden view-more" href="#">
                        <i class="fa fa-plus">
                        </i> Xem thêm</a> --}}
                </nav>
            </div>
            {{-- <div class="detail-content">
                <h3 class="list-title">
                    <i class="fa-solid fa-comments">
                    </i> Bình luận
                </h3>
            </div> --}}
        </article>
        <script type="text/javascript">
            gOpts.comicId = 21948;
            gOpts.chapterId = -1;
            gOpts.key = 'b60a7fa0-a48a-0ac0-18d2-a4c87019369b';
        </script>
    </div>
    @include('pages.right_side')
@endsection
