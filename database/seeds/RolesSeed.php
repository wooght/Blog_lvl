<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;
use App\Admin;

class RolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CACHE_DRIVER=array 修改.env如此
        //添加管理角色
        $admin=new Role;
        $admin->name='admins';
        $admin->display_name="管理员";
        $admin->description="管理员";
        $admin->save();

        $editor=new Role;
        $editor->name='editor';
        $editor->display_name='编辑';
        $editor->description='编辑人员';
        $editor->save();

        //设置超级管理员 本初设置admins id 为 3的
        $wooght=Admin::find(3);
        $wooght->attachRole($admin);

        //设置权限
        $editor_user=new Permission;
        $editor_user->name="editor_user";
        $editor_user->display_name="用户编辑";
        $editor_user->description="添加,编辑用户";
        $editor_user->save();

        $editor_articles=new Permission;
        $editor_articles->name="editor_articles";
        $editor_articles->display_name="文字编辑";
        $editor_articles->description="文字内容编辑人员";
        $editor_articles->save();

        //权限绑定
        $admin->perms()->sync(array($editor_user->id,$editor_articles->id));
        $editor->perms()->sync(array($editor_articles->id));
    }
}
