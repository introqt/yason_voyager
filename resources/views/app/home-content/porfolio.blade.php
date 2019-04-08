<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Портфолио</title>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/component.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/normalize.css") }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Yason's <i class="fa fa-paint-brush"></i> Workshop</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Домой</a></li>
                <li><a href="/info" title="Узнать детальнее про наш проект">Про нас</a></li>
                <li class="active"><a href="/portfolio" title="Примеры наших работ">Портфолио</a></li>
                <li data-toggle="modal" data-target="#cart-modal"><a href="#"><i class="fa fa-shopping-basket"
                                                                                 aria-hidden="true"></i><span
                                class="badge">{{ $good_count_in_cart or 0}}</span></a></li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>
<div id="dg1">
    <div class="container">
        <div class="row centered">
            <h5>Рандомные работы мастера</h5>
            <br><br>
            @foreach($work_examples as $example)
                <div class="col-lg-2">
                    <div class="tilt1">
                        <a href="{{ asset("assets/images/$example->psd") }}"><img width=100%
                                                                                  src="{{ asset("assets/images/biga/$example->image") }}"
                                                                                  alt=""></a>

                        <p><br><br></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div id="f">
    <div class="container">
        <div class="row centered">
            ©2017 by Yason's Workshop
            <a href="https://vk.com/webdesigns" target="_blank"><i class="fa fa-vk"></i></a>
            <a href="https://www.youtube.com/user/stoplook97" target="_blank"><i class="fa fa-youtube"></i></a>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/js/rAF.js") }}"></script>
{{--<script src="{{ asset("assets/js/demo-2.js") }}"></script>--}}
<script src="{{ asset("assets/js/app.js") }}"></script>
</body>
</html>
