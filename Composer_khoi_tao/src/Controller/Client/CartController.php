<?php


namespace Quocpa44\ComposerKhoiTao\Controller\Client;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\Cart;
use Quocpa44\ComposerKhoiTao\Model\CartDetail;
use Quocpa44\ComposerKhoiTao\Model\Product;

class CartController extends Controller
{
    public function detail()
    { 
        $this->renderClient('cart');
    }
}



?>