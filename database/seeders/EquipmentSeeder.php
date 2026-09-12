<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $equipments = [
            [
                'name'          => 'MacBook Pro 14"',
                'category'      => 'Ordinateur portable',
                'serial_number' => 'MBP-2024-001',
                'location'      => 'Bureau 3A',
                'status'        => 'en_utilisation',
                'notes'         => 'Attribué au service marketing',
            ],
            [
                'name'          => 'Dell Monitor 27"',
                'category'      => 'Écran',
                'serial_number' => 'DL-MON-002',
                'location'      => 'Bureau 3A',
                'status'        => 'disponible',
                'notes'         => null,
            ],
            [
                'name'          => 'HP LaserJet Pro',
                'category'      => 'Imprimante',
                'serial_number' => 'HP-LJ-003',
                'location'      => 'Salle commune RDC',
                'status'        => 'en_maintenance',
                'notes'         => 'Remplacement cartouche en cours',
            ],
            [
                'name'          => 'iPad Pro 12.9"',
                'category'      => 'Tablette',
                'serial_number' => 'IPD-2024-004',
                'location'      => 'Salle de réunion B',
                'status'        => 'disponible',
                'notes'         => 'Utilisé pour les présentations clients',
            ],
            [
                'name'          => 'Cisco Switch 24 ports',
                'category'      => 'Réseau',
                'serial_number' => 'CSC-SW-005',
                'location'      => 'Salle serveur',
                'status'        => 'en_utilisation',
                'notes'         => null,
            ],
            [
                'name'          => 'Lenovo ThinkPad X1',
                'category'      => 'Ordinateur portable',
                'serial_number' => 'LNV-X1-006',
                'location'      => 'Bureau 2B',
                'status'        => 'hors_service',
                'notes'         => 'Écran cassé, en attente de réparation',
            ],
            [
                'name'          => 'Logitech MX Keys',
                'category'      => 'Périphérique',
                'serial_number' => 'LGT-MX-007',
                'location'      => 'Bureau 1C',
                'status'        => 'disponible',
                'notes'         => null,
            ],
            [
                'name'          => 'Serveur Dell PowerEdge',
                'category'      => 'Serveur',
                'serial_number' => 'DL-PE-008',
                'location'      => 'Salle serveur',
                'status'        => 'en_utilisation',
                'notes'         => 'Serveur principal de production',
            ],
        ];

        foreach ($equipments as $equipment) {
            Equipment::create($equipment);
        }
    }
}