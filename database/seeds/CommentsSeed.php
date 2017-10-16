<?php

// description comments Seed
// author wooght
// date 2017-10-11

use Illuminate\Database\Seeder;
use App\User;
use App\Comments;
use App\Articles;

class CommentsSeed extends Seeder
{
    /**
     * Run the database seeds.
     * @param Faker\Factory
     * @return void
     */
    public function run()
    {
        $article=Articles::select('id')->get();
        $user=User::select('id')->get();
        $usernum=count($user);
        $faker = \Faker\Factory::create('zh_CN');
        foreach($article as $art){
          $cmtnum=rand(5,40);
          for($i=0;$i<$cmtnum;$i++){
            Comments::create([
              'user_id' =>  rand(1,$usernum),
              'article_id' => $art->id,
              'comment_body' => $faker->text($maxNbChars = 200),
            ]);
            // @method \App\Article::numadd
            // @result reads++,comments++
            Articles::numadd($art->id);
          }
        }
    }
}
