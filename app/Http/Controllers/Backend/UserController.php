<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disabled = null;
        $user     = null;
        return view('backend.users.form', compact('disabled', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        try {
            // Criação do usuário
            $user = User::create([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'password' => bcrypt($validateData['password']),
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error('Falha ao cadastrar usuário.');
            Log::error($e->getMessage());
            return redirect()->route('user')->with('flash_error', 'Falha ao cadastrar usuário.');
        }
        return redirect()->route('user')->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $disabled = null;
        $user     = $user;
        return view('backend.users.form', compact('disabled', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validação dos dados recebidos do formulário
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        try {
            $user->update([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'password' => bcrypt($validateData['password']),
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error('Falha ao atualizar usuário.');
            Log::error($e->getMessage());
            return redirect()->route('user')->with('flash_error', 'Falha ao atualizar usuário.');
        }
        return redirect()->route('user')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user')->with('success', 'Usuário deletado com sucesso!');
    }
}
