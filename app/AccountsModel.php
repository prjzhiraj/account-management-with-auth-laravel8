<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AccountsModel extends Model
{
    public static function loginGetAccount($data){
    	$query = DB::table('user_accounts')->select('*')->where('email','like',$data['email'])->where('password','like',md5($data['password']))->get();
    	return ($query->count()>0)?$query:false;
    }

    public static function checkEmail($email){
    	$query = DB::table('user_accounts')->select('id')->where('email','like',$email)->get();
    	return ($query->count()>0)?true:false;
    }

    public static function checkUpdateEmail($email,$id){
        $query = DB::table('user_accounts')->select('id')->where('email','like',$email)->where('id','!=',$id)->get();
        return ($query->count()>0)?true:false;
    }

    public static function registerAccount($data){
    	$query  = DB::table('user_accounts')->insert($data);
    	return true;
    }

    public static function getAllAccounts(){
        $query = DB::table('user_accounts')->select('*')->whereIn('service',['Counseling','Psychiatry'])->get();
        return ($query->count()>0)?$query:false;
    }

    public static function getSelectedAccount($id){
        $query = DB::table('user_accounts')->select('*')->where('id','=',$id)->get();
        return ($query->count()>0)?$query:false;
    }

    public static function updateAccount($data,$id){
        $query = DB::table('user_accounts')->where('id','=',$id)->update($data);
        return true;
    }

    public static function getEmailAdd($id){
        $query = DB::table('user_accounts')->select('email')->where('id','=',$id)->get();
        return ($query->count()>0)?$query:false;
    }

    public static function deleteAccount($id){
        DB::table('user_accounts')->where('id','=',$id)->delete();
        return true;
    }
}
