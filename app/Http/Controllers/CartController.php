<?php

namespace App\Http\Controllers;

use App\Good;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class CartController extends Controller
{
    public function addAction(Request $request)
    {
        if ($request->ajax()) {
            $good = Good::select('title')->where('id', $request->id)->first();
            if (isset($good)) {                                                           //????
                $request->session()->push('cart', $request->id);

                return $array = ['good' => $good, 'good_count_in_cart' => count($request->session()->get('cart'))];
            }
        }
    }

    public function showAction(Request $request)
    {
        $need = [];
        $array = array_count_values($request->session()->get('cart'));
        $goods = Good::select('id', 'title', 'price')->whereIn('id', array_keys($array))->get()->toArray();
        $i = 0;
        foreach ($array as $id => $count) {
            if ($id == $goods[$i]['id']) {
                $need[] = array(
                    'id' => $goods[$i]['id'],
                    'title' => $goods[$i]['title'],
                    'price' => $goods[$i]['price'],
                    'cnt' => $count,
                );
            }
            $i++;
        }

        return $need;
    }

    public function sendAction(Request $request)
    {
        if ($request->ajax()) {
            $data = "Имя заказчика: $request->name";
            $data .= " Email заказчика: $request->email";
            $data .= " Соц. сеть заказчика: $request->social";
            $data .= " Товары:";

            $need = [];
            $array = array_count_values($request->session()->get('cart'));
            $goods = Good::select('id', 'title', 'price')->whereIn('id', array_keys($array))->get()->toArray();
            $i = 0;
            foreach ($array as $id => $count) {
                if ($id == $goods[$i]['id']) {
                    $need[] = array(
                        'id' => $goods[$i]['id'],
                        'title' => $goods[$i]['title'],
                        'price' => $goods[$i]['price'],
                        'cnt' => $count,
                    );
                }
                $i++;
            }
            foreach ($need as $item) {
                $data .= "{$item['title']} в количестве {$item['cnt']} по цене {$item['price']} рублей; ";
            }
            # 254257411 - чат айди Ярослава
            # 780013967 - мой чат айди
            $telegram = new Api(env('TELEGRAM_API_TOKEN'));
            $telegram->sendMessage([
                'chat_id' => '780013967',
                'text' => $data,
            ]);
            $request->session()->flush();
        }
    }

    public function deleteAction(Request $request)
    {
        if ($request->ajax()) {
            $request->session()->flush(); // почистили сессию
        }
    }
}
