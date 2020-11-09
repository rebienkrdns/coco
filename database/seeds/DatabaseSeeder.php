<?php

use App\Models\TimeLapse;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      "Administrador",
      "Cliente"
    ];

    foreach ($data as $key => $value) {
      Role::create(['name' => $value]);
    }

    TimeLapse::create([
      'title' => 'básico',
      'desc' => 'Coco ofrece el plan básico, gratuitamente por una semana para que nuestros clientes puedan probar nuestra asombrosa plataforma.',
      'price' => 0,
      'days' => 7
    ]);

    $admin = User::create([
      'name' => 'Administrador',
      'email' => 'admin@cocodigital.co',
      'password' => Hash::make('coco123')
    ]);

    $admin->assignRole("Administrador");
  }
}
