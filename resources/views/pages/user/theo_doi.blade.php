@extends('pages.profile')
@section('content1')
    <div class="user-page clearfix">
        <h1 class="postname">
            Truyện đang theo dõi
        </h1>
        <section class="comics-followed comics-followed-withpaging user-table clearfix">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                            </th>
                            <th class="nowrap">Tên truyện</th>
                            <th class="nowrap">Chap mới nhất</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($truyen_theo_doi as $ttd)
                            <tr class="unread">
                                <td>
                                    <a class="image" href="{{ route('index.doctruyen', [$ttd->truyen->slug_truyen]) }}">
                                        <img src="{{ asset('public/uploads/Anh_truyen/' . $ttd->truyen->anhtruyen) }}"
                                            class="lazy"></a>
                                </td>
                                <td>
                                    <a class="comic-name"
                                        href="{{ route('index.doctruyen', [$ttd->truyen->slug_truyen]) }}">
                                        {{ $ttd->truyen->tentruyen }}</a>
                                    <div class="follow-action">
                                        <a href="{{ route('index.huy_theo_doi_truyen', [$ttd->truyen->id]) }}"
                                            class="follow-link">
                                            <i class="fa fa-times">
                                            </i> Bỏ theo dõi
                                        </a>
                                    </div>
                                </td>
                                @foreach ($ttd->chapter_vua_them->take(1) as $chapter)
                                    <td class="nowrap chapter">
                                        <a
                                            href="{{ route('index.xemchapter', [$ttd->truyen->slug_truyen, $chapter->slug_chapter]) }}">
                                            {{ $chapter->tenchapter }}</a>
                                        <br>
                                        <time class="time">{{ gettimeago($chapter->created_at) }}</time>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-outter">
                {{ $truyen_theo_doi->links() }}
            </div>
        </section>
    </div>
@endsection
