<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Про наш проект</title>
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
                <li class="active"><a href="/info" title="Узнать детальнее про наш проект">Про нас</a></li>
                <li><a href="/portfolio" title="Примеры наших работ">Портфолио</a></li>
                <li data-toggle="modal" data-target="#cart-modal"><a href="#"><i class="fa fa-shopping-basket"
                                                                                 aria-hidden="true"></i><span
                                class="badge">{{ $good_count_in_cart or 0}}</span></a></li>
            </ul>
        </div>
    </div>
</div>
<div id="rr">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Мы работаем по схеме:</h2>
                <a href="#"><img width=90% src="{{ asset('assets/images/sh.png') }}" alt=""></a>
            </div>
        </div>
    </div>
</div>
<div id="dg">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
                <br><br>
                <h2>Как и чем оплатить заказ?</h2>
                <br>
                <p>Qiwi: +380933515355</p>
                <p>WMR: R359714986573</p>
                <p>WMZ: Z245903942920</p>
                <br>
                <h2>Как производится оплата ?</h2>
                <p>1.Вы делаете заказ с подробным описанием</p>
                <p>2.Вы ожидаете выполнения работы</p>
                <p>3.Я вам высылаю скриншот с водяными знаками (образец) готовой работы</p>
                <p>4.Вы смотрите, если что-то не устраивает, мы редактируем</p>
                <p>5.Вы оплачиваете заказ</p>
                <p>6.Получаете оригинал в любом формате</p>
                <br>
                <h2>Время работы:</h2>
                <p>В среднем 2 - 5 часов, возможна задержка из-за очереди, либо моей занятости.</p>
                <br>
                <p>ВОЗМОЖНА НАЦЕНКА ИЗ-ЗА ДОП.СЛОЖНОСТИ И Т.Д.</p>
            </div>
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
