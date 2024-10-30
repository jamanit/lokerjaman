<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\M_brand_profile;

class C_brand_profile extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function edit(M_brand_profile $brand_profile)
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        return view('brand_profile.V_edit_brand_profile', compact('menus', 'brand_profile'));
    }

    public function update(Request $request, M_brand_profile $brand_profile)
    {
        try {
            $request->validate([
                'logo'         => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
                'about'        => 'required|string',
                'contact'      => 'required|string',
                'post_vacancy' => 'required|string',
                'google_maps'  => 'required|string',
            ]);

            $data = $request->all();
            if ($request->hasFile('logo')) {
                if ($brand_profile->logo) {
                    Storage::disk('public')->delete($brand_profile->logo);
                }

                $imagePath    = $request->file('logo')->store('images', 'public');
                $data['logo'] = $imagePath;
            }
            $brand_profile->update($data);

            return redirect()->route('brand_profiles.edit', $brand_profile->uuid)->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal diperbarui.')->withErrors($e->validator)->withInput();
        }
    }

    public function about()
    {
        return view('home.show_about');
    }

    public function contact()
    {
        return view('home.show_contact');
    }

    public function post_vacancy()
    {
        return view('home.show_post_vacancy');
    }
}
