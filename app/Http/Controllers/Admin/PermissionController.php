<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Busqueda de usuario no paginada por 
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
        $user = auth()->user();

        // Si hay idCompany, obtenemos los permisos con el idCompany y todos los que no tienen id_company
        if ($user->id_role !== 1) {
            return Permission::whereHas('users', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            })->orderBy('description', 'asc')->get();
        } else {
            // Si no hay idCompany, simplemente obtenemos todos los permisos
            return Permission::orderBy('description', 'asc')->get();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
}
