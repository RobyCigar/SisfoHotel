<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

/**
 * @params: array $params
 * @return: string
 * $params = [
 *  'id',
 *  'total_price'
 *  'username',
 *  'email',
 *  'phone',
 *  'room_name'
 *  'room_id'
 * ] 
 */

class CreateSnapTokenService extends Midtrans {
    
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken() {
        $this->_configureMidtrans();
        // dd((int)$this->order->total_price);
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->id,
                'gross_amount' => (int) $this->order->total_price,
            ],
            'item_details' => [
                [
                    'id' => $this->order->room_id,
                    'price' => $this->order->total_price,
                    'quantity' => 1,
                    'name' => (int) $this->order->room_name,
                ],
            ],
            'customer_details' => [
                'first_name' => $this->order->username,
                'email' => $this->order->email,
                'phone' => $this->order->phone ?? '085726394401',
            ],
        ];


        $snapToken = Snap::getSnapToken($params);

        return $snapToken;


    }
}