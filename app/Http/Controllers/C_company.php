<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\M_company;
use App\Models\M_company_type;

class C_company extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        if ($request->ajax()) {
            $companies = M_company::SELECT('*');
            return DataTables::of($companies)->make(true);
        }

        $company_types = M_company_type::get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->company_type];
            })->toArray();

        return view('company.V_index_company', compact('menus', 'company_types'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'company_name'    => 'required|string|max:255',
                'email'           => 'nullable|email|max:255',
                'phone_number'    => 'nullable|string|max:255',
                'website'         => 'nullable|string|max:255',
                'address'         => 'nullable|string|max:255',
                'company_type_id' => 'required|int',
                'description'     => 'nullable|string',
                'logo'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);

            $user_id = Auth::user()->id;

            $data = $request->all();
            if ($request->hasFile('logo')) {
                $imagePath    = $request->file('logo')->store('company', 'public');
                $data['logo'] = $imagePath;
            } else {
                $data['logo'] = 'company/company-logo.png';
            }
            $data['user_id'] = $user_id;
            M_company::create($data);

            return redirect()->route('companies.index')->with('success', 'Data berhasil ditambah.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal ditambah.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_company $company)
    {
        return response()->json([
            'company_name'    => $company->company_name,
            'company_type_id' => $company->company_type_id,
            'logo'            => $company->logo,
        ]);
    }

    public function update(Request $request, M_company $company)
    {
        try {
            $request->validate([
                'company_name'    => 'required|string|max:255',
                'email'           => 'nullable|email|max:255',
                'phone_number'    => 'nullable|string|max:255',
                'website'         => 'nullable|string|max:255',
                'address'         => 'nullable|string|max:255',
                'company_type_id' => 'required|int',
                'description'     => 'nullable|string',
                'logo'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);

            $user_id = Auth::user()->id;

            $data = $request->all();
            if ($request->hasFile('logo')) {
                if ($company->logo) {
                    Storage::disk('public')->delete($company->logo);
                }

                $imagePath    = $request->file('logo')->store('company', 'public');
                $data['logo'] = $imagePath;
            } else {
                $data['logo'] = $company->logo;
            }
            $data['user_id'] = $user_id;
            $company->update($data);

            return redirect()->route('companies.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal diperbarui.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_company $company)
    {
        try {
            if ($company->logo && $company->logo != 'company/company-logo.png') {
                Storage::disk('public')->delete($company->logo);
            }

            $company->delete();
            return redirect()->route('companies.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('companies.index')->with('error', 'Data gagal dihapus.');
        }
    }
}
