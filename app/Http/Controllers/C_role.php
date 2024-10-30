<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_role;

class C_role extends Controller
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
            $roles = M_role::SELECT('*');
            return DataTables::of($roles)->make(true);
        }

        return view('role.V_index_role', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'role_name' => 'required|string|max:255',
            ]);

            $data = $request->all();
            M_role::create($data);

            return redirect()->route('roles.index')->with('success', 'Data berhasil ditambah.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal ditambah.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_role $role)
    {
        return response()->json([
            'role_name' => $role->role_name,
        ]);
    }

    public function update(Request $request, M_role $role)
    {
        try {
            $request->validate([
                'role_name' => 'required|string|max:255',
            ]);

            $data = $request->all();
            $role->update($data);

            return redirect()->route('roles.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal diperbarui.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_role $role)
    {
        try {
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', 'Data gagal dihapus.');
        }
    }
}
