<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Admin;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\Category;
use Quocpa44\ComposerKhoiTao\Model\Product;
use Quocpa44\ComposerKhoiTao\Model\User;
use Rakit\Validation\Validator;

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
        $categories = $this->category->getAll();

        $categoryPluck = array_column($categories, 'name', 'id');

        $products = [];
        $totalPage = 0;
        if (isset($_GET['keyword'])) {
            $products = $this->product->search($_GET['keyword'], $_GET['category']);
        } else {
            [$products, $totalPage] = $this->product->paginateAdmin($_GET['page'] ?? 1, $perPage = 5, $_GET['asc'] ?? 'desc');
        }

        $this->renderAdmin('products.index', [
            'categoryPluck' => $categoryPluck,
            'products' => $products,
            'totalPage' => $totalPage,
            'page' => $_GET['page'] ?? 1,
        ]);
    }

    public function create()
    {
        $categories = $this->category->getAll();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderAdmin('products.create', [
            'categoryPluck' => $categoryPluck
        ]);
    }
    public function show($id)
    {
        $product = $this->product->findByID($id);
        $this->renderAdmin('products.show', [
            'product' => $product,
        ]);
    }


    public function store()
    {
        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'category_id' => 'required',
            'name' => 'required|max:100',
            'price_regular' => 'required',
            'price_sale' => 'required|',
            'overview' => 'required|max:500',
            'content' => 'required|max:65000',
            'img_thumbnail' => 'required|uploaded_file:0,2048K,png,jpeg,jpg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/products/create'));
            exit;
        } else {
            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'price_regular' => $_POST['price_regular'],
                'price_sale' => $_POST['price_sale'],
                'overview' => $_POST['overview'],
                'content' => $_POST['content'],
            ];

            if (!empty($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload KHÔNG thành công!';

                    header('Location: ' . url('admin/products/create'));
                    exit;
                }
            }

            $this->product->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url('admin/products'));
            exit;
        }
    }

    public function delete($id)
    {

        try {
            $product = $this->product->findByID($id);
            $this->product->delete($id);

            if ($product['img_thumbnail'] && file_exists(PATH_ROOT . $product['img_thumbnail'])) {
                unlink(PATH_ROOT . $product['img_thumbnail']);
                $_SESSION['status'] = true;
                $_SESSION['msg'] = 'Thao tác thành công';
            }
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công';
        }
        header('Location: ' . url('admin/products'));
        exit();
    }

    public function edit($id)
    {

        $product = $this->product->findByID($id);
        $categories = $this->category->getAll();

        $categoryPluck = array_column($categories, 'name', 'id');
        $this->renderAdmin('products.edit', [
            'product' => $product,
            'categoryPluck' => $categoryPluck,

        ]);
    }

    public function update($id)
    {
        $product = $this->product->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'category_id' => 'required',
            'name' => 'required|max:100',
            'price_regular' => 'required',
            'price_sale' => 'required|',
            'overview' => 'required|max:500',
            'content' => 'required|max:65000',
            'img_thumbnail' => 'uploaded_file:0,2048K,png,jpeg,jpg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/products/{$product['id']}/edit"));
            exit;
        } else {
            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'price_regular' => $_POST['price_regular'],
                'price_sale' => $_POST['price_sale'],
                'overview' => $_POST['overview'],
                'content' => $_POST['content'],
                'updated_at' => date('Y-m-d H:i:s', time() + 7 * 3600)
            ];

            $flagUpload = false;

            if (!empty($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload KHÔNG thành công!';

                    header('Location: ' . url("admin/products/{$product['id']}/edit"));
                    exit;
                }
            }


            $this->product->update($id, $data);

            if (
                $flagUpload
                && $product['img_thumbnail']
                && file_exists(PATH_ROOT . $product['img_thumbnail'])
            ) {
                unlink(PATH_ROOT . $product['img_thumbnail']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url("admin/products/{$product['id']}/edit"));
            exit;
        }
    }
}
