<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'lihat-user']);
        
        Permission::create(['name'=>'lihat-tulisan']);
        Permission::create(['name'=>'tambah-tulisan']);
        Permission::create(['name'=>'edit-tulisan']);
        Permission::create(['name'=>'hapus-tulisan']);

        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'penulis']);


        $roleadmin = Role::findByName('admin');
        $roleadmin->givePermissionTo('tambah-user');
        $roleadmin->givePermissionTo('lihat-user');
        $roleadmin->givePermissionTo('edit-user');
        $roleadmin->givePermissionTo('hapus-user');


        $rolepenulis = Role::findByName('penulis');
        $rolepenulis->givePermissionTo('tambah-tulisan');
        $rolepenulis->givePermissionTo('lihat-tulisan');
        $rolepenulis->givePermissionTo('edit-tulisan');
        $rolepenulis->givePermissionTo('hapus-tulisan');

    }
}
