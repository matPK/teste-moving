<?php

use Illuminate\Database\Seeder;
use App\Property;
class PropertiesTableSeeder extends Seeder
{
    private $properties = [
        [
            'description' => 'Casa do Adão',
            'agency_id' => 1,
            'type' => 'Casa',
            'address' => 'Rua Um, 123. São Paulo - SP',
        ],
        [
            'description' => 'Apartamento da Eva',
            'agency_id' => 1,
            'type' => 'Apartamento',
            'address' => 'Rua Dois, 123. São Paulo - SP',
        ],
        [
            'description' => 'Casa do Caim',
            'agency_id' => 2,
            'type' => 'Casa',
            'address' => 'Rua Três, 123. São Paulo - SP',
        ],
        [
            'description' => 'Apartamento do Abel',
            'agency_id' => 2,
            'type' => 'Apartamento',
            'address' => 'Rua Quatro, 123. São Paulo - SP',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->properties as $property){
            Property::create($property);
        }
    }
}
