<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class create_user_accounts_data extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $datas = [ 
            [ 
              'email' => 'customer1@email.com',
              'password' => '12345678',
              'fname' => 'Kristian',
              'lname' => 'Sanamakapasaakohehe',
              'service' => 'Customer'
            ],
            [ 
              'email' => 'customer2@email.com',
              'password' => '12345678',
              'fname' => 'Cristian',
              'lname' => 'Jupia',
              'service' => 'Customer'
            ],
            [ 
              'email' => 'counseling1@email.com',
              'password' => '12345678',
              'fname' => 'Glenn',
              'lname' => 'Claveria',
              'service' => 'Counseling'
            ],
            [ 
              'email' => 'counseling2@email.com',
              'password' => '12345678',
              'fname' => 'Earl',
              'lname' => 'Manahan',
              'service' => 'Counseling'
            ],
            [ 
              'email' => 'psychiatry1@email.com',
              'password' => '12345678',
              'fname' => 'Juan',
              'lname' => 'tutri',
              'service' => 'Psychiatry'
            ],
            [ 
              'email' => 'psychiatry2@email.com',
              'password' => '12345678',
              'fname' => 'Pedro',
              'lname' => 'Paksiw',
              'service' => 'Psychiatry'
            ]
          ];

          foreach($datas as $data)
          {
              DB::table('user_accounts')->insert([
               'email' => $data['email'],
               'password' => md5($data['password']),
               'fname' => $data['fname'],
               'lname' => $data['lname'],
               'service' => $data['service']
           ]);
          }
    }
}
