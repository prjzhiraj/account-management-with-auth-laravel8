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
              'book_date' => '2023-07-31 08:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
            [ 
              'book_date' => '2023-07-31 09:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
            [ 
              'book_date' => '2023-07-31 10:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
            [ 
              'book_date' => '2023-07-31 11:00:00',
              'employee_id' => '3',
              'customer_id' => '1'
            ],
            [ 
              'book_date' => '2023-07-31 13:00:00',
              'employee_id' => '3',
              'customer_id' => '2'
            ],
            [ 
              'book_date' => '2023-07-31 14:00:00',
              'employee_id' => '3',
              'customer_id' => '2'
            ],
            [ 
              'book_date' => '2023-07-31 15:00:00',
              'employee_id' => '3',
              'customer_id' => '2'
            ],
            [ 
              'book_date' => '2023-07-31 16:00:00',
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

