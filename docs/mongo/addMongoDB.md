# AddMongoDB

AddMongoDB 是针对新增数据的通用请求处理，仅支持 MongoDB PHP Library

#### 周期流程

执行通用请求 -> 验证器场景 -> (是否前置处理) -> 通用处理 -> (是否后置处理) -> 返回通用处理请求

#### 引入特性

必须定义模型名称

```php
use think\bit\traits\AddMongoDB;

class NoBodyClass extends Base {
    use AddMongoDB;

    protected $model = 'nobody';
}
```

需要对应创建验证器场景 `validate/NoBodyClass`

```php
use think\Validate;

class NoBodyClass extends Validate
{
    protected $rule = [
        'name' => 'require',
    ];

    protected $scene = [
        'add' => ['name'],
    ];
}
```

#### overrides __addBeforeHooks()

自定义前置处理

#### $this->add_before_result

新增自定义前置返回，默认为 `['error' => 1,'msg' => 'fail:before']`

#### overrides __addAfterHooks($pk)

自定义后置处理

#### $this->add_after_result

新增自定义后置返回，默认为 `['error' => 1,'msg' => 'fail:after']`

#### 返回数据

- `error` 响应状态
- `msg` 回馈代码