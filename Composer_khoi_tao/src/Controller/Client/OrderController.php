<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Client;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Model\Cart;
use Quocpa44\ComposerKhoiTao\Model\CartDetail;
use Quocpa44\ComposerKhoiTao\Model\Order;
use Quocpa44\ComposerKhoiTao\Model\OrderDetail;
use Quocpa44\ComposerKhoiTao\Model\User;


class OrderController extends Controller
{
    private Cart $cart;
    private CartDetail $cartDetail;
    public Order $order;
    public OrderDetail $orderDetail;
    public User $user;

    public function __construct()
    {
        $this->user          = new User();
        $this->order         = new Order();
        $this->orderDetail   = new OrderDetail();
        $this->cart          = new Cart();
        $this->cartDetail    = new CartDetail();
    }

    public function checkout()
    {
        // Chưa đang nhập thì phải tạo tài khoản
        $userID = $_SESSION['user']['id'] ?? null;
        if (!$userID) {
            $conn = $this->user->getConnection();

            $this->user->insert([
                'name' => $_POST['user_name'],
                'email' => $_POST['user_email'],
                'password' => password_hash($_POST['user_email'], PASSWORD_DEFAULT),
                'type' => 'member',
                'is_active' => 0,
            ]);

            $userID = $conn->lastInsertId();
        }


        // Thêm đữ liệu Vào Order và Order Detail
        $conn = $this->order->getConnection();
        $this->order->insert([
            'user_id' => $userID,
            'user_name' => $_POST['user_name'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'user_address' => $_POST['user_address'],
        ]);

        $orderID = $conn->lastInsertId();

        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        // Helper::debug($_SESSION);

        foreach ($_SESSION[$key] as $productID => $item) {
            $this->orderDetail->insert([
                'order_id' => $orderID,
                'product_id' => $productID,
                'quantity' => $item['quantity'],
                'price_regular' => $item['price_regular'],
                'price_sale' => $item['price_sale'] ?? null,
            ]);
        }

        // Xóa dữ liệu Cart + CartDetail
        $this->cartDetail->deleteByCartID($_SESSION['cart_id']);
        $this->cart->deleteByUserID($_SESSION['cart_id']);

        // Xóa trong SESSION
        unset($_SESSION[$key]);

        if (isset($_SESSION['user'])) {
            unset($_SESSION['cart_id']);
        }


        header('Location: ' . url(''));
        exit;
    }
}
