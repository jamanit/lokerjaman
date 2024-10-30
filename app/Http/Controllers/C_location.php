<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\M_location;

class C_location extends Controller
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
            $locations = M_location::SELECT('*');
            return DataTables::of($locations)->make(true);
        }

        return view('location.V_index_location', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'location_name' => 'required|string|max:255',
            ]);

            $user_id    = Auth::user()->id;

            $data = $request->all();
            $data['user_id'] = $user_id;
            M_location::create($data);

            return redirect()->route('locations.index')->with('success', 'Data berhasil ditambah.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal ditambah.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(M_location $location)
    {
        return response()->json([
            'location_name' => $location->location_name,
        ]);
    }

    public function update(Request $request, M_location $location)
    {
        try {
            $request->validate([
                'location_name' => 'required|string|max:255',
            ]);

            $data = $request->all();
            $location->update($data);

            return redirect()->route('locations.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal diperbarui.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(M_location $location)
    {
        try {
            $location->delete();
            return redirect()->route('locations.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('locations.index')->with('error', 'Data gagal dihapus.');
        }
    }
}
