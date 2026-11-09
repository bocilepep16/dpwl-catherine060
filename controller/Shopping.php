<?php
class Shopping extends Controller
{
    public function index()
    {
        $this->load->view('layoutshop/headershop');
        $this->load->view('layoutshop/menushop');
    }
}