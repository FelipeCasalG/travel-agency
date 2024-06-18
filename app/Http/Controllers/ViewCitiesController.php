<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ViewCitiesController extends Controller
{
    public function __invoke(): View
    {
        return view('cities.index');
    }
}
