<?php

namespace Database\Seeders;

use App\Models\Gov;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class govsyseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $govs = [
            'damascus',
            'aleepo',
            'homs',
            'lazakia',
        ];
        foreach ($govs as $governorate) {
            Gov::create(['name' => $governorate]);
        }
    }
}
