<?php

namespace Statamic\Addons\SeoTool;

use Statamic\Extend\Controller;

class SeoToolController extends Controller
{
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function index()
    {
        return $this->view('index');
    }
}
