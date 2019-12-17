<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Toko',
            'email' => 'admin@toko.com',
            'password' => bcrypt('123456'),
            'address' => 'Surabaya',
            'phone' => '081234567890'
        ]);
        $admin->assignRole('admin');
    }
}
