@extends('../layout')
@section('title', 'Đọc truyện tranh')
@section('content')
    <div class="center-side col-md-8">
        <div class="Module Module-243">
            <div class="ModuleContent">
                <div class="items">
                    <div class="relative">
                        <h1 class="page-title">Tìm truyện <i class="fa fa-angle-right"></i></h1>
                    </div>
                    <div class="row">
                        @foreach ($truyen as $key => $value)
                            <div class="item">
                                <figure class="clearfix">
                                    <div class="image">
                                        <a href="{{ route('index.doctruyen', [$value->slug_truyen]) }}">
                                            <img src="{{ asset('public/uploads/Anh_truyen/' . $value->anhtruyen) }}"
                                                class="lazy">
                                        </a>
                                        <div class="view clearfix">
                                            <span class="pull-left">
                                                <i class="fa fa-eye">
                                                </i> {{ $value->views }} <i class="fa fa-comment"></i> 7.091 <i
                                                    class="fa fa-heart"></i> 94K</span>
                                        </div>
                                    </div>
                                    <figcaption>
                                        <h3>
                                            <a href="{{ route('index.doctruyen', [$value->slug_truyen]) }}">
                                                {{ $value->tentruyen }}</a>
                                        </h3>
                                        <ul class="comic-item" data-id="52630">
                                            @foreach ($value->chapter_index->take(3) as $key => $tl)
                                                <li class="chapter clearfix">
                                                    <a
                                                        href="{{ route('index.xemchapter', [$value->slug_truyen, $tl->slug_chapter]) }}">
                                                        {{ $tl->tenchapter }}</a>
                                                        <i class="time">{{ gettimeago($tl->created_at) }}</i>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center">
                    {{ $truyen->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('pages.right_side')
@endsection
