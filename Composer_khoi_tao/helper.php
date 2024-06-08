<?php

const PATH_ROOT = __DIR__ . '/';

if (!function_exists('asset')) {
    function asset($path)
    {
        return $_ENV['BASE_URL'] . $path;
    }
}


if (!function_exists('url')) {
    function url($uri = null)
    {
        return $_ENV['BASE_URL'] . $uri;
    }
}

// if (!function_exists('show_upload')) {
//     function show_upload($path)
//     {
//         return $_ENV['BASE_URL'] . ' /assets/ '. $path;
//     }
// }

if (!function_exists('is_logged')) { // Kiểm tra xem đã đăng nhập hay chưa
    // Nếu rồi thì khơir tạo SESSION

    function is_logged()
    {
        return (isset($_SESSION['user']));
    }
}

if (!function_exists('is_admin')) { // Kiểm tra xem có phải là tìa khoản ADMIN không ?
    // Nếu rồi thì khơir tạo SESSION

    function is_admin()
    {
        return is_logged() && $_SESSION['user']['type'] == 'admin';
    }
}


if (!function_exists('avoid_formLogin')) { // Nếu đã đăng nhập rồi thì KHÔNG THỂ VÀO LẠI TRANG LOGIN NỮA
    // Nếu rồi thì khơir tạo SESSION

    function avoid_formLogin()
    {
        if(is_logged()){

            if($_SESSION['user']['type'] == 'admin'){
                header('Location:' . url('admin/'));
                exit();
            }else{
                header('Location:' . url());
                exit();
            }

        }
       
    }
}

