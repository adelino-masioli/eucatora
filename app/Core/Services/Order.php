<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 05/11/16
 * Time: 14:13
 */

namespace app\Core\Services;

use App\Domains\Orders\OrderItem;
use App\Domains\Products\Product;

class Order
{
    public static function addItem($product_id, $transaction, $array=[]){
        try{
            $order       = Order::where('transaction', $transaction)->first();
            $product     = Product::findOrFail($product_id);
            $item        = OrderItem::where('product_id', $product_id)->where('order_id', $order->order_id);


            if($array['amount'] == 0):
                $msg = ['status' => 2, 'response' => \Lang::get('messages.errorqtdmin')];
                return json_encode($msg);
                exit();
            endif;

            $array = [
                'transaction'      => $transaction,
                'sku'              => $product->warehouse->sku,
                'name'             => $product->name,
                'price'            => $product->price,
                'qtd'              => $array['amount'],
                'subtotal'         => $product->price * $array['amount'],
                'order_id'         => $order->order_id,
                'product_id'       => $product_id
            ];

            if($item->count() == 0) {
                $array = new OrderItem($array);
                if ($array->save()):
                    $order_itens = OrderItem::select('id', 'transaction', 'sku', 'name', 'price', 'qtd', 'subtotal')->where('order_id', $request->order_id)->get();
                    $order->fill(['total' => $order_itens->sum('subtotal'), 'order_status_id' =>2])->save();

                    $msg = ['status' => 1, 'response' => \Lang::get('messages.successaddprod'), 'itens'=>$order_itens, 'total'=>AppHelpers::money_br($order_itens->sum('subtotal'))];
                    return json_encode($msg);
                else:
                    $msg = ['status' => 2, 'response' => \Lang::get('messages.erroraddprod')];
                    return json_encode($msg);
                endif;
            }else{
                if ($item->first()->fill($array)->save()):
                    $order_itens = OrderItem::select('id', 'transaction', 'sku', 'name', 'price', 'qtd','subtotal')->where('order_id', $request->order_id)->get();
                    $order->fill(['total' => $order_itens->sum('subtotal'), 'order_status_id' =>2])->save();
                    $msg = ['status' => 1, 'response' => \Lang::get('messages.successaddprod'), 'itens'=>$order_itens, 'total'=>AppHelpers::money_br($order_itens->sum('subtotal'))];
                    return json_encode($msg);
                else:
                    $msg = ['status' => 2, 'response' => \Lang::get('messages.erroraddprod')];
                    return json_encode($msg);
                endif;
            }

        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.erroraddprod')];
            return json_encode($msg);
        }
    }
    public static function createOrder($transaction){
        $order = Order::where('transaction', $transaction);
        if($order->count() > 0){
            return $order->first()->id;
        }else{
            $customer = Customer::first();
            $array = new Order([
                'transaction'      => $transaction,
                'name'             => $customer->name,
                'total'            => 0.00,
                'discounts'        => 0.00,
                'date'             => date('Y-m-d'),
                'time'             => date('H:i:s'),
                'user_id'          => 9,
                'customer_id'      => $customer->id,
                'order_status_id'  => 1
            ]);
            $array->save();
            return $array->id();
        }
    }
}