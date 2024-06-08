<?php

namespace Quocpa44\ComposerKhoiTao\Controller\Admin;

use Quocpa44\ComposerKhoiTao\Common\Controller;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $this->renderAdmin('dashboard');
    }
}
