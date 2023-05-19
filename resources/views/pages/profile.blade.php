@extends('../layout')
@section('content')
    @include('pages/user/left_sidebar')
    <div class="col-md-9 col-sm-8">
        @yield('content1')
    </div>
@endsection
