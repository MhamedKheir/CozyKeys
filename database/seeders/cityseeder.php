<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cityseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $damascus_cities = [
            'Qaboon',
            'Jaramana',
            'Al-mazza',
            'Bagdad.S',
            'mhajreen',
            'Midan',
        ];
        foreach ($damascus_cities as $city) {
            City::create(['name' => $city, 'gov_id' => 1]);
        }

        $homs_cities = [
            'bayada',
            'hamra',
            'gotaa',
            'dablan',
            'hadara',
        ];

        foreach ($homs_cities as $city) {
            City::create(['name' => $city, 'gov_id' => 2]);
        }

        $aleepo_cities = [
            'elkalase',
            'hamadania',
            'mansoura',
            'jarablous',

        ];
        foreach ($aleepo_cities as $city) {
            City::create(['name' => $city, 'gov_id' => 3]);
        }

        $lazakia_cities = [
            'jableh',
            'sahel',
            'eltakhreme',
            'om altanafes el foqa',
            'om altanafes el tahta'
        ];
        foreach ($lazakia_cities as $city) {
            City::create(['name' => $city, 'gov_id' => 4]);
        }
    }
}
