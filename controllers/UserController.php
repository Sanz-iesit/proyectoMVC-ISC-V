<?php
 require_once 'models/User.php';

 class UserController{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function index() {
        $users = $this->model->getAllUsers();
        include 'views/user_view.php';
    }
 }