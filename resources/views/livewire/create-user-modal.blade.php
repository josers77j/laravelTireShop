<div>
    <button wire:click="openModal" class="btn btn-primary mb-3">Nuevo Usuario</button>

    <div class="modal" style="display: {{ $open ? 'block' : 'none' }}; position: fixed; top: 0; left: 0; width: 100%; height: 100%; overflow: auto; z-index: 999; background-color: rgba(0,0,0,0.5); transition: opacity 0.3s ease;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Usuario</h5>
                    <button type="button" class="close" wire:click="close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del formulario para crear usuarios -->
                    <form wire:submit.prevent="createUser">
                        <!-- Campos del formulario -->
                        <div class="form-group">
                            <label for="name" class="required">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('name', '')}}">
                            @if ($errors->has('name'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email" class="required">Email </label>
                            <input type="email" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Ingrese el email del usuario" value="{{old('email', '')}}">
                            @if ($errors->has('email'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="required">Contraseña </label>
                            <input type="password" name="password" id="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Ingrese la contraseña del usuario">
                            @if ($errors->has('password'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirmation" class="required">Repita la Contraseña </label>
                            <input type="password" name="password_confirmation" id="password-confirmation" class="form-control" placeholder="Repita la contraseña del usuario">
                            
                        </div>
                        <!-- Botones para cerrar y guardar -->
                        <button type="button" class="btn btn-danger" wire:click="close"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Cerrar Modal</button>
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
