<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('111111'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Articles::class,function (Faker $faker){
  return [
    'article_title' => $faker->catchPhrase,
    //固定text的最大长度
    'article_contents' => $faker->text($catchPhrase=180),
    'article_body' => $faker->randomHtml(),
    'img' => function(){
      $rand=rand(1,9);
      $imgarr=array('1'=>'201710092230328068.jpg','2'=>'201710141113576105.jpg',
      '3'=>'201710141113576104.jpg','4'=>'201710141210222912.jpg','5'=>'201710141210076862.jpg');
      if($rand<6){
        return $imgarr[$rand];
      }
    }
  ];
});

//后他用户数据模型工厂
$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
