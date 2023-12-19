<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            ['The Victoria',374662,4,2,2,2],
            ['The Xavier',513268,4,2,1,2],
            ['The Como',454990,4,3,2,3],
            ['The Aspen',384356,4,2,2,2],
            ['The Lucretia',572002,4,3,2,2],
            ['The Toorak',521951,5,2,1,2],
            ['The Skyscape',263604,3,2,2,2],
            ['The Clifton',386103,3,2,1,1],
            ['The Geneva',390600,4,3,2,2],
        ];
        foreach ($data as $datum) {
            Property::factory()->create([
                'name' => $datum[0],
                'price' => $datum[1],
                'bedrooms' => $datum[2],
                'bathrooms' => $datum[3],
                'storeys' => $datum[4],
                'garages' => $datum[5],
            ]);
        }
    }
}
