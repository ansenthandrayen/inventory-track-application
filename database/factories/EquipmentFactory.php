<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'          => $this->faker->words(3, true),
            'category'      => $this->faker->randomElement([
                'Ordinateur portable',
                'Écran',
                'Imprimante',
                'Tablette',
                'Réseau',
                'Serveur',
                'Périphérique',
            ]),
            'serial_number' => strtoupper($this->faker->bothify('??-####-???')),
            'location'      => 'Bureau ' . $this->faker->bothify('#?'),
            'status'        => $this->faker->randomElement([
                'disponible',
                'en_utilisation',
                'en_maintenance',
                'hors_service',
            ]),
            'notes'         => $this->faker->optional()->sentence(),
        ];
    }
}