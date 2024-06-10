<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Client;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
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

    public function add()
    { // thêm vào giỏ hàng
        // Lấy thông tin sản phẩm theo ID
        $product = $this->product->findByID($_GET['productID']);

        // Khởi tạo SESSION cart
        // Check n đang đang đăng nhập hay không
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        if (!isset($_SESSION[$key][$product['id']])) {

            $_SESSION[$key][$product['id']] = $product + ['quantity' => $_GET['quantity'] ?? 1];
        } else {

            $_SESSION[$key][$product['id']]['quantity'] += $_GET['quantity'];
        }

        // Nếu mà nó đăng nhập thì mình phải lưu n vào trong csdl

        if (isset($_SESSION['user'])) {
            $conn = $this->cart->getConnection();

            // $conn->beginTransaction();
            try {

                $cart = $this->cart->findByUserID($_SESSION['user']['id']);

                if (empty($cart)) {
                    $this->cart->insert([
                        'user_id' => $_SESSION['user']['id']
                    ]);
                }

                $cartID = $cart['id'] ?? $conn->lastInsertId();

                $_SESSION['cart_id'] = $cartID;

                // $this->cartDetail->deleteByCartID($cartID);

                foreach ($_SESSION[$key] as $productID => $item) {
                    $this->cartDetail->insert([
                        'cart_id' => $cartID,
                        'product_id' => $productID,
                        'quantity' => $item['quantity']
                    ]);
                }
            } catch (\Throwable $th) {
                // echo $th->getMessage();die;
                //throw $th;
            }
        }

        header('Location: ' . url('product/' . $_GET['productID']));
        exit;
    }
}