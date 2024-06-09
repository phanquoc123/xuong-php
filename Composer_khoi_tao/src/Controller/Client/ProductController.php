<?php


namespace Quocpa44\ComposerKhoiTao\Controller\Client;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\Product;

class ProductController extends Controller
{

    private Product $product;
    


    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {

        [$products, $totalPage] = $this->product->paginateShop($_GET['page'] ?? 1);

        $this->renderClient('product', [
            'products' => $products,
            'totalPage' => $totalPage,
            'page' => $_GET['page'] ?? 1,
        ]);
    }

    public function detail($id){
        $product = $this->product->findByID($id);

        $this->renderClient('product-detail',[
            'product' => $product
        ]);
    }
}




?>