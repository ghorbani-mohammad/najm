<?php

namespace App\Traits;

trait FileLinks
{
    public $routeName;
    public $fileID;

    public function download()
    {
        return ;
    }

    public function delete()
    {
        return ;
    }

    public function add()
    {
        return route("{$this->routeName}.files.add", ['file' => $this->fileID]);
    }

    public function getDownloadLinkAttribute()
    {
        $this->download();
    }

    public function getDeleteLinkAttribute()
    {
        $this->delete();
    }

    public function getAddLinkAttribute()
    {
        $this->add();
    }

}
