<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Шаблоны, Шапки, Twitch, Youtube, Баннеры</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/component.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/normalize.css") }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body.modal-open {
            overflow: auto;
        }

        body.modal-open[style] {
            padding-right: 0px !important;
        }

        .modal::-webkit-scrollbar {
            width: 0 !important; /*removes the scrollbar but still scrollable*/
        }

        .btn-success {
            background-color: black !important;
        }


    </style>
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
                <li class="active"><a href="/">Домой</a></li>
                <li><a href="/info" title="Узнать детальнее про наш проект">Про нас</a></li>
                <li><a href="/portfolio" title="Примеры наших работ">Портфолио</a></li>
                <li data-toggle="modal" data-target="#cart-modal"><a href="#"><i class="fa fa-shopping-basket"
                                                                                 aria-hidden="true"></i><span
                                class="badge">{{ $good_count_in_cart or 0}}</span></a></li>
            </ul>
        </div>
    </div>
</div>
<div id="cart-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Корзина</h4>
            </div>
            <div class="modal-body">
                <p>Ваша корзина пуста!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cart-modal-step-2"
                        data-dismiss="modal">Оформить заказ
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Очистить корзину</button>
            </div>
        </div>

    </div>
</div>
<div id="cart-modal-step-2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Корзина - Ваши контактные данные</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="usr">Имя:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="email">Почта (обязательно) :</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="social">Ссылка на соц. сеть :</label>
                        <input type="text" class="form-control" id="social">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Оформить заказ</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>

    </div>
</div>

@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/js/rAF.js") }}"></script>
<script src="{{ asset("assets/js/demo-2.js") }}"></script>
<script src="{{ asset("assets/js/app.js") }}"></script>
</body>
</html>
