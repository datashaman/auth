<?php

class HomeController extends BaseController
{
	public function getIndex()
	{
		return View::make('home.index');
	}

    public function getSuccess()
    {
        return Response::success([
            'thing' => [
                'id' => 'thing',
                'name' => 'Thing',
            ],
        ]);
    }

    public function getFail()
    {
        return Response::fail([
            'name' => 'Input is required',
        ]);
    }

    public function getError()
    {
        throw new Exception('An exception occured');
    }
}
