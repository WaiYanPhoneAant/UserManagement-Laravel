<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\features;
use App\Models\permissions;
use App\Models\roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $features=['user','role'];
    private $permissions=['view','update','create','delete'];
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
                'name'=>'admin',
                'username'=>'admin',
                'role_id'=>'1',
                'email'=>'admin@gmail.com',
                'phone'=>'09123456789',
                'gender'=>'male',
                'is_active'=>true,
                'password'=>Hash::make('admin1234'),
        ]);

        //adding feature
        foreach ($this->features as $feature) {
            $featureData=features::create([
                'name'=>$feature,
            ]);

            //adding permission for features
            foreach ($this->permissions as $permission) {
                # code...
                permissions::create([
                    'name'=>$permission,
                    'feature_id'=>$featureData->id,
                ]);
            }
        }

        roles::create([
            'name'=>'admin'
        ]);

    }
}


