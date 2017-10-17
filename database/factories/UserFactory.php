<?php

use Faker\Generator as Faker;

/*
 *@description factory
 *@date 2017-10-10
 *@author wooght
 */

//@description User factory
$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('111111'),
        'remember_token' => str_random(10),
    ];
});

// @description admin factory
$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Articles::class,function (Faker $faker){
  return [
    //@Provider fzaninotto/Faker
    'article_title' => $faker->text($maxNbChars=50).'-'.$faker->name,
    'article_contents' =>$faker->text($maxNbChars = 180),
    'img' => function(){
      $a=rand(1,9);
      $img=array('1'=>'201710091932414256.png','2'=>'201710092004028896.jpg','3'=>'201710111937464927.jpg','4'=>'201710111938155918.jpg');
      if($a<5) return $img[$a];
      else return '';
    },
    'article_body' =>$faker->randomHtml(2,3),
  ];
});
