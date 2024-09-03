<?php

namespace App\Controller;

use App\Controller\AppController;

class LandingpageController  extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('landing'); // Optional if your layout is named 'default'
        $this->set('title', 'Your Page Title');
    }
}
