<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\AccountsModel;
use Validator;
use DB;

class AccountsController extends Controller
{
	public function refreshToken(Request $request)
	{
		session()->regenerate();
		return response()->json([
			"token"=>csrf_token()],
			200);
	}

	public static function login(Request $data){
		$data = $data->all();
		$val = AccountsModel::loginGetAccount($data);
		if($val){
			session(['account_id'=>$val[0]->id]);
			session(['email'=>$val[0]->email]);
			session(['fname'=>$val[0]->fname]);
			session(['lname'=>$val[0]->lname]);
			session(['fullname'=>$val[0]->fname.' '.$val[0]->lname]);
			$status = true;
		}else{
			$status = false;
			session()->flush();
		}
		return json_encode(['status'=>$status]);
	}

	public static function logout(){
		session()->flush();
		return redirect('/');
	}

	public function register(Request $data){

		$this->validate($data, [
			'fname' => 'required',
			'lname' => 'required',
			'service' => 'required',
			'email' => 'required|email|unique:user_accounts,email',
			'password' => 'required|min:6|required_with:confirmpassword|same:confirmpassword'
		],[
			'fname.required' => 'The First name field is required.',
			'lname.required' => 'The Last name field is required.',
			'service.required' => 'The Service field is required.',
			'email.required' => 'The Email Address field is required.',
			'email.email' => 'The Email Address must be valid.',
			'password.required' => 'The Password field is required.',
			'password.same' => 'The Password and Confirm Password must match.',
			'password.min' => 'The Password must be at least 6 characters'
		]);

		$status = AccountsModel::checkEmail($data->input('email'));
		$datas = $data->all();
		if($status == true){
			return json_encode(array('status'=>false, 'error_msg' => 'The email address is already in use by another account.'));
		}else{
			if($data->input('password') == $data->input('confirmpassword')){
				unset($datas['confirmpassword']);
				$datas['password'] = md5($data->input('password'));
				AccountsModel::registerAccount($datas);
				return json_encode(array('status'=>true));
			}else{
				return json_encode(array('status'=>false, 'error_msg' => 'The Password and Confirm Password did not match.'));
			}
		}
	}

	public static function getAllAccounts(){
		$data = AccountsModel::getAllAccounts();
		return json_encode(array('data'=>$data));
	}

	public static function editAccount($id){
		$data = AccountsModel::getSelectedAccount($id);
		return json_encode($data);
	}

	public function updateAccount(Request $data){
		$datas =  $data->all();

		$this->validate($data, [
			'fname' => 'required',
			'lname' => 'required',
			'email' => 'required|email|unique:user_accounts,email,'.$datas['id'],
			'password' => 'nullable|min:6|required_with:confirmpassword|same:confirmpassword'
		],[
			'fname.required' => 'The First name field is required.',
			'lname.required' => 'The Last name field is required.',
			'email.required' => 'The Email Address field is required.',
			'email.email' => 'The Email Address must be valid.',
			'password.same' => 'The Password and Confirm Password must match.'
		]);

		if($datas['password'] != null || $datas['confirmpassword'] != null){
			if($data->input('password') == $data->input('confirmpassword')){
				unset($datas['confirmpassword']);
				$datas['password'] = md5($data->input('password'));
			}else{
				return json_encode(array('status'=>false, 'error_msg' => 'The Password and Confirm Password did not match.'));
				exit();
			}
		}else if($datas['password'] == null || $datas['confirmpassword'] == null){
			unset($datas['confirmpassword']);
			unset($datas['password']);
		}
		unset($datas['id']);
		AccountsModel::updateAccount($datas,$data->input('id'));
		return json_encode(array('status'=>true));
	}

	public static function deleteConfirm($id){
		$email = AccountsModel::getEmailAdd($id);
		return json_encode($email[0]->email);
	}

	public static function deleteAccount($id){
		AccountsModel::deleteAccount($id);
		return json_encode(array('status'=>true,'id'=>$id));
	}
}
