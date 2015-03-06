<?php

Class CD
{
    private $artist;
    private $album;

    function __construct($artist, $album)
    {
        $this->artist = $artist;
        $this->album = $album;
    }
    function setArtist($new_artist)
    {
        $this->artist = $new_artist;
    }
    function getArtist()
    {
        return $this->artist;
    }
    function setAlbum($new_album)
    {
        $this->album = $new_album;
    }
    function getAlbum()
    {
        return $this->album;
    }
    function save()
    {
        array_push($_SESSION['list_of_cds'], $this);
    }
    static function getAll()
    {
        return $_SESSION['list_of_cds'];
    }
    static function deleteAll()
    {
        $_SESSION['list_of_cds'] = array();
    }
}

?>
