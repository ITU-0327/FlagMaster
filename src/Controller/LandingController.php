<?php

namespace App\Controller;

use App\Controller\AppController;

class LandingController  extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('landing');
        $this->set('title', 'Your Page Title');
    }
}
