<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Flash;

class RegistrationController extends Controller {

    public function __construct()
    {
        $this->beforeFilter('guest');
    }

	/**
	 * Show a form to register the user.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('registration.create');
	}

	/**
	 * Create a new forum member.
	 *
	 * @return Response
	 */
	public function store()
	{
        $rules = [
            'username' => 'required|min:6|unique:users',
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ];

        $validator = \Validator::make(Input::only('username', 'name', 'email', 'password', 'password_confirmation'), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $confirmation_code = str_random(30);

        User::create([
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'name' => Input::get('name'),
            'password' => \Hash::make(Input::get('password')),
            'confirmation_token' => $confirmation_code
        ]);

        \Mail::send('emails.verify', compact('confirmation_code'), function($message) {
            $message->to(Input::get('email'), Input::get('username'))->subject('SimpleNote - Verify your email address');
        });

        Flash::message('Thanks for signing up! Please check your email and follow the instructions to complete the sign up process');

        return redirect('home');
    }

    /**
     * Attempt to confirm a users account.
     *
     * @param $confirmation_code
     *
     * @throws InvalidConfirmationCodeException
     * @return mixed
     */
    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            return redirect('home');
        }

        $user = User::whereConfirmationToken($confirmation_code)->first();

        if ( ! $user)
        {
            return redirect('home');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        \Flash::message('You have successfully verified your account. You can now login.');

        return redirect('login_path');
    }
}