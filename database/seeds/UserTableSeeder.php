<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 调用模型关系方法
        //‘’中的内容不会用到：：class 这样的方式
        //each 指foreach循环 function中的参数默认指foreach value as key 中的key 及当前执行的添加的行
        // 其中模型中的articles指定了一对多的关系，默认指向user_id
        factory('App\User',20)->create()->each(function($user){
          //一对一关系函数->save()指一对一关系创建，创建内容为：factory->make() 指定内容
          $user->Articles()->save(factory('App\Articles')->make());
        });
    }
}
