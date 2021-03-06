<?php
declare (strict_types=1);

namespace think\bit\common;

use Exception;
use think\facade\Db;

/**
 * Trait EditModel
 * @package think\bit\common
 * @property string $model 模型名称
 * @property string $edit_model 分离修改模型名称
 * @property array $post 请求主体
 * @property array $edit_default_validate 默认验证器
 * @property array $edit_validate 验证器
 * @property bool $edit_auto_timestamp 自动更新时间戳
 * @property boolean $edit_switch 是否为状态变更请求
 * @property array $edit_before_result 前置返回结果
 * @property array $edit_condition 默认条件
 * @property array $edit_after_result 后置返回结果
 * @property array $edit_fail_result 新增执行失败结果
 * @method bool editBeforeHooks()
 * @method bool editAfterHooks()
 */
trait EditModel
{
    /**
     * 编辑与状态变更请求
     * @return array
     */
    public function edit(): array
    {
        $model = !empty($this->edit_model) ? $this->edit_model : $this->model;
        validate(array_merge(
            $this->edit_default_validate,
            $this->edit_validate
        ))->check($this->post);

        $this->edit_switch = $this->post['switch'];

        if (!$this->edit_switch && class_exists(app()->parseClass('validate', $this->model))) {
            validate($this->model)->scene('edit')->check($this->post);
        }

        unset($this->post['switch']);

        if ($this->edit_auto_timestamp) {
            $this->post['update_time'] = time();
        }

        if (method_exists($this, 'editBeforeHooks') && !$this->editBeforeHooks()) {
            return $this->edit_before_result;
        }

        return !Db::transaction(function () use ($model) {
            $condition = $this->edit_condition;

            if (!empty($this->post['id'])) {
                $condition[] = ['id', '=', $this->post['id']];
            } else {
                $condition = array_merge(
                    $condition,
                    $this->post['where']
                );
            }

            unset($this->post['where']);
            $result = Db::name($model)
                ->where($condition)
                ->update($this->post);

            if (!$result) {
                return false;
            }

            if (method_exists($this, 'editAfterHooks') && !$this->editAfterHooks()) {
                $this->edit_fail_result = $this->edit_after_result;
                Db::rollBack();
                return false;
            }

            return true;
        }) ? $this->edit_fail_result : [
            'error' => 0,
            'msg' => 'ok'
        ];
    }
}
