<?php
/**
 * Created by PhpStorm.
 * Date: 2019/1/2
 * Time: 14:09
 */

namespace App\Http\Controllers;
use App\Http\Models\Auth\Menu;
use Illuminate\Support\Facades\Auth;
use App\Http\Utils\Utils;

class indexController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * 首页
     */
    public function index()
    {
        $menuModel = new Menu();
        $permissions = Auth::user()->getAllPermissions();
        $permissionStr = "'" . $permissions->implode('name', "', '") . "'";
        if (Auth::user()->hasPermissionTo('Administer')) {
            $menuCl = $menuModel->getAllMenu();
        } else {
            $menuCl = $menuModel->getMenuByActionCode($permissionStr);
        }

        if (!empty($menuCl)) {
            $menu = Utils::arrayToTree($menuCl, 'id', 'parent_id', 'childMenu');
        } else {
            $menu = array();
        }

        return view('index', compact('menu'));
    }

    public function info()
    {
        return view('info');
    }
}