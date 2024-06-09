<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Admin;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }


    public function index()
    {


        [$user, $totalPage] = $this->user->paginateUser($_GET['page'] ?? 1);

        $this->renderAdmin('user.index', [
            'user' => $user,
            'totalPage' => $totalPage,
            'page' => $_GET['page'] ?? 1,
        ]);
    }

    public function create()
    {
        $this->renderAdmin('user.create');
    }
    public function store()
    {
        $validator = new Validator();


        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
            'type'                  => 'required|in:admin,member',
            'avatar'                => 'required|uploaded_file:0,2M,png,jpeg',

        ]);


        $validation->validate();

        if ($validation->fails()) {

            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header("Location:" . url('admin/users/create'));
        } else {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'type' => $_POST['type'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),

            ];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {

                    $data['avatar'] = $to;
                } else {

                    $_SESSION['errors']['avatar'] = 'Upload khong thanh cong ';

                    header("Location:" . url('admin/users/create'));
                    exit();
                }
            }

            $this->user->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';
            header("Location:" . url('admin/users'));
            exit();
        }
    }

    public function show($id)
    {
        $user = $this->user->findByID($id);


        $this->renderAdmin('user.show', [
            'user' => $user,
        ]);
    }

    public function delete($id)
    {

        try {
            $user = $this->user->findByID($id);
            $this->user->delete($id);

            if ($user['avatar'] && file_exists(PATH_ROOT . $user['avatar'])) {
                unlink(PATH_ROOT . $user['avatar']);
                $_SESSION['status'] = true;
                $_SESSION['msg'] = 'Thao tac thanh cong';
            }
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tac KHONG thanh cong';
        }

        header('Location:' . url('admin/users'));
        exit();
    }

    public function edit($id)
    {
        $user =  $this->user->findByID($id);
        $this->renderAdmin('user.edit', [
            'user' => $user,
        ]);
    }

    public function update($id)
    {
        $user =  $this->user->findByID($id);

        $validator = new Validator();


        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:100',
            'email'                 => 'required|email',
            'password'              => 'min:6',
            'avatar'                => 'uploaded_file:0,2M,png,jpeg',
            'type'                  => 'in:admin,member',

        ]);

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header("Location:" . url("admin/users/{$user['id']}/edit"));
            exit();
        } else {

            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'type' => $_POST['type'],
                'password' => !empty($_POST['password'])
                    ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],

            ];



            $flagUpload = false;

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {

                    $data['avatar'] = $to;
                } else {

                    $_SESSION['errors']['avatar'] = 'Upload khong thanh cong ';

                    header("Location:" . url("admin/users/{$user['id']}/edit"));
                    exit();
                }
            }
        }


        $this->user->update($id, $data);
        if (
            $flagUpload
            && $user['avatar']
            && file_exists(PATH_ROOT . $user['avatar'])
        ) {
            unlink(PATH_ROOT . $user['avatar']);
        }

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tac thanh cong';

        header('Location:' . url("admin/users/{$user['id']}/edit"));
        exit();
    }
}
