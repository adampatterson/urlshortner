<?php

class LinksController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('links.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('links.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try
        {
            $hash = Little::make(Input::get('url'));
        }

        catch(ValidationException $e)
        {
            return Redirect::home()->withErrors($e->getErrors())->withInput('url');
        }

        return Redirect::home()->with([
            'flash_message' => 'Here you go! '. link_to($hash),
            'hashed'        => $hash
        ]);
	}

    public function translateHash($hash) {
        try {
            $url = Little::getUrlByHash($hash);

            return Redirect::to($url);
        }

        catch ( NonExistentHashException $e )
        {
            return Redirect::home()->with('flash_message', 'Sorry - could not find your desired URL.');
        }
    }
}
