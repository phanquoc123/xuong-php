<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Client;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Model\Cart;
use Quocpa44\ComposerKhoiTao\Model\CartDetail;
use Quocpa44\ComposerKhoiTao\Model\Product;

class CartController extends Controller
{

    private Product $product;
    private Cart $cart;
    private CartDetail $cartDetail;

    public function __construct()
    {
        $this->product = new Product();
        $this->cart = new Cart();
        $this->cartDetail = new CartDetail();
    }
    public function detail()
    {
        $this->renderClient('cart');
    }
    public function add()
    {
        // thêm vào giỏ hàng
        // lấy thông tin sản phẩm theo ID
        $product = $this->product->findByID($_GET['productID']);
    }
}
