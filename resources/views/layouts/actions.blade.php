<div class="container">
    <hr>
    <div class="Row align-items-center">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ url('/changeLocale/si') }}" class="btn btn-primary">සිංහල</a>
            <a href="{{ url('/changeLocale/ta') }}" class="btn btn-warning">தமிழ்</a>
            <a href="{{ url('/changeLocale/en') }}" class="btn btn-success">English</a>
            <a href="{{ url('dashboard/dashboard') }}" class="btn btn-info">{{__('sign_up.home')}}</a>
            <a href="{{url('/logout')}}" class="btn btn-danger">{{__('sign_up.logout')}}</a>
        </div>
    </div>
</div>