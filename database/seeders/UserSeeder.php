<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Permissions\UserRole;
use App\Models\Address;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::where('email','=', 'super@admin.com')->count() == 0) {

            $address = Address::create([
                'zip_code'        => '00000000',
                'state'           => 'PI',
                'city'            => 'Indefinido',
                'street'          => 'Rua teste',
                'neighborhood'    => 'Bairro Teste',
                'number'          =>  123
            ]);

            $superUser = User::firstOrCreate([
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'password' =>  bcrypt('123aB')
            ]);


            // Criar Pefil
            Profile::create([
                'cpf_cnpj'      => '0000000',
                'user_id'       => $superUser->id,
                'address_id'    => $address->id
            ]);

            UserRole::firstOrCreate([
                'user_id' => $superUser->id,
                'role_id' => 1
            ]);

        }
    }
}
