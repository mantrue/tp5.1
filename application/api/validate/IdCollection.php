<?php

namespace app\api\validate;


class IdCollection extends BaseValidate
{
    // 千万不要在require | checkIDS中加空格
    // 不然你会哭的
    // 源码中是没有去处多余空格的判断的
    // 这将导致验证不执行
    protected $rule = [
        'ids' => 'require|checkIds'
    ];

    protected $message = [
        'ids' => 'ids参数必须为以逗号分隔的多个正整数,仔细看文档啊'
    ];

    protected function checkIds($value)
    {
        $values = explode(',', $value);
        if (empty($values)) {
            return false;
        }
        foreach ($values as $id) {
            if (!$this->isPositiveInteger($id)) {
                // 必须是正整数
                return false;
            }
        }
        return true;
    }

}