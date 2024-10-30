<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\M_role;

class C_user extends Controller
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
            $users = User::with('role')->select('*');
            return DataTables::of($users)
                ->addColumn('role_name', function ($user) {
                    return $user->role ? $user->role->role_name : 'N/A';
                })->make(true);
        }

        return view('user.V_index_user', compact('menus'));
    }

    public function create()
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $roles = M_role::orderBy('role_name', 'ASC')->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->role_name];
            })->toArray();

        $status = [
            'active'   => 'active',
            'inactive' => 'inactive',
        ];

        return view('user.V_create_user', compact('menus', 'roles', 'status'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'nick_name' => 'required|string|max:255',
                'email'     => 'required|email|unique:users',
                'password'  => 'required|string|min:8|confirmed',
                'role_id'   => 'required|int',
            ]);

            $data = $request->all();
            if ($request->filled('password')) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }
            User::create($data);

            return redirect()->route('users.index')->with('success', 'Data berhasil ditambah.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal ditambah.')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(User $user)
    {
        $role_id = Auth::user()->role_id;

        $menus = $this->menuService->getMenus($role_id);

        $roles = M_role::orderBy('role_name', 'ASC')->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => $item->role_name];
            })->toArray();

        $status = [
            'active'   => 'active',
            'inactive' => 'inactive',
        ];

        return view('user.V_edit_user', compact('menus', 'user', 'roles', 'status'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'nick_name' => 'required|string|max:255',
                'email'     => 'required|email|unique:users,email,' . $user->id,
                'password'  => 'nullable|string|min:8|confirmed',
                'role_id'   => 'required|int',
            ]);

            $data = $request->all();
            if ($request->filled('password')) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }
            $user->update($data);

            return redirect()->route('users.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Data gagal diperbarui.')->withErrors($e->validator)->withInput();
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Data gagal dihapus.');
        }
    }
}
