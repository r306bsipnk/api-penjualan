<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->insert([
            [
                'kode' => 'A01',
                'nama' => 'Sabun Cair',
                'harga' => 29000
            ],
            [
                'kode' => 'A02',
                'nama' => 'Pastagigi',
                'harga' => 12000
            ],
            [
                'kode' => 'A03',
                'nama' => 'Minyak sayur',
                'harga' => 23000
            ]
        ]);

    }
}
