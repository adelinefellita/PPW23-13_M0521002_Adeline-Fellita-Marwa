<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Kopi Hitam',
                'size' => 'Small',
                'temperature' => 'Hot',
                'price' => random_int(20000, 50000)
            ],
            [
                'name' => 'Kopi Susu',
                'size' => 'Medium',
                'temperature' => 'Hot',
                'price' => random_int(20000, 50000)
            ],
            [
                'name' => 'Espresso',
                'size' => 'Small',
                'temperature' => 'Hot',
                'price' => random_int(20000, 50000)
            ],
            [
                'name' => 'Cappuccino',
                'size' => 'Large',
                'temperature' => 'Hot',
                'price' => random_int(20000, 50000)
            ],
            [
                'name' => 'Iced Coffee',
                'size' => 'Large',
                'temperature' => 'Cold',
                'price' => random_int(20000, 50000)
            ],
            // Tambahkan data kopi lainnya sesuai kebutuhan
        ];

        DB::table('menus')->insert($menus);
        Menu::factory()->count(50)->create();
    }
}
