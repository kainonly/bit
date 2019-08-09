## GetModel 获取单个数据

GetModel 是针对获取单条数据的通用请求处理

```php
trait GetModel
{
    public function get()
    {
        $validate = validate($this->get_default_validate);
        if (!$validate->check($this->post)) {
            return [
                'error' => 1,
                'msg' => $validate->getError()
            ];
        }

        if (method_exists($this, '__getBeforeHooks') &&
            !$this->__getBeforeHooks()) {
            return $this->get_before_result;
        }

        try {
            $condition = $this->get_condition;
            if (isset($this->post['id'])) {
                array_push(
                    $condition,
                    ['id', '=', $this->post['id']]
                );
            } else {
                $condition = array_merge(
                    $condition,
                    $this->post['where']
                );
            }

            $data = Db::name($this->model)
                ->where($condition)
                ->field($this->get_field)
                ->withoutField($this->get_without_field)
                ->find();

            return method_exists($this, '__getCustomReturn') ?
                $this->__getCustomReturn($data) : [
                    'error' => 0,
                    'data' => $data
                ];
        } catch (\Exception $e) {
            return [
                'error' => 1,
                'msg' => (string)$e->getMessage()
            ];
        }
    }
}
```

- **id** `int|string`
- **where** `array`，必须使用数组方式来定义

!> 条件查询：请求可使用 **id** 或 **where** 字段进行查询，二者选一即可

```php
// 正常情况
$this->post['where'] = [
    ['name', '=', 'van']
];

// JSON 查询
$this->post['where'] = [
    ['extra->nickname', '=', 'kain']
];
```

#### 引入特性

需要定义必须的操作模型 **model**

```php
use think\bit\traits\GetModel;

class AdminClass extends Base {
    use GetModel;

    protected $model = 'admin';
}
```

#### 自定义获取验证器

自定义删除验证器为 **get_validate**，默认为

```php
protected $get_validate = [
    'id' => 'require'
];
```

也可以在控制器中针对性修改

```php
use think\bit\traits\GetModel;

class AdminClass extends Base {
    use GetModel;

    protected $model = 'admin';
    protected $get_validate = [
        'id' => 'require',
        'name' => 'require'
    ];
}
```

#### 判断是否有前置处理

如自定义前置处理，则需要调用生命周期 **GetBeforeHooks**

```php
use think\bit\traits\GetModel;
use think\bit\lifecycle\GetBeforeHooks;

class AdminClass extends Base implements GetBeforeHooks {
    use GetModel;

    protected $model = 'admin';

    public function __getBeforeHooks()
    {
        return true;
    }
}
```

**__getBeforeHooks** 的返回值为 `false` 则在此结束执行，并返回 **get_before_result** 属性的值，默认为：

```php
protected $get_before_result = [
    'error' => 1,
    'msg' => 'error:before_fail'
];
```

在生命周期函数中可以通过重写自定义前置返回

```php
use think\bit\traits\GetModel;
use think\bit\lifecycle\GetBeforeHooks;

class AdminClass extends Base implements GetBeforeHooks {
    use GetModel;

    protected $model = 'admin';

    public function __getBeforeHooks()
    {
        $this->get_before_result = [
            'error'=> 1,
            'msg'=> 'error:only'
        ];
        return false;
    }
}
```

#### 固定条件

如需要给接口在后端就设定固定条件，只需要重写 **get_condition**，默认为

```php
protected $get_condition = [];
```

例如加入企业主键限制

```php
use think\bit\traits\GetModel;

class AdminClass extends Base {
    use GetModel;

    protected $model = 'admin';
    protected $get_condition = [
        ['enterprise', '=', 1]
    ];
}
```

#### 指定返回字段

如需要给接口指定返回字段，只需要重写 **get_field** 或 **get_without_field**，默认为

```php
protected $get_field = [];
protected $get_without_field = ['update_time', 'create_time'];
```

!> **get_field** 即指定显示字段，**get_without_field** 为排除的显示字段，二者无法共用

例如返回除 **update_time** 修改时间所有的字段

```php
use think\bit\traits\GetModel;

class AdminClass extends Base {
    use GetModel;

    protected $model = 'admin';
    protected $get_without_field = ['update_time'];
}
```

#### 自定义返回结果

如自定义返回结果，则需要调用生命周期 **GetCustom**

```php
use think\bit\traits\GetModel;
use think\bit\lifecycle\GetCustom;

class AdminClass extends Base implements GetCustom {
    use GetModel;

    protected $model = 'admin';

    public function __getCustomReturn($data)
    {
        return json([
            'error' => 0,
            'data' => $data
        ]);
    }
}
```

**__getCustomReturn** 需要返回整体的响应结果

```php
return json([
    'error' => 0,
    'data' => $data
]);
```

- **data** `array` 原数据