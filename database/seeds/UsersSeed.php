<?php

use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //method databases\factories\UserFacTory factory
        factory('App\User',10)->create()->each(function ($user){
          // @var App\Users $user
          $user->articles()->save(factory(App\Articles::class)->make());
        });
    }
}
