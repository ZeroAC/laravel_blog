<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;//HasFactory 特性提供的静态 factory 方法来实例化该模型的工厂实例：
    //里面所包含的字段，就是当使用这个属性的时候，可以直接后面跟着carbon类时间操作的任何方法
    //如published_at->getTimestamp();
    protected $dates = ['published_at'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        // if (!$this->exists) {
        //     $this->attributes['slug'] = str_slug($value);
        // }
    }
/*  其它配置

    //可自己指定默认绑定的数据表  默认为模型名的复数形式 posts
    // protected $table = 'my_posts';

    //可自己指定主键名 默认为id
    //protected $primaryKey = 'my_id';

    //主键默认为递增的 若为非数字的 则需要以下这行
    //public $incrementing = false;

    //protected $keyType = 'string';//主键非数字则需要执行这行

    //是否主动维护时间戳 created_at 和 updated_at 字段
    // public $timestamps = false;

    //配置其它数据库的连接
    //protected $connection = 'connection-name';

    //为某些字段设置默认值
    //protected $attributes = [
        '字段1' => false, '字段2' => value
    ];
*/
    public function testDatabase()//使用 make 方法创建模型但不将他们保存至数据库中
    {
        Post::truncate();// 先清理表数据
        $posts = Post::factory()->count(3)->create();//利用工厂向数据库插入三条随机数据
        var_dump($posts);
        return response()->json('200');
        // Use model in tests...
    }
}
