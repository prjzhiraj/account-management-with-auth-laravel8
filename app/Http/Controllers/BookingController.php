<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class BookingController extends Controller
{
    public function index(Request $request){
        $data = Booking::selectRaw("DATE_FORMAT(book_date, '%k') as hour, booking.*")->where('book_date','like',$request->date.'%')->get();
        return json_encode($data);
    }

    public function myBooking(Request $request){
        $data = Booking::selectRaw("DATE_FORMAT(book_date, '%k') as hour, booking.*, concat(ua.fname,' ',ua.lname) as full_name, ua.service as service")->join('user_accounts as ua','ua.id','=','booking.employee_id')->where('customer_id', session("account_id"))->get();
        return json_encode($data);

        // return json_encode('test');
    }

    public function getBookedDate(Request $request){
        $data = Booking::selectRaw("DATE_FORMAT(book_date, '%Y-%m-%d')  as date, count(id) as book_count")->groupBy('date')->having('book_count','>=',8)->get();
        return json_encode($data);
    }

    public function booknow(Request $request){
        $data = new Booking;
        $data->book_date = $request->book_date;
        $data->employee_id = $request->user_id;
        $data->customer_id = session("account_id");
        $data->save();

        return json_encode(['data'=>$request->all()]);
    }

    public function cancelbook(Request $request){
        Booking::where('id',$request->book_id)->delete();
        return true;
    }
}
