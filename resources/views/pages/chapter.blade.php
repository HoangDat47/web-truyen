@extends('../layout')
@section('title')
    {{ $truyen->tentruyen }}
    {{ $chapter->tenchapter }}
@endsection
@section('content')
    <div id="ctl00_divCenter" class="full-width col-sm-12">
        <div class="reading">
            <div class="container">
                <div class="top">
                    <ul class="breadcrumb">
                        <li><a href="{{ Route('index.home') }}" class="itemcrumb"><span>Trang chủ</span></a></li>
                        <li><a href="{{ route('index.doctruyen', [$truyen->slug_truyen]) }}"
                                class="itemcrumb"><span>{{ $truyen->tentruyen }}</span></a></li>
                        <li><a href="{{ route('index.xemchapter', [$truyen->slug_truyen, $chapter->slug_chapter]) }}"
                                class="itemcrumb"><span>{{ $chapter->tenchapter }}</span></a></li>
                    </ul>
                    <h1 class="txt-primary"><a
                            href="{{ route('index.doctruyen', [$truyen->slug_truyen]) }}">{{ $truyen->tentruyen }}
                        </a> <span>- {{ $chapter->tenchapter }}</span></h1><i>[Cập nhật lúc:
                        {{ $chapter->created_at }}]</i>
                </div>
                <div class="reading-control">
                    <div class="mrb10">
                        <a rel="nofollow" href="javascript:void(0)" class="alertError btn btn-warning"><i
                                class="fa fa-exclamation-triangle"></i> Báo lỗi</a>
                    </div>
                    <div class="chapter-nav" id="chapterNav">
                        <a class="home" href="{{ Route('index.home') }}"><i class="fa fa-home"></i></a>
                        <a class="home backward" href="{{ route('index.doctruyen', [$truyen->slug_truyen]) }}"><i
                                class="fa fa-list"></i></a>
                        @if ($chapter_truoc == 'null')
                            <a href="javascript:void(0)" onclick="alert('Đây là chapter đầu tiên!')"
                                class="prev a_prev disabled"><i class="fa fa-chevron-left"></i></a>
                        @else
                            <a href="{{ route('index.xemchapter', [$truyen->slug_truyen, $chapter_truoc->slug_chapter]) }}"
                                class="prev a_prev"><i class="fa fa-chevron-left"></i></a>
                        @endif
                        <select class="select-chapter" onchange="window.location.href=this.value;">
                            @foreach ($tat_ca_chapter as $item)
                                <option
                                    value="{{ route('index.xemchapter', [$truyen->slug_truyen, $item->slug_chapter]) }}"
                                    @if ($item->id == $chapter->id) selected @endif>{{ $item->tenchapter }}</option>
                            @endforeach
                        </select>
                        @if ($chapter_sau == 'null')
                            <a href="javascript:void(0)" onclick="alert('Đây là chapter cuối cùng!')"
                                class="next a_next disabled"><i class="fa fa-chevron-right"></i></a>
                        @else
                            <a href="{{ route('index.xemchapter', [$truyen->slug_truyen, $chapter_sau->slug_chapter]) }}"
                                class="next a_next"><i class="fa fa-chevron-right"></i></a>
                        @endif
                        @if ($theo_doi == null)
                            <a class="follow-link btn btn-success"
                                href="{{ route('index.theo_doi_truyen', [$truyen->id]) }}"><i
                                    class="fa-solid fa-bookmark"></i></i>
                                <span>Theo dõi</span></a>
                        @else
                            <a class="follow-link btn btn-danger"
                                href="{{ route('index.huy_theo_doi_truyen', [$truyen->id]) }}"><i class="fa fa-times"></i>
                                <span>Bỏ theo dõi</span></a>
                        @endif
                        @if (session('status'))
                            <div class="alert bg-green alert-dismissible" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="reading-detail box_doc">
                @foreach ($anhchapter as $key => $value)
                    <div class="page-chapter"><img src="{{ asset('public/uploads/Anh_chapter/' . $value->anhchapter) }}">
                    </div>
                @endforeach
            </div>
            <div class="container mrt5">
                <div class="top bottom">
                    <div class="text-center chapter-nav-bottom" id="chapterNavBottom">
                        @if ($chapter_truoc == 'null')
                            <a href="javascript:void(0)" onclick="alert('Đây là chapter đầu tiên!')"
                                class="btn btn-danger prev disabled"><em class="fa fa-chevron-left"></em> Chap
                                trước</a>
                        @else
                            <a href="{{ route('index.xemchapter', [$truyen->slug_truyen, $chapter_truoc->slug_chapter]) }}"
                                class="btn btn-danger prev">
                                <em class="fa fa-chevron-left"></em> Chap trước</a>
                        @endif
                        @if ($chapter_sau == 'null')
                            <a href="javascript:void(0)" onclick="alert('Đây là chapter cuối cùng!')"
                                class="btn btn-danger next disabled">Chap sau <em class="fa fa-chevron-right"></em></a>
                        @else
                            <a href="{{ route('index.xemchapter', [$truyen->slug_truyen, $chapter_sau->slug_chapter]) }}"
                                class="btn btn-danger next">Chap sau <em class="fa fa-chevron-right"></em></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const nav = document.querySelector('#chapterNav');
        let navTop = nav.offsetTop;

        function fixedNav() {
            if (window.scrollY >= navTop) {
                nav.classList.add('fixed');
            } else {
                nav.classList.remove('fixed');
            }
        }
        window.addEventListener('scroll', fixedNav);
    </script>
@endsection
