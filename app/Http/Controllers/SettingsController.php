<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Flash;

class SettingsController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$active_triggers = array();
		return view('settings.index', compact('active_triggers'));
	}

	public function changeEmail()
	{
		$rules = [
            'email' => 'required|email|unique:users',
        ];

        if (Input::get('email') == \Auth::User()->email)
        {
        	Flash::message('Email successfully updated!');

	        return redirect()->route('settings');
        }

        $validator = \Validator::make(Input::only('email'), $rules);

        if ($validator->fails()) {
        	return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = \Auth::User();

        $user->email = Input::get('email');
        $user->save();

        Flash::success('Email successfully updated!');

        return redirect()->route('settings');
	}

	public function changePassword()
	{
		$rules = [
			'current_password' => 'required|min:6',
			'new_password' => 'required|confirmed|min:6'
		];

		if (!\Hash::check(Input::get('current_password'), \Auth::User()->password)) {
			Flash::error('Incorrect current password!');
			return redirect()->route('settings');
		}

		$validator = \Validator::make(Input::only('current_password', 'new_password', 'new_password_confirmation'), $rules);

		if ($validator->fails()) {
			return redirect()->back()->withInput()->withErrors($validator);
		}

		$user = \Auth::User();
		$user->password = \Hash::make(Input::get('new_password'));
		$user->save();

		Flash::success('Password successfully changed!');
		return redirect()->route('settings');
	}

}
