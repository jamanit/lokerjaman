<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_company;
use App\Models\M_vacancy;

class HomeController extends Controller
{
    public function __construct()
    {
        //    
    }

    public function index(Request $request)
    {
        if ($request->vacancy_search) {
            $keyword = $request->vacancy_search;
            $companies = M_company::with(['vacancies' => function ($query) {
                $query->orderBy('id', 'desc');
            }])
                ->whereHas('vacancies', function ($query) use ($keyword) {
                    $query->where('post_status_id', 1)
                        ->where('title', 'like', '%' . $keyword . '%')
                        ->orWhere('description', 'like', '%' . $keyword . '%')
                        ->orWhere('requirements', 'like', '%' . $keyword . '%')
                        ->orWhereHas('company', function ($query) use ($keyword) {
                            $query->where('company_name', 'like', '%' . $keyword . '%')
                                ->orWhereHas('company_type', function ($query) use ($keyword) {
                                    $query->where('company_type', 'like', '%' . $keyword . '%');
                                });
                        })
                        ->orWhereHas('location', function ($query) use ($keyword) {
                            $query->where('location_name', 'like', '%' . $keyword . '%');
                        })
                        ->orWhereHas('education_level', function ($query) use ($keyword) {
                            $query->where('education_level', 'like', '%' . $keyword . '%');
                        })
                        ->orWhereHas('job_type', function ($query) use ($keyword) {
                            $query->where('job_type', 'like', '%' . $keyword . '%');
                        });
                })
                ->limit(100)
                ->paginate(10);
        } else {
            $companies = M_company::with(['vacancies' => function ($query) {
                $query->orderBy('id', 'desc');
            }])
                ->whereHas('vacancies', function ($query) {
                    $query->where('post_status_id', 1);
                })
                ->select('id', 'company_name', 'logo', 'description')
                ->limit(100)
                ->paginate(10);
        }

        $recomendations = M_company::with(['vacancies' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->whereHas('vacancies', function ($query) {
                $query->where('post_status_id', 1);
            })
            ->select('id', 'company_name', 'logo')
            ->limit(5)
            ->get();

        $swasta_vacancies = M_company::with(['vacancies' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->where('company_type_id', '1')
            ->whereHas('vacancies', function ($query) {
                $query->where('post_status_id', 1);
            })
            ->select('id', 'company_name', 'logo')
            ->limit(5)
            ->get();

        $bumn_vacancies = M_company::with(['vacancies' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->where('company_type_id', '2')
            ->whereHas('vacancies', function ($query) {
                $query->where('post_status_id', 1);
            })
            ->select('id', 'company_name', 'logo')
            ->limit(5)
            ->get();

        return view('home.index_home', compact('companies', 'recomendations', 'swasta_vacancies', 'bumn_vacancies'));
    }

    public function show($id)
    {
        $company = M_company::with('company_type')->where('id', $id)->first();
        $vacancies = M_vacancy::with('company')
            ->whereHas('company', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->where('post_status_id', 1)
            ->orderBy('id', 'desc')
            ->limit(15)
            ->paginate(5);

        $recomendations = M_company::with(['vacancies' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->whereHas('vacancies', function ($query) {
                $query->where('post_status_id', 1);
            })
            ->select('id', 'company_name', 'logo')
            ->limit(5)
            ->get();

        $swasta_vacancies = M_company::with(['vacancies' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->where('company_type_id', '1')
            ->whereHas('vacancies', function ($query) {
                $query->where('post_status_id', 1);
            })
            ->select('id', 'company_name', 'logo')
            ->limit(5)
            ->get();

        $bumn_vacancies = M_company::with(['vacancies' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->where('company_type_id', '2')
            ->whereHas('vacancies', function ($query) {
                $query->where('post_status_id', 1);
            })
            ->select('id', 'company_name', 'logo')
            ->limit(5)
            ->get();


        return view('home.show_company', compact('company', 'vacancies', 'recomendations', 'swasta_vacancies', 'bumn_vacancies'));
    }

    public function detail($id)
    {
        $vacancy = M_vacancy::with('company', 'location', 'job_type', 'education_level', 'vacancy_links')
            ->where('id', $id)
            ->where('post_status_id', 1)
            ->first();
        $company = M_company::with('company_type')->where('id', $vacancy->company_id)->first();

        $recomendations = M_company::with(['vacancies' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->whereHas('vacancies', function ($query) {
                $query->where('post_status_id', 1);
            })
            ->select('id', 'company_name', 'logo')
            ->limit(5)
            ->get();

        $swasta_vacancies = M_company::with(['vacancies' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->where('company_type_id', '1')
            ->whereHas('vacancies', function ($query) {
                $query->where('post_status_id', 1);
            })
            ->select('id', 'company_name', 'logo')
            ->limit(5)
            ->get();

        $bumn_vacancies = M_company::with(['vacancies' => function ($query) {
            $query->orderBy('id', 'desc');
        }])
            ->where('company_type_id', '2')
            ->whereHas('vacancies', function ($query) {
                $query->where('post_status_id', 1);
            })
            ->select('id', 'company_name', 'logo')
            ->limit(5)
            ->get();


        return view('home.detail_vacancy', compact('company', 'vacancy', 'recomendations', 'swasta_vacancies', 'bumn_vacancies'));
    }
}
