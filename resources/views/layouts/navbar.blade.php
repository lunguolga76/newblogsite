
<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('assets/front/images/version/market-logo.png')}}" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    @foreach($cats as $cat)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.single',[$cat->slug])}}">{{$cat->title}}</a>
                    </li>
                    @endforeach



<div>
                <form class="form-inline" method="get" action="{{ route('search') }}">
                    <input name="s" class="form-control mr-sm-2 @error('s') is-invalid @enderror" type="text" placeholder="How may I help?" required>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
</div>
                    <div class="ml-2">
                        @if(Auth::check())
                            <li><a href="{{route('login')}}"><i class="fa fa-user"></i></a></li><br>
                            <li class="mt-0"><a href="{{route('logout')}}"><small>Logout</small></a></li>
                        @else
                            <li><a href="{{route('login.create')}}"><i class="fa fa-user"></i></a></li>
                        @endif
                    </div>
                <style>
                    .market-header .form-inline .form-control.is-invalid{
                        border: 2px solid red;
                    }
                </style>
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->
