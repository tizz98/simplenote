<?php namespace App\Http\Controllers;

use App\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Input;
use Flash;
use Auth;

use Illuminate\Http\Request;

class CollectionsController extends Controller {

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
		$collections = User::find(Auth::User()->id)->collections;
		return view('collections.index', compact('collections'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('collections.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'name' => 'required|min:2',
			'color' => 'required|max:7|min:3',
			'is_public' => 'required'
		];

		$validator = \Validator::make(Input::only('name', 'color', 'is_public'), $rules);
	
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $collection = Collection::create([
        	'name' => Input::get('name'),
        	'color' => Input::get('color'),
        	'is_public' => Input::get('is_public')
        ]);

        $user = Auth::User();
        $user->collections()->save($collection);

        Flash::success('Collection created!');

        return redirect()->route('collections.show', $collection->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$collection = Collection::find($id);
		return view('collections.show', compact('collection'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
