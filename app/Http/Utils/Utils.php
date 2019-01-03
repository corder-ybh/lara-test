<?php
/**
 * 数组工具类
 * Date: 2018/12/21
 * Time: 15:19
 */

namespace App\Http\Utils;

class Utils
{
    /**
     * collection 分组
     * @param $arr
     * @param $key_field
     * @return \Illuminate\Support\Collection
     */
    static public function groupBy($arr, $key_field)
    {
        $ret = collect();
        foreach ($arr as $k => $v) {
            $key = $v->$key_field;
            if ($ret->get($key)) {
                $ret->get($key)->detail->push($v);
                $ret->get($key)->fatherRoleName = $v->parent_name;
            } else {
                $ret->put($key, collect());
                $ret->get($key)->detail = collect();
                $ret->get($key)->detail->push($v);
                $ret->get($key)->fatherRoleName = $v->parent_name;
            }
        }

        return $ret;
    }

    /**
     * collection查询结果转换为树形结构
     * @param $list
     * @param $keyNodeId
     * @param string $keyParentId
     * @param string $childName
     * @return \Illuminate\Support\Collection
     */
    static public function toTree($list, $keyNodeId, $keyParentId = 'parent_id', $childName = 'pri_list')
    {
        $list = $list->groupBy($keyNodeId);

        $tree = collect();
        foreach ($list as $key => $value) {
            $row = $value->first();
            $row->$childName = collect();
            $parentId = $row->$keyParentId;
            if ($parentId) {
                if (empty($tree->get($parentId))) {
                    $tree->put($row->$keyParentId, $row);
                }
                $tree->get($parentId)->$childName->push($row);
            } else {
                $tree->put($row->$keyNodeId, $row);
            }
        }
        return $tree;
    }

    /**
     * 普通二维数组转为树形结构数组
     * @param $arr
     * @param $key_node_id
     * @param string $key_parent_id
     * @param string $key_childrens
     * @param null $refs
     * @return array
     */
    static public function arrayToTree(
        $arr,
        $key_node_id,
        $key_parent_id = 'parent_id',
        $key_childrens = 'childrens',
        & $refs = null
    ) {
        $refs = array();
        foreach ($arr as $offset => $row) {
            $arr[$offset][$key_childrens] = array();
            $refs[$row[$key_node_id]] =& $arr[$offset];
        }

        $tree = array();
        foreach ($arr as $offset => $row) {
            $parent_id = $row[$key_parent_id];
            if ($parent_id) {
                if (!isset($refs[$parent_id])) {
                    $tree[] =& $arr[$offset];
                    continue;
                }
                $parent =& $refs[$parent_id];
                $parent[$key_childrens][] =& $arr[$offset];
            } else {
                $tree[] =& $arr[$offset];
            }
        }

        return $tree;
    }

    /**
     * DB原生返回值中取某一列的值，返回一个一维数组
     * @param $res
     * @param $colName
     */
    static public function getCol($arr, $colName)
    {

        if (empty($arr)) {
            return false;
        }

        $res = array_map(function ($obj) {
            return get_object_vars($obj);
        }, $arr);

        foreach ($res as $key => $value) {
            $res[$key] = $value[$colName];
        }
        return $res;
    }

    static public function getAll($arr)
    {

        if (empty($arr)) {
            return false;
        }

        $res = array_map(function ($obj) {
            return get_object_vars($obj);
        }, $arr);

        return $res;
    }
}