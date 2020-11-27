
<div class="col-lg-4 col-md-12">
    <div class="newsletter-widget text-center align-self-center">

        <h3>Subscribe Today!</h3>
        <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <form class="form-inline" method="post" action="{{url('/send')}}">@csrf
            <input type="email" name="email" id="email" placeholder="Add your email here.." required
                   class="form-control"/>
            <input type="submit" value="Subscribe" class="btn btn-default btn-block"/>
        </form>

    </div>


