<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Admin;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\Product;
use Quocpa44\ComposerKhoiTao\Model\User;

class DashboardController extends Controller
{
    private Product $product;
    private User $user;

    
    public function __construct()
    {
        $this->product = new Product();
        $this->user = new User();
    }

    public function dashboard()
    {
        $totalProduct = $this->product->count();
        $totalUser = $this->user->count();


        $this->renderAdmin('dashboard', [
            'totalProduct' => $totalProduct,
            'totalUser' => $totalUser,

        ]);
    }
}
