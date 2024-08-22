<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'Nama' => 'john.doe@example.com',
            'Harga' => 20000,
            'Foto' => 'kjnsjdwdad',
            'stock' => 100,

        ]);
    }
}
