<?php


namespace Quocpa44\ComposerKhoiTao\Controller\Client;


use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\Category;
use Quocpa44\ComposerKhoiTao\Model\Product;

class HomeController extends Controller
{

    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }
    public function index()
    {
        $categories = $this->category->getAll();
        [$products, $totalPage] = $this->product->paginateDashboard($_GET['page'] ?? 1);

        $this->renderClient('home', [
            'products' => $products,
            'categories' => $categories,
            'totalPage' => $totalPage,
            'page' => $_GET['page'] ?? 1,
        ]);
    }
}
