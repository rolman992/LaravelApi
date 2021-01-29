<?php

use Illuminate\Database\Seeder;
class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hotels')->insert([
            [
                'tipo' => 'simple',
                'vacante' => 'si',
                'hab' => '1A',
                'ocupantes' => 0
            ],
            [
                'tipo' => 'simple',
                'vacante' => 'no',
                'hab' => '2A',
                'ocupantes' => 1
            ],
            [
                'tipo' => 'simple',
                'vacante' => 'si',
                'hab' => '3A',
                'ocupantes' => 0
            ],
            [
                'tipo' => 'doble',
                'vacante' => 'no',
                'hab' => '1B',
                'ocupantes' => 3
            ],
            [
                'tipo' => 'doble',
                'vacante' => 'si',
                'hab' => '2B',
                'ocupantes' => 0
            ],
            [
                'tipo' => 'doble',
                'vacante' => 'no',
                'hab' => '3B',
                'ocupantes' => 2
            ],
            [
                'tipo' => 'triple',
                'vacante' => 'no',
                'hab' => '1C',
                'ocupantes' => 4
            ],
            [
                'tipo' => 'triple',
                'vacante' => 'si',
                'hab' => '2C',
                'ocupantes' => 0
            ]
        ]);
    }
}
