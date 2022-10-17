<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'keycloak_id' => 'd9ffdf71-2265-4556-bc8b-ab9d9d61b23f',
            'name' => 'Yves Chevallier',
            'email' => 'yves.chevallier@heig-vd.ch',
        ]);
        $user->save();

        if (config('app.env') !== 'production') {
            $user = User::create([
                'name' => 'FabLab',
                'email' => 'fablab@heig-vd.ch',
            ]);
            $user->save();
        }

        // Names proposed by FabLab COPIL
        $names = [
            ['name' => 'CO LAB', 'description' => 'Coworking Laboratory'],
            ['name' => 'Le Hub', 'description' => 'Convergence Hub'],
            ['name' => 'InnoLab', 'description' => 'Innovation Laboratory'],
            ['name' => 'CreativityLab', 'description' => 'Laboratoire de créativité et d\'innovation'],
            ['name' => 'Makerspace', 'description' => 'Espace Maker, espace de fabrication'],
            ['name' => 'The MakerLab', 'description' => 'Laboratoire de fabrication pour Makers'],
            ['name' => 'Faboratoire', 'description' => 'Fabrication-Laboratoire'],
            ['name' => 'OpenFactory', 'description' => 'Une fabrique ouverte'],
            ['name' => 'The Circle Lab', 'description' => 'Le cercle est le centre de la vie'],
            ['name' => 'Impact Lab', 'description' => 'Un laboratoire avec un réel impact'],
            ['name' => 'The TechnoLab', 'description' => 'Laboratoire de technologie'],
            ['name' => 'Creatron', 'description' => 'Centre de création'],
            ['name' => 'La Forge', 'description' => 'Là ou les idées prennent forme et se forgent'],
            ['name' => 'La Ruche', 'description' => 'Lieu de rencontre et d\'échange dans l\'esprit Maker'],
            ['name' => 'The Lab', 'description' => 'Le laboratoire, le seul, le vrai'],
            ['name' => 'LAC', 'description' => 'Laboratoire des activités créatives'],
        ];
        foreach ($names as $name) {
            $name['anonymous'] = true;
            $user->names()->create($name)->save();
        }
    }
}
