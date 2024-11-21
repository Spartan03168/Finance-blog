<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class IntroPage extends Controller{
    public function index(){
        return view("WelcomePage.index");
        }
    }
