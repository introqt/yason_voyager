<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Шаблоны, Шапки, Twitch, Youtube, Баннеры</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">
    <link rel="stylesheet" href="{{ asset("css/component.css") }}">
    <link rel="stylesheet" href="{{ asset("css/normalize.css") }}">
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
                {{--<li class="active"><a href="/">Домой</a></li>--}}
                {{--<li><a href="/info" title="Узнать детальнее про наш проект">Про нас</a></li>--}}
                {{--<li><a href="/portfolio" title="Примеры наших работ">Портфолио</a></li>--}}
                <li data-toggle="modal" data-target="#cart-modal"><a href="#"><i class="fa fa-shopping-basket"
                                                                                 aria-hidden="true"></i><span
                                class="badge">{{ $good_count_in_cart}}</span></a></li>
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
<div id="large-header" class="large-header">
    <canvas id="demo-canvas"></canvas>
</div>
<div class="container">
    <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2">

        </div>
    </div>
</div>
<div class="container w">
    <div class="row centered">
        <br><br>
        <div class="col-lg-4">
            <h4>Быстрая <i class="fa fa-tachometer"></i> работа</h4>
            <p>Сроки выполнения работы в среднем от 2-5 часов, возможна задержка из-за очереди</p>
        </div>
        <div class="col-lg-4">
            <h4>Высокое <i class="fa fa-thumbs-up" aria-hidden="true"></i></i> качество</h4>
            <p>Выполняется работа на проффесиональном уровне, 90% заказчиков довольны результатами</p>
        </div>
        <div class="col-lg-4">
            <h4>Низкие <i class="fa fa-percent" aria-hidden="true"></i> цены</h4>
            <p>От 59 рублей до 599 рублей - такие цены вы можете встретить в нашем магазине</p>
        </div>
    </div>
    <br><br>
</div>
<div id="dg">
    <div class="container">
        <div class="row centered">
            <br><br>
            <h5>Товары</h5>
            <br><br>
            @foreach($goods as $good)
                <div class="col-lg-3">
                    <div class="tilt" id="{{ $good->id }}" data-toggle="modal" data-target="#good-modal">
                        <img width=90% src="{{ asset("storage/$good->image") }}" alt="">
                        <h3 class="row centered">{{ $good->price }} руб</h3>
                    </div>
                </div>
            @endforeach
            <div id="good-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <p>Error loading this description</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-id="" data-dismiss="modal">Добавить в
                                корзину
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>

                </div>
            </div>
            <div id="success-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Успешно!</h4>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="lgg">
    {{--<div class="container wb">--}}
    {{--<div class="row centered">--}}
    {{--<br><br><br><br>--}}
    {{--<div class="col-lg-8- col-lg-offset-0">--}}
    {{--<a href="/psd"><h6>Исходники <i class="fa fa-download" aria-hidden="true"></i> только на сайте, ЖМИ</h6>--}}
    {{--</a>--}}
    {{--<p>Вы можете скачать бесплатно исходники любой работы в формате PSD, C4D.</p>--}}
    {{--<br><br>--}}
    {{--</div>--}}
    {{--<div class="col-lg-2"></div>--}}
    {{--<div class="col-lg-10 col-lg-offset-1">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div id="r">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Примеры последних работ</h2>
                    <br><br>

                </div>
            </div>
            <div class="row centered">
                @foreach($work_examples as $work_example)
                    <div class="col-lg-4">
                        <div class="tilt1">
                            <img width=100% src="{{ asset("storage/$work_example->image") }}"
                                 alt="{{ asset("storage/$work_example->name") }}"
                                 style="max-height: 720px;">
                            <br>
                            <br>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="lg">
        <div class="container">
            <div class="row centered">
                <h2>Наши партнеры</h2>
                <br><br>
                <?php $i = 1; $class = "col-lg-offset-1";?>
                @foreach($partners as $partner)
                    <div class="col-lg-2 {{ ($i != 1) ? null : 'col-lg-offset-1' }}">
                        <img width=100% src="{{ asset("storage/$partner->image") }}"
                             alt="{{ $partner->name }}">
                    </div>
                    <?php $i++; ?>
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/rAF.js") }}"></script>
<script src="{{ asset("js/demo-2.js") }}"></script>
<script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
