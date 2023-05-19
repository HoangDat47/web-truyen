@extends('../layout')
@section('title')
    {{ $theloai_id->tentheloai }}
@endsection
@section('content')
    <div class="center-side col-md-8">
        <ul class="breadcrumb">
            <li><a href="{{ Route('index.home') }}" class="itemcrumb"><span>Trang chủ</span></a></li>
            <li><a href="" class="itemcrumb"><span>{{$theloai_id->tentheloai}}</span></a></li>
        </ul>
        <div class="Module Module-246">
            <div class="ModuleContent">
                <div id="ctl00_mainContent_ctl00_divBasicFilter" class="comic-filter">
                    <h1 class="text-center">Truyện thể loại <strong>{{$theloai_id->tentheloai}}</strong></h1>
                    <div class="description">
                        <div class="info">{{$theloai_id->motatheloai}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Module Module-247">
            <div class="ModuleContent">
                <div class="items">
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
                                                <i class="fa fa-eye"></i> {{ $value->views }} 
                                                {{-- <i class="fa fa-comment"></i> 7.091  --}}
                                                <i class="fa fa-heart"></i> {{count_theo_doi($value->id)}}</span>
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
