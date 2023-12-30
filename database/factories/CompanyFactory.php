<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('id_ID');

        $sources = ['whatsapp', 'instagram', 'iklan', 'facebook'];

        return [
            'tanggal' => $faker->date,
            'jam' => $faker->time,
            'nama' => $faker->company,
            'whatsapp' => $faker->phoneNumber,
            'kota' => $faker->city,
            'provinsi' => $faker->state,
            'sumber' => $faker->randomElement($sources),
            'nama_iklan' => $faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
