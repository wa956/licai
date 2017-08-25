<?php
namespace App\Http\Model\Admin;
use Illuminate\Database\Eloquent\Model;
class Common extends Model
{

        const TABLE_NAME="userinfo";
        protected $table = self::TABLE_NAME;
        public $timestamps = false;

}