<?php

// @author wooght
// @date 2017-10-14
// @result make comments

use Illuminate\Database\Seeder;
use \Faker\Factory as Faker;
use App\User;
use App\Articles;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //获取用户
        $users=User::select('id')->get();
        // $usersid=[];
        // foreach($users as $user){
        //   $usersid[]=$user->id;
        // }
        //获取文章
        $articlesobj=new Articles;
        $articles=Articles::select('id')->get();
        //$faker = \Faker\Factory::create('zh_CN');
        $faker=Faker::create();//同上一样的效果  Faker $faker 就是工厂模式创建的意思
        foreach ($articles as $art) {
          //随机评论
          $rand=rand(1,40);
          for($i=0;$i<$rand;$i++){
            //写评论 \App\comments  直接访问没有use进来的空间
            \App\Comments::create([
              'user_id' => $users[rand(0,$users->count()-1)]->id,
              'article_id' => $art->id,
              'comment_body' => $faker->text($catchPhrase=180)
            ]);
            $articlesobj->addreads($art->id);
          }
        }

    }
}
