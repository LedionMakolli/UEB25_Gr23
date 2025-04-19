<?php

require_once __DIR__ . 'artist.php';

class Song extends Artist {
    private string $title;
    private int    $plays;
    private string $image;
    private string $audio;
    private string $id;

    public function __construct(
        string $artistName,
        string $title,
        int    $plays,
        string $image,
        string $audio,
        string $id
    ) {
        parent::__construct($artistName);
        $this->title = $title;
        $this->plays = $plays;
        $this->image = $image;
        $this->audio = $audio;
        $this->id    = $id;
    }

}
