<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Admin;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\Order;
use Quocpa44\ComposerKhoiTao\Model\Product;
use Quocpa44\ComposerKhoiTao\Model\User;

class DashboardController extends Controller
{
    private Product $product;
    private User $user;
    private Order $order;

    
    public function __construct()
    {
        $this->product = new Product();
        $this->user = new User();
        $this->order = new Order();
    }

    public function dashboard()
    {
        $totalProduct = $this->product->count();
        $totalUser = $this->user->count();
        $totalOrder = $this->order->count();


        $this->renderAdmin('dashboard', [
            'totalProduct' => $totalProduct,
            'totalUser' => $totalUser,
            'totalOrder' => $totalOrder,
            

        ]);
    }
}
