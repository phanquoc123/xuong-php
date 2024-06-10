<?php


namespace Quocpa44\ComposerKhoiTao\Controller\Client;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\Category;
use Quocpa44\ComposerKhoiTao\Model\Product;

class ProductController extends Controller
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

        $categories             = $this->category->getAll();
        [$products, $totalPage] = $this->product->paginateShop($_GET['page'] ?? 1);

        $this->renderClient('product', [

            'categories' => $categories,
            'products' => $products,
            'totalPage' => $totalPage,
            'page' => $_GET['page'] ?? 1,
        ]);
    }

    public function productByCate($category)
    {
        $categories             = $this->category->getAll();
        $proByCate = $this->product->productByCategory($category);
       
        
        $this->renderClient('productByCate', [
            'categories' => $categories,
            'proByCate' => $proByCate,
            'page' => $_GET['page'] ?? 1,
        ]);
    }

    public function detail($id)
    {
       
        $product = $this->product->findByIDcate($id);

       
        if ($product) {
       
            $proByCate = $this->product->productByCategoryID($product['id'], $product['category_id']);
           
            
            return $this->renderClient('product-detail', [
                'product' => $product,
                'proByCate' => $proByCate,
            ]);
       
        }
        
    }
}
