<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;

class CheckoutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService,
                                    OrderDetailServiceInterface $orderDetailService)
    {
            $this->orderService = $orderService;
            $this->orderDetailService = $orderDetailService;

    }
  
    public function index() {
        
        $carts = Cart::content();

        // return $carts;
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('front.checkout.index', [
            'carts' => $carts,
            'total' => $total,
            'subtotal' => $subtotal,
        ]);
    }

    public function addOrder(Request $request) {
            $order = $this->orderService->create($request->all());

            $carts = Cart::content();

            foreach( $carts as $cart ) {
                $data = [
                    'order_id' => $order->id,
                    'product_id' => $cart->id, 
                    'qty' => $cart->qty,
                    'amount' => $cart->price,
                    'total' => $cart->qty  * $cart->price,
                
                ];

                $this->orderDetailService->create($data);
            }
            if ($request->payment_type == 'pay_later') {
                $total  = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal);
            }
          
        Cart::destroy();
       

        return redirect('checkout/result')
        ->with('notification', 'Bạn đã hoàn thành đặt hàng , vui lòng kiểm tra lại email');
    }

    public function result() {

        $notification = session('notification');
        return view('front.checkout.result', [
                    'notification'  => $notification,
        ]); 
    }

    public function sendEmail($order, $total, $subtotal) {
        $email_to = $order->email;
        
        Mail::send('front.checkout.email', [
            'order' => $order,
            'total' => $total,
            'subtotal' => $subtotal,

        ],
            function ($message) use ($email_to) {
                    $message->from('edwardknight022@gmail.com', 'HungPham_Restau');
                    $message->to($email_to, $email_to);
                    $message->subject('Order Notification');
            }  
        );
    }
}
