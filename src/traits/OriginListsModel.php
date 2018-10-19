<?php

namespace think\bit\traits;

use think\Db;
use think\db\Query;
use think\Exception;
use think\bit\validate;

trait OriginListsModel
{
    public function originLists()
    {
        $validate = new validate\Lists;
        if (!$validate->scene('origin')->check($this->post)) return [
            'error' => 1,
            'msg' => $validate->getError()
        ];

        try {
            $condition = $this->lists_origin_condition;
            if (isset($this->post['where'])) $condition = array_merge(
                $condition, $this->post['where']
            );
            $like = function (Query $query) {
                if (isset($this->post['like'])) foreach ($this->post['like'] as $key => $like) {
                    if (empty($like['value'])) continue;
                    $query->where($like['field'], 'like', "%{$like['value']}%");
                }
            };
            $lists = Db::name($this->model)
                ->where($condition)
                ->where($like)
                ->field($this->lists_origin_field[0], $this->lists_origin_field[1])
                ->order($this->lists_origin_orders)
                ->select();
            if (method_exists($this, '__originListsCustomReturn')) {
                return $this->__originListsCustomReturn($lists);
            } else {
                return [
                    'error' => 0,
                    'data' => $lists
                ];
            }
        } catch (Exception $e) {
            return [
                'error' => 1,
                'msg' => (string)$e->getMessage()
            ];
        }
    }
}