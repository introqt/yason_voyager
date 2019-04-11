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
            if (isset($good)) {
                $request->session()->push('cart', $request->id);

                return $array = ['good' => $good, 'good_count_in_cart' => count($request->session()->get('cart'))];
            }
        }

        return false;
    }

    public function showAction(Request $request)
    {
        $need = [];
        $session = $request->session()->get('cart');
        asort($session);
        $array = array_count_values($request->session()->get('cart'));
        $goods = Good::select('id', 'title', 'price')->whereIn('id', array_keys($array))->get()->toArray();

        foreach ($goods as $good => $g) {
            foreach ($array as $id => $count) {
                if ($id === $g['id']) {
                    $need[] = array(
                        'id' => $g['id'],
                        'title' => $g['title'],
                        'price' => $g['price'],
                        'cnt' => $count,
                    );
                }
            }
        }
        return $need;
    }

    public function sendAction(Request $request)
    {
        if ($request->ajax()) {
            $data = "Новый заказ!\n\rИмя заказчика: $request->name\n\r";
            $data .= "Email заказчика: $request->email\n\r";
            $data .= "Соц. сеть заказчика: $request->social\n\r";
            $data .= "Товары:\n\r\n\r";

            $need = [];
            $array = array_count_values($request->session()->get('cart'));
            $goods = Good::select('id', 'title', 'price')->whereIn('id', array_keys($array))->get()->toArray();
            foreach ($goods as $good => $g) {
                foreach ($array as $id => $count) {
                    if ($id === $g['id']) {
                        $need[] = array(
                            'id' => $g['id'],
                            'title' => $g['title'],
                            'price' => $g['price'],
                            'cnt' => $count,
                        );
                    }
                }
            }
            foreach ($need as $item) {
                $data .= "{$item['title']} в количестве {$item['cnt']} по цене {$item['price']} рублей\n\r";
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
