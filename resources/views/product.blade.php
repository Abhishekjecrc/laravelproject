<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('links')
</head>
<body>
@include('header')
      
<div class="content mt-3">
        <div class="animated fadeIn">
        <div class="row">
                <div class="col-lg-12">
        <div class="card">
              
             <h1>Hello</h1>
        </div>
                </div>
        </div>
        </div>
</div>
@include('scrpit')

</body>
</html>