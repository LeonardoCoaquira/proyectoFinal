<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Ui\Presets\React;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Http::GET('https://animalapi.leocoaquira12.repl.co/animals/chicken')->collect();
        return view('animals.animals', compact('animals'));
    }

    public function searchDataAnimal(Request $request)
    {
        $url = 'https://animalapi.leocoaquira12.repl.co/animals/';
        $url .= $request->animal;
        $animals = Http::GET($url)->collect();
        return view('animals.animals', compact('animals'));
    }
}
