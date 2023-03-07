<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];

    public function login()
    {
        $this->validate();
        $email = $this->email;
        $password = $this->password;

        $user = User::query()->where("email", $email)->first();

        if ($user == null) {
            session()->flash('messageError', 'your email or password is wrong!');
            return;
        }

        if (!Hash::check($password, $user->password)) {
            session()->flash('messageError', 'your email or password is wrong!');
            return;
        }

        if (!session()->isStarted()) {
            session()->start();
        }
        session()->put("logged", true);
        session()->put("idPengguna", $user->id);
        return redirect()->route("home");
    }
    public function render()
    {
        return view('livewire.login');
    }
}
