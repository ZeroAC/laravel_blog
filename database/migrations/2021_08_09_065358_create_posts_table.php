<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//执行php artisan migrate 将执行该函数 用来迁移数据库
    {
        /**
         * slug：将文章标题转化为 URL 的一部分，以利于SEO
         * title：文章标题
         * content：文章内容
         * published_at：文章正式发布时间
         * deleted_at：用于支持软删除
         */
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('content');
            $table->softDeletes();//创建删除时间(软删除) deleted_at
            $table->timestamp('published_at')->nullable();
            $table->timestamps();//自动创建添加时间和更新时间字段
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//撤销迁移
    {
        Schema::dropIfExists('posts');
    }
}
