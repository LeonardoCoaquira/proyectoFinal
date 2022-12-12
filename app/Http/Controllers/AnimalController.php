<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimalController extends Controller
{
    public function index()
    {
        $users = User::All();
        $animal = Http::GET('https://animalapi.leocoaquira12.repl.co');
        return view('animals.animals', compact('users','animals'));
    }
}
