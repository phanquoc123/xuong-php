<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Admin;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\Category;
use Quocpa44\ComposerKhoiTao\Model\User;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        [$categories, $totalPage] = $this->category->paginateCategories($_GET['page'] ?? 1);

        $this->renderAdmin('categories.index', [
            'categories' => $categories,
            'totalPage' => $totalPage,
            'page' => $_GET['page'] ?? 1,
        ]);
    }

    public function create()
    {
        $this->renderAdmin('categories.create');
    }
    public function store()
    {
        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [

            'name' => 'required|max:100',

        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/categories/create'));
            exit;
        } else {
            $data = [

                'name' => $_POST['name'],

            ];

            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function edit($id)
    {
        $category = $this->category->findByID($id);
        $this->renderAdmin('categories.edit', [
            'category' => $category,
        ]);
    }

    public function update($id)
    {
        $category = $this->category->findByID($id);
        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [

            'name' => 'required|max:100',

        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/{$category['id']}/edit"));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],
            ];

            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url("admin/categories/{$category['id']}/edit"));
            exit;
        }
    }
}
