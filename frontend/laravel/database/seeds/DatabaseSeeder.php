<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(AppointmentTableSeeder::class);
        $this->call(BoardTableSeeder::class);
        $this->call(BoardTaskTableSeeder::class);
    }
}
