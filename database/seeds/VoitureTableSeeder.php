<?php

use Illuminate\Database\Seeder;

class VoitureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voiture')->insert(
 
            array(
                array(
                    'type' => 'Break',
                    'modele' => 'Mégane break',
                    'marque' => 'Reneault',
                    'created_at' => now(),
                    'description' => 'Une sportive dans l\'ame. Consuite très sportive...',
                    'prix' => '22050.669696'
                ),
 
                array(
                    'type' => 'Hybride',
                    'modele' => 'Model S',
                    'marque' => 'Tesla',
                    'created_at' => now(),
                    'description' => 'Classique de la gamme......',
                    'prix' => '48005.999545'
                )
            )
 
        );
    }
}