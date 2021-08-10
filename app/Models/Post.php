<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    /**
     * 测试利用工厂插入模拟数据
     * 学习集合的常见用法
     * @param [type] $num 生成cnt条数据
     * @return void
     * @Author jy
     * @DateTime 2021-08-10 18:06:03
     */
    public function testDatabase($cnt)
    {
        Post::truncate();// 先清理表数据
        $posts = Post::factory()->count($cnt)->create();//利用工厂向数据库插入三条随机数据 
        //返回的为集合类型 和$db = DB::table('posts')->get(); 类型一致
        //均为 Illuminate\Support\Collection 类型
        //1. 返回特定字段组成的数组
        var_dump($posts->pluck('title'));
        //2.易于调试的输出 类json
        $posts->pluck('title')->dump();
        //3. 集合的遍历
        $posts->each(function ($item,$idx){
            var_dump($item['title'],$idx,'<br>');
        });
        $res = ['code' => 200, 'data' => $posts, 'msg' => 'ok'];
        return response()->json($res);
    }
}
