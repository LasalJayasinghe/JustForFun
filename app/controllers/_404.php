<?php

class _404 extends Controller
{
    public function index()
    {
        $data['title'] = "404 page";
        $this->view('404', $data);
    }
}