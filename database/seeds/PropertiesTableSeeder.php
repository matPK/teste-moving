<?php

use Illuminate\Database\Seeder;
use App\Property;
class PropertiesTableSeeder extends Seeder
{
    private $properties = [
        [
            'description' => 'Residência de 3 cômodos',
            'agency_id' => 1,
            'type' => 'Casa',
            'address' => 'Rua Um, 123. São Paulo - SP',
        ],
        [
            'description' => 'Apartamento Luxo 84m2',
            'agency_id' => 1,
            'type' => 'Apartamento',
            'address' => 'Rua Dois, 123. São Paulo - SP',
        ],
        [
            'description' => 'Casa 2 Cômodos 70m2',
            'agency_id' => 2,
            'type' => 'Casa',
            'address' => 'Rua Três, 123. São Paulo - SP',
        ],
        [
            'description' => 'Ap Zona Leste 42m2',
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
