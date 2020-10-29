<?php
declare (strict_types=1);

namespace think\bit\common;

use Closure;
use Exception;
use think\facade\Db;

/**
 * Trait GetModel
 * @package think\bit\common
 * @property string $model 模型名称
 * @property array $post 请求主体
 * @property array $get_default_validate 默认验证器
 * @property array $get_before_result 前置返回结果
 * @property array $get_condition 固定条件
 * @property Closure $get_condition_query 特殊查询
 * @property array $get_field 固定字段
 * @property array $get_without_field 排除字段
 * @property array $get_orders 排序设定
 */
trait GetModel
{
    /**
     * 获取单条数据请求
     * @return array
     */
    public function get(): array
    {
        try {
            validate($this->get_default_validate)
                ->check($this->post);

            if (method_exists($this, 'getBeforeHooks') &&
                !$this->getBeforeHooks()) {
                return $this->get_before_result;
            }

            $condition = $this->get_condition;
            if (!empty($this->post['id'])) {
                $condition[] = ['id', '=', $this->post['id']];
            } else {
                $condition = array_merge(
                    $condition,
                    $this->post['where']
                );
            }

            $orders = $this->get_orders;
            if (!empty($this->post['order'])) {
                $orders = array_merge(
                    $orders,
                    (array)$this->post['order']
                );
            }

            $query = Db::name($this->model)
                ->where($condition)
                ->field($this->get_field)
                ->withoutField($this->get_without_field)
                ->order($orders);

            if (empty($this->get_condition_query)) {
                $data = $query->find();
            } else {
                $data = $query
                    ->where($this->get_condition_query)
                    ->find();
            }

            return method_exists($this, 'getCustomReturn') ?
                $this->getCustomReturn($data) : [
                    'error' => 0,
                    'data' => $data
                ];
        } catch (Exception $e) {
            return [
                'error' => 1,
                'msg' => (string)$e->getMessage()
            ];
        }
    }
}
