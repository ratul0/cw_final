<?php

class UserController extends \BaseController {



	public function profile(){


		return View::make('users.showProfile')
					->with('user',Auth::user())
					->with('title','Profile');
	}

	public function profileUpdate(){


		return View::make('users.updateProfile')
					->with('user',Auth::user())
					->with('title','Profile');
	}




	public function updateProfile(){


		$data = Input::all();
		$validation = Validator::make($data,User::rules(Auth::user()->id));
		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}else{

			//$user = User::find(Auth::user()->id);
			$user = Auth::user();
			$user->full_name = $data['full_name'];
			$user->mobile = $data['mobile'];
			//$user->location = $data['location'];

			//Upload Image file.
			
			if($user->save()){
				Auth::logout();
				return Redirect::route('login')
							->with('success',"Account Updated Successfully.Login Now.");
			}else{
				return Redirect::back()
							->with('error',"something went wrong! Try again.")
							->withInput();
			}
		}
	}

}