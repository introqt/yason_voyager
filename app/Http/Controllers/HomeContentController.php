<?php

namespace App\Http\Controllers;

use App\Good;
use App\WorkExample;
use App\Partner;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class HomeContentController extends Controller
{
    public function indexAction(Request $request)
    {
        $data['goods'] = Good::orderBy('order', 'ASC')->get();
        $data['work_examples'] = WorkExample::orderBy('order', 'ASC')->get();
        $data['partners'] = Partner::orderBy('order', 'ASC')->get();
        $data['good_count_in_cart'] = ($request->session()->has('cart')) ? count($request->session()->get('cart')) : 0;

        $telegram = new Api(env('TELEGRAM_API_TOKEN'));
        $response = $telegram->getMe();

        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();

        return view("app.home-content.index", $data);
    }

    public function infoAction(Request $request)
    {
        $data['good_count_in_cart'] = ($request->session()->has('cart')) ? count($request->session()->get('cart')) : 0;

        return view("app.home-content.info", $data);
    }

    public function portfolioAction(Request $request)
    {
        $data['work_examples'] = WorkExample::orderBy('order', 'ASC')->get();
        $data['good_count_in_cart'] = ($request->session()->has('cart')) ? count($request->session()->get('cart')) : 0;

        return view("app.home-content.porfolio", $data);
    }

    public function psdAction()
    {
        return view("app.home-content.psd");
    }
}
