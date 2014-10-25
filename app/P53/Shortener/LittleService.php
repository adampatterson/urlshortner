<?php namespace P53\Shortener;

use P53\Repositories\LinkRepositoryInterface as linkRepo;
use P53\Exception\NonExistentHashException;

class LittleService {

    protected $linkRepo;

    public function __construct(linkRepo $linkRepo)
    {
        $this->linkRepo = $linkRepo;
    }

    public function make($url)
    {
        $link = $this->LinkRepo->byUrl($url);

        if ( $link ) return $link->hash;

        return $this->makeHash($url);
    }

    public function getUrlByHash($hash)
    {
        $link = $this->linkRepo->byHash($hash);

        if ( ! $link) throw new NonExistentHashException;

        return $link->url;
    }

    public  function makeHash($url)
    {
        $hash = $this->urlHasher->make($url);
        $data = compact('url', 'hash');

        \Event::fire('Link.creating', [$data]);
        $this->LinkRepo->create($data);

        return $hash;
    }
}