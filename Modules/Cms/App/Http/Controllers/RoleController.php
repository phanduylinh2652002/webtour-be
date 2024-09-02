<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
class RoleController extends Controller
{
    //
    public function index(){
        $role = Role::all();
        return view('Cms::admin.role.index', compact('role'));
    }
    public function create(){
        return view('Cms::admin.role.create');
    }
    public function store(Request $request){
        Role::query()->create([
            'name' => $request->name
        ]);
        return redirect()->route('role.index');
    }
    public function edit($id){
        $role = Role::findOrFail($id);
        return view('Cms::admin.role.edit', compact('role'));
    }
    public function update($id, Request $request){
        $role = Role::findOrFail($id);
        $role->fill($request->all());
        $role->save();
        return redirect()->route('role.index');
    }
    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role.index');
    }
}
