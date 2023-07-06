<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class create_booking_data extends Seeder
{
    public function run()
    {
           $datas = [ 
            [ 
              'book_date' => '2023-07-10 08:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
            [ 
              'book_date' => '2023-07-10 09:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
            [ 
              'book_date' => '2023-07-10 10:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
            [ 
              'book_date' => '2023-07-10 11:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
            [ 
              'book_date' => '2023-07-10 13:00:00',
              'employee_id' => '3',
              'customer_id' => '2'
            ],
            [ 
              'book_date' => '2023-07-10 14:00:00',
              'employee_id' => '3',
              'customer_id' => '2'
            ],
            [ 
              'book_date' => '2023-07-10 15:00:00',
              'employee_id' => '3',
              'customer_id' => '2'
            ],
            [ 
              'book_date' => '2023-07-10 16:00:00',
              'employee_id' => '3',
              'customer_id' => '2'
            ],
            [ 
              'book_date' => '2023-07-12 10:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
            [ 
              'book_date' => '2023-07-12 08:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
          ];

          foreach($datas as $data)
          {
              DB::table('booking')->insert([
               'book_date' => $data['book_date'],
               'employee_id' => $data['employee_id'],
               'customer_id' => $data['customer_id']
           ]);
          }
    }
}

