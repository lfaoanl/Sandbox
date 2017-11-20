<?php
/**
 * Created by PhpStorm.
 * User: Faan Veldhuijsen
 * Date: 19-Nov-17
 * Time: 16:44
 */
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Document</title>

    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}" />
</head>
<body>
    <div id="sandbox"></div>

    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
