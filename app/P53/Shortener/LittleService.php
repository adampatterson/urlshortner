<?php namespace P53\Shortener;

use P53\Exception\NonExistentHashException;

class LittleService {

    public function __construct($linkRepo)
    {
        $this->linkRepo = $linkRepo;
    }

    public function make()
    {
        
    }

    public function getUrlByHash($hash)
    {
        $link = $this->linkRepo->byHash($hash);

        if ( ! $link) throw new NonExistentHashException;

        return $link->url;
    }
}