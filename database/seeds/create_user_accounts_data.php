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
              'email' => 'account1@email.com',
              'password' => '12345678',
              'fname' => 'Juan',
              'lname' => 'Dela Tore'
            ],
            [ 
              'email' => 'account2@email.com',
              'password' => '12345678',
              'fname' => 'Cristian',
              'lname' => 'Jupia'
            ],
            [ 
              'email' => 'account3@email.com',
              'password' => '12345678',
              'fname' => 'Glenn',
              'lname' => 'Claveria'
            ],
            [ 
              'email' => 'account4@email.com',
              'password' => '12345678',
              'fname' => 'Earl',
              'lname' => 'Manahan'
            ],
            [ 
              'email' => 'account5@email.com',
              'password' => '12345678',
              'fname' => 'Kristian',
              'lname' => 'Sanamakalipatna'
            ]
          ];

          foreach($datas as $data)
          {
              DB::table('user_accounts')->insert([
               'email' => $data['email'],
               'password' => md5($data['password']),
               'fname' => $data['fname'],
               'lname' => $data['lname']
           ]);
          }
    }
}
