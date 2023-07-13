<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
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
