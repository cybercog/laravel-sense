<!DOCTYPE html>
<html>
<head>
    <title>Sense</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            background-color: white;
            height: 100%;
            line-height: 1.4;
            font-family: 'Nunito', sans-serif;
        }
        .container {
            margin: 0 auto;
            width: 90%;
        }
        .uuid {
            width: 400px;
        }
        .statement {
            width: 600px;
        }
        .table td {
            padding: .5rem;
        }
        .table tr:nth-child(even) {
            background: #ececec;
        }
        .table th {
            text-transform: uppercase;
            font-size: 10px;
        }
        .text-center {
            text-align: center;
        }
        .mt-4 {
            margin-top: 1rem;
        }
        .mb-4 {
            margin-bottom: 1rem;
        }
        .logo a:link,
        .logo a:visited {
            text-decoration: none;
        }
        a:link,
        a:visited {
            color: black;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-4 logo">
        <a href="/sense">Sense</a>
    </h1>
    @yield('content')
</div>
</body>
