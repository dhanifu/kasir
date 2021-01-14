<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title')</title>
<meta name="description" content="Sufee Admin - HTML5 Admin Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="favicon.ico">

<link rel="stylesheet" href="{{ asset('sufee-admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('sufee-admin/vendors/font-awesome/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{ asset('sufee-admin/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<livewire:styles />

@stack('css')