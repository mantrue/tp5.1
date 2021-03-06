<?php

namespace app\api\model;


use think\Model;
use think\model\concern\SoftDelete;

class BaseModel extends Model
{
    protected $autoWriteTimestamp = true; // create_time，update_time自动写入时间戳

    // 软删除，设置后在查询时要特别注意whereOr
    // 使用whereOr会将设置了软删除的记录也查询出来
    // 可以对比下SQL语句，看看whereOr的SQL
    use SoftDelete;
    protected $deleteTime = 'delete_time';
//    protected $defaultSoftDelete = 0;  // 不能使用，否则查询不出来数据

    protected $hidden = ['delete_time'];

    // 关联Image模型
    public function img()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }

    // 给类型为本地的图片加上图片前缀
    protected function prefixImgUrl($value, $data)
    {
        $finalUrl = $value;
        if ($data['from'] == 1) { // 本地图片，拼接上域名
            $finalUrl = config('setting.img_prefix') . $value;
        }
        return $finalUrl;
    }
}
