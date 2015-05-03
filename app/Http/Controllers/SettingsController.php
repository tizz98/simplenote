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
		return view('settings.index');
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

        Flash::message('Email successfully updated!');

        return redirect()->route('settings');
	}

}
