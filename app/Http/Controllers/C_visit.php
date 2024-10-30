<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_company;
use App\Models\M_vacancy;

class C_visit extends Controller
{
    public function index($id, $model)
    {
        if ($model == 'company') {
            $company = M_company::findOrFail($id);
            $company->total_visit += 1;
            $company->save();
            $totalVisit = number_format($company->total_visit);
        } else {
            $vacancy = M_vacancy::findOrFail($id);
            $vacancy->total_visit += 1;
            $vacancy->save();
            $totalVisit = number_format($vacancy->total_visit);
        }
        return response()->json(['message' => 'Visit incremented successfully', 'total_visit' => $totalVisit]);
    }
}
