<?php

use Illuminate\Database\Seeder;
use App\Agency;
class AgenciesTableSeeder extends Seeder
{
    private $agencies = [
        [
            'name' => 'Alice Imóveis',
            'description' => 'Esta é a imobiliária da Alice',
        ],
        [
            'name' => 'Imobiliária do Bob',
            'description' => 'Esta é a imobiliária do Bob',
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->agencies as $agency){
            Agency::create($agency);
        }
    }
}
