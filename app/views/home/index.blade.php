@extends ('layouts.master')

@section ('content')
<ul>
    <li><button id="success">Success</button></li>
    <li><button id="fail">Fail</button></li>
    <li><button id="error">Error</button></li>
</ul>
@stop

@section ('scripts')
{{ HTML::script('scripts/home.js') }}
@stop
