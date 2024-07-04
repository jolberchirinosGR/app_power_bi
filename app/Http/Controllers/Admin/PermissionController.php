<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_unpaged_id($id)
    {
        $user = User::find($id);
        $permissions = $user->permissions->pluck('id')->toArray();

        return $permissions;
    }

     /**
     * Display a listing of the resource.
     */
    public function index_unpaged()
    {
        return Permission::orderBy('description', 'asc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        return Permission::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $permissions = $user->permissions->pluck('id')->toArray();
        $newPermissions = $request->permissions_user;

        //Funcion para eliminar los que ya no estan del listado antiguo
        foreach ($permissions as $per) {
            $inList = false;

            foreach ($newPermissions as $new) {
                if (!$inList) {
                    $inList = $new == $per;
                }
            }

            if(!$inList) {
                $user->permissions()->detach($per);
                echo $per . ' Eliminado ya que no esta en el nuevo listado <br>';
            }
        }

        //Funcion para crear la nueva relacion ignorando los que ya estan
        foreach ($newPermissions as $new) {
            $inList = false;

            foreach ($permissions as $per) {
                if (!$inList) {
                    $inList = $new == $per;
                }
            }

            if(!$inList) {
                $user->permissions()->attach($new);
                echo $new . ' Agregado porque no esta en la lista <br>';
            }
        }

        return $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->json(['message' => 'Permission deleted successfully']);
    }
}
