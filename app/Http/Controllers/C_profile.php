<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class C_profile extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $role_id = Auth::user()->role_id;
        $id      = Auth::user()->id;

        $menus   = $this->menuService->getMenus($role_id);
        $profile = User::find($id);

        return view('profile.V_index_profile', compact('menus', 'profile'));
    }

    public function update(Request $request, User $profile)
    {
        try {
            $request->validate([
                'full_name'    => 'required|string|max:255',
                'nick_name'     => 'required|string|max:255',
                'email'        => 'required|email|unique:users,email,' . $profile->id,
                'password'     => 'nullable|string|min:8|confirmed',
            ]);

            $data = $request->all();
            if ($request->filled('password')) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }
            $profile->update($data);

            return redirect()->route('profiles.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal diperbarui.')->withErrors($e->validator)->withInput();
        }
    }
}
