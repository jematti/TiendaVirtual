<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $usuario = Role::create(['name' => 'usuario']);
        $admin_tienda = Role::create(['name' => 'admin_tienda']);

        // Permission::create(['name'=>'home'])->syncRoles([$admin],[$usuario]);

        //autores de los productos
        Permission::create(['name' => 'admin.authors.index', 'description' => 'Ver listado de autores'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.authors.create', 'description' => 'Crear Autor'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.authors.edit', 'description' => 'Editar Autor'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.authors.destroy', 'description' => 'Eliminar Autor'])->syncRoles([$admin]);

        //categorias
        Permission::create(['name' => 'admin.categories.index', 'description' => 'Ver Listado de Categorias'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear Categorias'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar Categorias'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.categories.destroy', 'description' => 'Eliminar Categorias'])->syncRoles([$admin]);

        //repositorios
        Permission::create(['name' => 'admin.repositories.index', 'description' => 'Ver Listado de Repositorios'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.repositories.create', 'description' => 'Crear Repositorio'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.repositories.edit', 'description' => 'Editar Repositorio'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.repositories.destroy', 'description' => 'Eliminar Repositorio'])->syncRoles([$admin]);

        //Productos
        Permission::create(['name' => 'admin.products.index', 'description' => 'Ver Listado de Productos'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.products.create', 'description' => 'Crear Producto'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.products.edit', 'description' => 'Editar Producto'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.products.destroy', 'description' => 'Eliminar Producto'])->syncRoles([$admin]);

        //roles/permisos/usuarios
        Permission::create(['name' => 'admin.users.index', 'description' => 'listado de usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.index', 'description' => 'listado de roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'editar roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'creacion de roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'eliminacion de roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.permission', 'description' => 'administracion de permisos'])->syncRoles([$admin]);
        //ordenes de compra
        Permission::create(['name' => 'admin.orders.index', 'description' => 'Ver Listado de ordenes de compra'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.orders.show', 'description' => 'ver descripcion de la orden'])->syncRoles([$admin,$admin_tienda]);

        //reportes
        Permission::create(['name' => 'admin.reports.orders', 'description' => 'Ver reportes de ordenes de compra'])->syncRoles([$admin,$admin_tienda]);
        Permission::create(['name' => 'admin.reports.sales', 'description' => 'ver reportes de ventas'])->syncRoles([$admin,$admin_tienda]);

        //barras de navegación
        Permission::create(['name' => 'nav.admin'])->assignRole('admin');
        Permission::create(['name' => 'nav.users'])->assignRole('usuario');
    }
}
