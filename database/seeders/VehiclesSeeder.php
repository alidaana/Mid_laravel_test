<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;


class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        DB::table('vehicles')->insert(
            array(
                'make' => 'BMW',
                'model' => 'X5',
                'year' => '2013',
                'description' => 'very good car',
                'image' => '',
            )
        );
        DB::table('vehicles')->insert(
            array(
                'make' => 'Mercedes',
                'model' => 'C-Class',
                'year' => '2020',
                'description' => 'still new',
                'image' => '',
            )
        );
    }
}
