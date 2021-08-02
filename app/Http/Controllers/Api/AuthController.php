<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserEmail;
use App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
	protected $seeder = 'PharmacySeeder';

	public function unauthorized()
	{
		return response(['error' => 'Not authorized'], 401);
	}

	public function addUser(Request $request)
	{
		try {
			$email_exists = User::where('email', $request->email)->first();
			if (empty($email_exists)) {
				$default_password = strtoupper(substr(md5($request['firstname'] . $request['email'] . $this->seeder), 0, 8));
				$request['password'] = Hash::make($default_password);
				$request['email_verified_at'] = date('Y-m-d H:i:s');
				$this->validate($request, User::$rules);
				$user = User::firstOrCreate([
					'email' => $request->email
				], $request->toArray());
				return response($user, 200);
			} else {
				$response = 'Email exists';
				return response(['error' => $response]);
			}
		} catch (\Illuminate\Database\QueryException $e) {
			$errorCode = $e->errorInfo[1];
			if ($errorCode == '7') {
				$user = User::withTrashed()->where([
					'email' => $request->email
				])->restore();
				$user->update(['is_active' => false]);
				return response()->json(['error' => 'Deleted duplicate entry was restored!']);
			}
		}
	}

	public function addUserEmail(Request $request)
	{
		$user = User::find($request->id);
		if ($user) {
			$user->code = strtoupper(substr(md5($user->firstname . $user->email . $this->seeder), 0, 8));
			Mail::send(new NewUserEmail($user));
			return response(['msg' => 'Mail sent'], 200);
		} else {
			$response = 'User does not exist';
			return response(['error' => $response], 401);
		}
	}

	public function login(Request $request)
	{
		$user = User::where('email', $request->email)->first();
		if ($user) {
			if (Hash::check($request->password, $user->password)) {
				if (!$user->is_active) {
					$response = "Account has been deactivated, please contact your administrator";
					return response(['error' => $response, 'user_id' => $user->id]);
				}
				$token = $user->createToken($this->seeder)->accessToken;
				$response = ['token' => $token];
				return response($response, 200);
			} else {
				$response = "Password missmatch";
				return response(['error' => $response]);
			}
		} else {
			$response = 'User does not exist';
			return response(['error' => $response]);
		}
	}

	public function forgotpasswordemail(Request $request)
	{
		$user = User::where('email', $request->email)->first();
		if ($user) {
			//Change Old Password
			$new_password = Str::random(8);
			$user->password = Hash::make($new_password);
			$user->save();
			//Send new_password to email
			$user->password = $new_password;
			Mail::send(new ForgotPasswordEmail($user));
			return response(['msg' => 'Password was reset and sent to your email!'], 200);
		} else {
			$response = 'User does not exist';
			return response(['error' => $response]);
		}
	}

	public function changepassword(Request $request)
	{
		$user = User::where('email', $request->email)->first();
		if ($user) {
			if (Hash::check($request->password, $user->password)) {
				if ($request->new_password == $request->confirm_password) {
					$user->password = Hash::make($request['new_password']);
					$user->save();
					$response = 'Password changed';
					return response(['msg' => $response], 200);
				} else {
					$response = 'Passwords do not match';
					return response(['error' => $response]);
				}
			} else {
				$response = "Wrong current password";
				return response(['error' => $response]);
			}
		} else {
			$response = 'User does not exist';
			return response(['error' => $response]);
		}
	}

	public function viewprofile(Request $request)
	{
		$user = User::with('role')->find(auth('api')->user()->id);
		if (is_null($user)) {
			return response()->json(['error' => 'not_found']);
		}
		return response($user, 200);
	}

	public function updateprofile(Request $request)
	{
		$user = User::find($request->id);
		if (!empty($user)) {
			$email_exists = User::where('email', $request->email)->where('id', '!=', $user->id)->first();
			if (empty($email_exists)) {
				$this->validate($request, User::$rules);
				$user->firstname = $request->firstname;
				$user->lastname = $request->lastname;
				$user->phone = $request->phone;
				$user->email = $request->email;
				$user->is_active = $request->is_active;
				$user->role_id = $request->role_id;
				$user->save();
				$response = 'Profile updated';
				return response(['msg' => $response], 200);
			} else {
				$response = 'Email exists';
				return response(['error' => $response]);
			}
		}
		return response(['error' => 'Details could not be updated']);
	}

	public function logout(Request $request)
	{
		$token = $request->user()->token();
		$token->revoke();

		$response = 'You have been succesfully logged out!';
		return response(['msg' => $response], 200);
	}
}
