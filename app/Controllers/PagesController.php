<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    public function teste()
    {
        return view('Views/templates/header') . view('Views/teste') . view('Views/templates/footer');
    }
}
