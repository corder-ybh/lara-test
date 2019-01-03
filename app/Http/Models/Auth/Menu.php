<?php
/**
 * 菜单模型
 * Date: 2018/12/17
 * Time: 16:25
 */

namespace App\Http\Models\Auth;

use App\Http\Utils\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = "fam_menu";
    protected $primaryKey = "id";

    /**
     * 根据权限码获取菜单
     * @param $actionCodeString
     */
    public function getMenuByActionCode($actionCodeString)
    {
        if (empty($actionCodeString)) {
            return false;
        }

        $sql = "/*根据权限码获取菜单*/
                SELECT * FROM fam.fam_menu fm WHERE fm.action_code IN ($actionCodeString)
                    UNION (
                SELECT fmp.* FROM fam.fam_menu fm 
                    INNER JOIN fam.fam_menu fmp ON fm.parent_id = fmp.id
                    WHERE fm.action_code IN ($actionCodeString))
                    UNION (
                SELECT fmr.* FROM fam.fam_menu fm
                    INNER JOIN fam.fam_menu fmr ON fm.root_id = fmr.id
                    WHERE fm.action_code IN ($actionCodeString))";
        $selectArr = DB::select($sql);

        $res = Utils::getAll($selectArr);
        return $res;
    }

    /**
     * 管理员时，获取所有的菜单项
     */
    public function getAllMenu()
    {
        $sql = "/*获取所有的菜单*/
                SELECT * FROM fam.fam_menu";
        $selectArr = DB::select($sql);
        $res = Utils::getAll($selectArr);
        return $res;
    }
}