<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2019/10/17
 * Time: 3:55 PM
 */

namespace app\api\controller\v1;


use think\Controller;

class Goods extends Controller
{
    public function getRecent()
    {
        return show('getRecent', 200);
    }

    public function getOne($id)
    {
        return show('getOne' . $id, 200);
    }

}
