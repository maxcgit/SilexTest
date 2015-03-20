<?php

namespace Maxc\Entity;

use RedBean_Facade as R;

/**
* PostRepositary
*/
class PostRepository
{

	private $name = 'post';

	public function findAll()
	{
	    return R::findAll($this->name);
	}

	public function addPost($title = 'None', $rating = 1)
	{
		$author = R::findOne('author', 'name = "Admin"');
		if(empty($author)){
			$author = R::dispense( 'author' );
			$author->name = 'Admin';
			R::store( $author );
		} 
		$book = R::dispense( $this->name );
		$book->title = $title;
    	$book->rating = $rating;
    	$book->author = $author;
    	$id = R::store( $book );
	}

	public function getCount()
	{
		return R::count( $this->name );
	}

	public function deleteAll()
	{
		R::wipe( $this->name );
	}

	public function delete($id)
	{
		R::trash( R::load( $this->name, $id ) ); 
	}

	public function inspect()
	{
		$rez = array();
		$listOfTables = R::inspect();
		foreach ($listOfTables as $i) {
			$rez[$i] = R::inspect( $i );
		}

		return $rez;
	}

}