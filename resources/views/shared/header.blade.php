@include('shared.admin-menu')

<div class="row">
    <div class="col-sm-12">
        <ul class="list-inline pull-right">
            <li><a href="{{ url('/auth/login') }}">Log In/Out</a></li>
            <li><a href="{{ url('/auth/register') }}">Account</a></li>
            <li><a href="">Cart</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <a href="{{ url('/') }}">Qosheli</a>
    </div>
    <div class="col-sm-8">
        @include('shared.search')
    </div>
    <div class="col-sm-2 text-right">
        <button class="btn btn-default">Map <i class="glyphicon glyphicon-map-marker"></i></button>
    </div>
</div>


@include('shared.menu')


