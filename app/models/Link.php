<?php

class Link extends \Eloquent {
	protected $fillable = ['url','hash'];

	public function	byHash($hash)
	{
		return Link::whereHash($hash)->first();
	}
}