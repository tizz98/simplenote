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
		for ($i=0; $i < count($collection->notes); $i++) { 
			$collection->notes[$i]->shortText = substr($collection->notes[$i]->body_text, 0, 500);
		}
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
		$collection = Collection::find($id);
		if ($collection->is_public)
		{
			$is_public = 1;
		}
		else
		{
			$is_public = 0;
		}

		return view('collections.edit', compact('collection', 'is_public'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$collection = Collection::find($id);

		$rules = [
			'name' => 'required|min:2',
			'color' => 'required|max:7|min:3',
			'is_public' => 'required'
		];

		if (Auth::User()->id != $collection->user_id) {
			Flash::warning('You are not authorized to do that');
			return redirect()->route('home');
		}

		$validator = \Validator::make(Input::only('name', 'color', 'is_public'), $rules);
	
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $collection->name = Input::get('name');
        $collection->color = Input::get('color');
        $collection->is_public = Input::get('is_public');

        $collection->save();

        Flash::success('Collection updated!');
        return redirect()->route('collections.show', $collection->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$collection = Collection::find($id);

		if (Auth::User()->id != $collection->user_id) {
			Flash::warning('You are not authorized to do that');
			return redirect()->route('home');
		}

		$collection->delete();

		Flash::info('Collection deleted!');
		return redirect()->route('collections.index');
	}

}
