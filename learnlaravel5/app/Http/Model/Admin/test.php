<?php
/**
 * Created by PhpStorm.
 * User: 梁烨
 * Date: 2017/8/22
 * Time: 20:45
 */

namespace app\Http\Models;


use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    const TABLE_NAME="userinfo";
    protected $table = self::TABLE_NAME;
    public $timestamps = false;
}