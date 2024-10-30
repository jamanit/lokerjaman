<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_vacancy;
use App\Models\M_company;
use App\Models\M_education_level;
use App\Models\M_job_type;
use App\Models\M_location;
use App\Models\M_post_status;
use App\Models\M_vacancy_link;

class C_vacancy extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request)
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        if ($request->ajax()) {
            $vacancies = M_vacancy::with('user', 'company', 'post_status')->select('*');
            return DataTables::of($vacancies)
                ->addColumn('company_name', function ($vacancy) {
                    return $vacancy->company ? $vacancy->company->company_name : 'N/A';
                })->addColumn('full_name', function ($vacancy) {
                    return $vacancy->user ? $vacancy->user->full_name : 'N/A';
                })->addColumn('created_at', function ($vacancy) {
                    return $vacancy ? $vacancy->created_at : 'N/A';
                })->addColumn('post_status', function ($vacancy) {
                    return $vacancy->post_status ? $vacancy->post_status->post_status : 'N/A';
                })->make(true);
        }

        return view('vacancy.V_index_vacancy', compact('menus'));
    }

    public function create()
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $companies = M_company::orderBy('company_name', 'ASC')->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->company_name];
            })->toArray();

        $locations = M_location::orderBy('location_name', 'ASC')->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->location_name];
            })->toArray();

        $education_levels = M_education_level::get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->education_level];
            })->toArray();

        $job_types = M_job_type::get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->job_type];
            })->toArray();

        $post_status = M_post_status::get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->post_status];
            })->toArray();

        return view('vacancy.V_create_vacancy', compact('menus', 'companies', 'locations', 'post_status', 'education_levels', 'job_types'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'company_id'         => 'required|int',
                'title'              => 'required|string|max:255',
                'description'        => 'nullable|string',
                'requirements'       => 'nullable|string',
                'location_id'        => 'required|int',
                'education_level_id' => 'nullable|int',
                'job_type_id'        => 'nullable|int',
                'salary'             => 'nullable|string|max:255',
                'experience_years'   => 'nullable|string|max:255',
                'expires_date'       => 'nullable|string|max:255',
                'post_status_id'     => 'required|int',
                'link_name.*'        => 'nullable|string|max:255',
                'job_link.*'         => 'nullable|url',
            ]);

            $data    = $request->except(['link_name', 'job_link']);
            $vacancy = M_vacancy::create($data);

            $vacancy_id = $vacancy->id;
            if ($request->link_name) {
                foreach ($request->link_name as $index => $name) {
                    if ($name && isset($request->job_link[$index]) && $request->job_link[$index]) {
                        M_vacancy_link::create([
                            'vacancy_id' => $vacancy_id,
                            'link_name' => $name,
                            'job_link'  => $request->job_link[$index],
                        ]);
                    }
                }
            }

            return redirect()->route('vacancies.index')->with('success', 'Data berhasil ditambah.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal ditambah.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_vacancy $vacancy)
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $companies = M_company::orderBy('company_name', 'ASC')->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->company_name];
            })->toArray();

        $locations = M_location::orderBy('location_name', 'ASC')->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->location_name];
            })->toArray();

        $education_levels = M_education_level::get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->education_level];
            })->toArray();

        $job_types = M_job_type::get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->job_type];
            })->toArray();

        $post_status = M_post_status::get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->post_status];
            })->toArray();

        $vacancy_links = $vacancy->vacancy_links()->get();

        return view('vacancy.V_edit_vacancy', compact('menus', 'vacancy', 'companies', 'locations', 'post_status', 'education_levels', 'job_types', 'vacancy_links'));
    }

    public function update(Request $request, M_vacancy $vacancy)
    {
        try {
            $request->validate([
                'company_id'         => 'required|int',
                'title'              => 'required|string|max:255',
                'description'        => 'nullable|string',
                'requirements'       => 'nullable|string',
                'location_id'        => 'required|int',
                'education_level_id' => 'nullable|int',
                'job_type_id'        => 'nullable|int',
                'salary'             => 'nullable|string|max:255',
                'experience_years'   => 'nullable|string|max:255',
                'expires_date'       => 'nullable|string|max:255',
                'post_status_id'     => 'required|int',
                'link_name.*'        => 'nullable|string|max:255',
                'job_link.*'         => 'nullable|url',
            ]);

            $data = $request->except(['link_name', 'job_link']);
            $vacancy->update($data);

            $vacancy->vacancy_links()->delete();
            if ($request->link_name) {
                foreach ($request->link_name as $index => $name) {
                    if ($name && isset($request->job_link[$index]) && $request->job_link[$index]) {
                        M_vacancy_link::create([
                            'vacancy_id' => $vacancy->id,
                            'link_name'  => $name,
                            'job_link'   => $request->job_link[$index],
                        ]);
                    }
                }
            }

            return redirect()->route('vacancies.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal diperbarui.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_vacancy $vacancy)
    {
        try {
            $vacancy->delete();
            return redirect()->route('vacancies.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('vacancies.index')->with('error', 'Data gagal dihapus.');
        }
    }
}
