<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'firstname' => 'Yves',
            'lastname' => 'Chevallier',
            'email' => 'yves.chevallier@heig-vd.ch',
            'password' => bcrypt('password'),
        ]);
        $user->save();

        $user->names()->create([
            'name' => 'CO LAB',
            'description' => 'Coworking Laboratory',
        ])->save();
        $user->names()->create([
            'name' => 'Le Hub',
            'description' => 'Convergence Hub',
        ])->save();
        $user->names()->create([
            'name' => 'InnoLab',
            'description' => 'Innovation Laboratory',
        ])->save();
        $user->names()->create([
            'name' => 'CreativityLab',
            'description' => 'Laboratoire de créativité et d\'innovation',
        ])->save();
        $user->names()->create([
            'name' => 'Makerspace',
            'description' => 'Espace Maker, espace de fabrication',
        ])->save();
        $user->names()->create([
            'name' => 'The MakerLab',
            'description' => 'Laboratoire de fabrication pour Makers',
        ])->save();
        $user->names()->create([
            'name' => 'Faboratoire',
            'description' => 'Fabrication-Laboratoire',
        ])->save();
        $user->names()->create([
            'name' => 'OpenFactory',
            'description' => 'Une fabrique ouverte',
        ])->save();
        $user->names()->create([
            'name' => 'The Circle Lab',
            'description' => 'Le cercle est le centre de la vie',
        ])->save();
        $user->names()->create([
            'name' => 'Impact Lab',
            'description' => 'Un laboratoire avec un réel impact',
        ])->save();
        $user->names()->create([
            'name' => 'The TechnoLab',
            'description' => 'Laboratoire de technologie',
        ])->save();
        $user->names()->create([
            'name' => 'Creatron',
            'description' => 'Centre de création',
        ])->save();
        $user->names()->create([
            'name' => 'La Forge',
            'description' => 'Là ou les idées prennent forme et se forgent',
        ])->save();
        $user->names()->create([
            'name' => 'La Ruche',
            'description' => 'Lieu de rencontre et d\'échange dans l\'esprit Maker',
        ])->save();
        $user->names()->create([
            'name' => 'The Lab',
            'description' => 'Le laboratoire, le seul, le vrai',
        ])->save();
        $user->names()->create([
            'name' => 'LAC',
            'description' => 'Laboratoire des activités créatives',
        ])->save();

        $user = User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john.doe@acme.inc',
            'password' => bcrypt('password'),
        ]);
        $user->save();
    }
}
