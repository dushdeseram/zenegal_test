<div id='ctsFormLoader' style="text-align: center;margin-top: 30px;">
    <h3>Hi</h3>
    <h5>
        @if(session()->has('user'))
        {{ Session::get('user')['name'] }}
        @endif
    </h5>
    <img src="{{ asset('images/gif/spinner.gif')}}" width='100px'/>
    <p>Please wait! you will be redirect to the dashboard.</p>
</div>