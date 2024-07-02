<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spot;

class SpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat data awal
        $spots = [
            [
                'name' => 'Spot A',
                'slug' => 'spot-a',
                'coordinates' => '1.2345,1.2345',
                'description' => 'Deskripsi Spot A',
                'image' => 'gambar1.jpg', // Ganti dengan nama file gambar yang sesuai
            ],
            [
                'name' => 'Spot B',
                'slug' => 'spot-b',
                'coordinates' => '2.3456,2.3456',
                'description' => 'Deskripsi Spot B',
                'image' => 'gambar2.jpg', // Ganti dengan nama file gambar yang sesuai
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam database
        foreach ($spots as $spotData) {
            Spot::create($spotData);
        }
    }
}


