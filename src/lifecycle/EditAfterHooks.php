<?php
declare (strict_types=1);

namespace think\bit\lifecycle;

/**
 * Interface EditAfterHooks
 * @package think\bit\lifecycle
 * @deprecated
 */
interface EditAfterHooks
{
    /**
     * 后置处理
     * @return bool
     */
    public function editAfterHooks(): bool;
}