<?php

namespace App\Livewire;

use App\Http\Controllers\UserController;
use App\Http\Requests\StoreUserRequest;
use Livewire\Component;

class CreateUserModal extends Component
{
    public $open = false;
    public $name, $email, $password, $password_confirmation;  // Define las propiedades aquí

    public function render()
    {
        return view('livewire.create-user-modal');
    }

    public function close()
    {
        $this->open = false;
    }

    public function openModal()
    {
        $this->open = true;
    }
    
    public function createUser()
    {
        // Crea una nueva instancia de StoreUserRequest
        $request = new StoreUserRequest();

        // Llena el request con los datos del formulario
        $request->merge([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);

        // Valida los datos del formulario
        $validatedData = $this->validate($request->rules());

        // Crea una nueva instancia de UserController
        $controller = new UserController();

        // Llama al método store de UserController
        $controller->store($request);

        // Cierra la modal
        $this->open = false;

        // Resetea las propiedades
        $this->reset(['name', 'email', 'password', 'password_confirmation']);

        // Muestra un mensaje de éxito
        session()->flash('success', 'Usuario creado exitosamente!');

        // Opcional: emite un evento para notificar que el usuario fue creado
        $this->emit('userCreated');
    }
}

