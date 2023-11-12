<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    private $productService;
    //
    public function __construct(ProductServiceInterface $productService) {
        $this->productService = $productService; 
    }



    public function index() {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        
        return view('front.shop.cart', [
                'carts' => $carts,
                'total' => $total,
                'subtotal' => $subtotal,
                    ]);
    }


    public function add( Request $request) {
      if($request->ajax()) {
        $product = $this->productService->find($request->productId);

        $response['cart'] = Cart::add ([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->discount ?? $product->price,
            'weight' => $product->weight ?? 0 ,
            'options' => [
                'images' => $product->productImages,
            ],
        ]);
        $response['count'] = Cart::count();
 
        $response['total'] = Cart::total();
        
        return $response;
       // Cart::destroy();// hàm reset giỏ hàng về  0

         //  dd(Cart::Content()); // Hàm này dùng để truy xuất nội dung của giỏ hàng dd()
         // là viết tắt từ dump and die
        // nội dung sẽ được in ra trên trang web và chương trình sẽ dừng lại ngay ở đó.
                                }
        return back();
    }

    public function delete(Request $request) {
        if($request->ajax()) {
            $response['cart'] = Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }

        return back();
    } 
    public function destroy() {
        Cart::destroy();
    }

    public function update(Request $request) {
        if ($request->ajax()) {
            $response['cart'] = Cart::update($request->rowId, $request->qty);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
    }
}
