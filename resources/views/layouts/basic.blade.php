<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo App\Helper::eventData('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bower_components/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="bower_components/jquery-ui/themes/base/all.css" />
    <link rel="stylesheet" href="/css/main.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>

    <script src="https://unpkg.com/vue"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    @yield('javascripts')
</body>

</html>
