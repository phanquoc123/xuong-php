<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Client;

use Quocpa44\ComposerKhoiTao\Common\Controller;

class CartController extends Controller
{
    public function detail()
    {
        $this->renderClient('cart');
    }
}
