<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where'], 'what' => $record['what']);
		}
		$this->data['authors'] = $authors;

		$this->render();
	}

	/**
	* Randomly selects an author
	*/
	public function random()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();

		foreach ($source as $record)
		{
				$authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where'], 'what' => $record['what']);
		}

		// create a random number
		$rand_num = rand(0,6);
		
		// cut down the array to a length of one at a random position
		$rand_author = array_slice($authors, $rand_num, 1);

		$this->data['authors'] = $rand_author;

		$this->render();
	}
}
