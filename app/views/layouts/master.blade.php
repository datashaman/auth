<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    @yield ('content')

    {{ HTML::script('components/jquery/dist/jquery.js') }}
    @yield ('scripts')
</body>
</html>
