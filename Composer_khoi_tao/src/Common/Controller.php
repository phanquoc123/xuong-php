<?php

namespace Quocpa44\ComposerKhoiTao\Common;

use eftec\bladeone\BladeOne;

class Controller
{

    public function renderClient($view, $data = [])
    { // $data là dữ liệu được truyền vào 
        $templatePath = __DIR__ . '/../View/Client';
        $compiledPath = __DIR__ . '/../View/compiles';
        $blade = new BladeOne($templatePath, $compiledPath);

        echo $blade->run($view, $data);
        // Để hiện thị thông tin thì phải viết đúng biến đó là KEY CỦA ARRAY NÀY 

        // Tham số thứ 1  là tên file trong View , nếu dùng cái BladeOne thì phải đặt tên file kèm .blade 
        // Tham số thứ 2 là mảng để hiển thị ra các thông tin
    }
    public function renderAdmin($view, $data = [])
    {
        $templatePath = __DIR__ . '/../View/Admin';
        $compiledPath = __DIR__ . '/../View/compiles';
        $blade = new BladeOne($templatePath, $compiledPath);

        echo $blade->run($view, $data);
    }
}
