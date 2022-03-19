<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'gudang',
            'email' => 'gudang@gmail.com',
            'password' => Hash::make('gudang'),
            'level' => 'gudang'
        ]);
        DB::table('users')->insert([
            'name' => 'pembelian',
            'email' => 'pembelian@gmail.com',
            'password' => Hash::make('pembelian'),
            'level' => 'pembelian'

        ]);
        DB::table('users')->insert([
            'name' => 'pajak',
            'email' => 'pajak@gmail.com',
            'password' => Hash::make('pajak'),
            'level' => 'pajak'
        ]);
        DB::table('users')->insert([
            'name' => 'keuangan',
            'email' => 'keuangan@gmail.com',
            'password' => Hash::make('keuangan'),
            'level' => 'keuangan'
        ]);
        DB::table('users')->insert([
            'name' => 'penjualan',
            'email' => 'penjualan@gmail.com',
            'password' => Hash::make('penjualan'),
            'level' => 'penjualan'
        ]);
        DB::table('users')->insert([
            'name' => 'hrd',
            'email' => 'hrd@gmail.com',
            'password' => Hash::make('hrd'),
            'level' => 'hrd'
        ]);
        DB::table('users')->insert([
            'name' => 'sales',
            'email' => 'sales@gmail.com',
            'password' => Hash::make('sales'),
            'level' => 'sales'
        ]);
        DB::table('users')->insert([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir'),
            'level' => 'kasir'
        ]);
    }
}


// $table->enum('level', ['admin', 'gudang', 'pembelian', 'pajak', 'keuangan', 'penjualan', 'hrd', 'sales', 'kasir']);
