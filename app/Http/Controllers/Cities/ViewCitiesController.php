<?php

namespace App\Http\Controllers\Cities;

use Illuminate\Contracts\View\View;

class ViewCitiesController
{
    public function __invoke(): View
    {
        return view('cities.index');
    }
}
