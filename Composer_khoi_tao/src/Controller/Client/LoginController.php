<?php


namespace Quocpa44\ComposerKhoiTao\Controller\Client;

use Quocpa44\ComposerKhoiTao\Common\Controller;
use Quocpa44\ComposerKhoiTao\Common\Helper;
use Quocpa44\ComposerKhoiTao\Model\User;

class LoginController extends Controller
{

    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }



    public function showFormlogin()
    {

        avoid_formLogin();
        $this->renderClient('login');
    }

    public function login()
    {
        avoid_formLogin();
        try {
            $user =  $this->user->findByEmail($_POST['email']);

            if(empty($user)){
                throw new \Exception('Không tồn tại :' . $_POST['email']);
            }

            $flag = password_verify($_POST['password'], $user['password']);
            if ($flag) {

                $_SESSION['user'] = $user;

                if($user['type'] == 'admin'){
                    header("Location: " . url("admin/"));
                exit(); 
                }else{
                    header("Location: " . url());
                exit(); 
                }

               
            }

            throw new \Exception('Password không đúng');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header("Location: " . url("login"));
             exit();
        }
    }

    public function logout(){
        unset($_SESSION['user']);
        header('Location:' . url());
        exit();
    }
}
