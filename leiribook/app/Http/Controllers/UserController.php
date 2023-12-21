<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $users = User::All();
        return view('_admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = new User;
        return view('_admin.users.create', compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $fields = $request->validated();
        //Repare que o conteúdo anterior de validação foi eliminado neste ponto
        $user = new User();
        $user->fill($fields);
        $user->password = Hash::make('password');
        if ($request->hasFile('file-input')) {
            $name = $request->file('file-input')->getClientOriginalName();
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $designacao = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $user->name);
            $designacao = str_replace(' ', '', $designacao);
            $name = $designacao  . "." . $extension;
            $photo_path = $request->file('file-input')->store('storage/users_photos', $name);
            $user->foto = basename($photo_path);
        }
        $user->save();
        $user->sendEmailVerificationNotification();
        return redirect()->route('admin.users.index')->with(
            'success',
            'Utilizador criado com sucesso'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('_admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('_admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //
        if (auth()->user()->can('updateRole', $user)) {
            $fields = $request->validated();
        } else {
            $fields = $request->except("role");
        }

        $fields = $request->validated();
        $user->fill($fields);
        if ($request->hasFile('file-input')) {
            if (!empty($user->foto)) {
                Storage::disk('public')->delete('users_photos/' . $user->foto);
            }
            $name = $request->file('file-input')->getClientOriginalName();
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $designacao = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $user->name);
            $designacao = str_replace(' ', '', $designacao);
            $name = $designacao  . "." . $extension;
            $photo_path = $request->file('file-input')->store('storage/users_photos', $name);
            $user->foto = basename($photo_path);
        }

        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'Utilizador atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        if (!empty($user->foto)) {
            Storage::disk('public')->delete('users_photos/' . $user->foto);
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with(
            'success',
            'Utilizador eliminado com sucesso'
        );
    }

    public function destroy_photo(User $user)
    {
        Storage::disk('public')->delete('users_photos/' . $user->foto);
        $user->foto = null;
        $user->save();
        return redirect()->route('admin.users.edit', $user)->with(
            'success',
            'A foto do utilizador foi apagada com sucesso.'
        );
    }

    public function editpassword()
    {
        return view('auth.passwords.change');
    }

    public function updatepassword(PasswordRequest $request)
    {
        $fields = $request->validated();
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin')->with(
            'success',
            'Password alterada com sucesso'
        );
    }
}
