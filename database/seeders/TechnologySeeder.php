<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importo il modello
use App\Models\Admin\Technology;
//implemento laravel helper
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            'Html',
            'Css',
            'Javascript',
            'VueJs',
            'PHP',
            'Laravel'
        ];

        foreach ($technologies as $elem) {
            //creo una nuova istanza
            $new_technology = new Technology();
            $new_technology->name = $elem;
            $new_technology->slug = Str::slug( $new_technology->name);
            
            $new_technology->save();
        }
    }
}
