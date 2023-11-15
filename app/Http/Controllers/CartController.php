<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->cart;
//        $user = Cart::query()->find(1)->user;
//        if (!empty())
//        $cart = Cart::query()->create(['user_id' => Auth::user()->id, 'product_id' => $id]);
        return $cart;
        return Product::query()->get(['name', 'cost']);
    }
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function addProduct(int $id)
    {
        // Получаем идентификатор корзины из сессии.
        $cartId = session()->get('cartId');

        // Находим корзину, если ее нет, создаем новую и записываем в сессию.
        if ($cartId === null) {
            $cart = Cart::query()->create();
            Session::put('cartId', $cart->id);
        }

        // Проверяем товар на наличие.
        $product = Product::query()->findOrFail($id);

        // Добавляем товар в корзину и сохраняем.


    }

}
