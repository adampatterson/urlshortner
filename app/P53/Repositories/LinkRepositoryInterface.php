<?php namespace P53\Repositories;

use Link;

interface LinkRepositoryInterface {

    /**
     * Create new link
     *
     * @param array $data
     */
    public function create(array $data);

    /**
     * Fetch link by hash
     *
     * @param $hash
     */
    public function byHash($hash);

    /**
     * Fetch link by url
     *
     * @param  $url
     */
    public function byUrl($url);

}