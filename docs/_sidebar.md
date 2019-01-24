* Middleware 中间件
  * [CORS 跨站访问](middleware/cors)

* Abstract 抽象类
  * [BitController 通用控制器](abstract/bitController)
  * [Bedis 缓存定义](abstract/bedis)

* Bedis 缓存类
  * [SmsString 短信验证](bedis/smsString)

* Facade 门面
  * [Redis 缓存](facade/redis)
  * [Rabbit 消息队列](facade/rabbit)
  * [Cipher 加密](facade/cipher)
  * [Tools 工具](facade/tools)
  * [Lists 列表数组](facade/lists)

* CURD 请求处理库
  * traits 特性引用
    * [GetModel 获取单个数据](traits/getModel)
    * [OriginListsModel 获取列表数据](traits/originListsModel)
    * [ListsModel 获取分页数据](traits/listsModel)
    * [AddModel 新增数据](traits/addModel)
    * [EditModel 编辑数据](traits/editModel)
    * [DeleteModel 删除数据](traits/deleteModel)
  * lifecycle 生命周期
    * [GetBeforeHooks](lifecycle/getBeforeHooks)
    * [GetCustom](lifecycle/getCustom)
    * [ListsBeforeHooks](lifecycle/listsBeforeHooks)
    * [ListsCustom](lifecycle/listsCustom)
    * [OriginListsBeforeHooks](lifecycle/originListsBeforeHooks)
    * [OriginListsCustom](lifecycle/originListsCustom)
    * [AddBeforeHooks](lifecycle/addBeforeHooks)
    * [AddAfterHooks](lifecycle/addAfterHooks)
    * [EditBeforeHooks](lifecycle/editBeforeHooks)
    * [EditAfterHooks](lifecycle/editAfterHooks)
    * [DeleteBeforeHooks](lifecycle/deleteBeforeHooks)
    * [DeletePrepHooks](lifecycle/deletePrepHooks.md)
    * [DeleteAfterHooks](lifecycle/deleteAfterHooks)