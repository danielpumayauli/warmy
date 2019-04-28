@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthDate" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="birthDate" type="date" class="form-control{{ $errors->has('birthDate') ? ' is-invalid' : '' }}" name="birthDate" value="{{ old('birthDate') }}" autofocus>

                                @if ($errors->has('birthDate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="career" class="col-md-4 col-form-label text-md-right">{{ __('Profesión') }}</label>

                            <div class="col-md-4">
                                <select id="career" type="text" class="form-control{{ $errors->has('career') ? ' is-invalid' : '' }}" name="career" value="{{ old('career') }}" autofocus>
                                    <option value="">&nbsp</option>
                                    <option value="Administración de Empresas">Administración de Empresas</option>
                                    <option value="Contabilidad">Contabilidad</option>
                                    <option value="Ingeniería Empresarial">Ingeniería Empresarial</option>
                                    <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
                                    <option value="Marketing">Marketing</option>
                                </select>

                                @if ($errors->has('career'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('career') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        
                        <div class="form-group row">
                            <label for="otherCareer" class="col-md-4 col-form-label text-md-right">{{ __('Otro') }}</label>

                            <div class="col-md-4">
                                <input id="otherCareer" type="text" class="form-control{{ $errors->has('otherCareer') ? ' is-invalid' : '' }}" name="otherCareer" value="{{ old('otherCareer') }}" autofocus>

                                @if ($errors->has('otherCareer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('otherCareer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lookingFor" class="col-md-4 col-form-label text-md-right">{{ __('¿Qué estás buscando?') }}</label>

                            <div class="col-md-4">
                                <select id="lookingFor" type="text" class="form-control{{ $errors->has('lookingFor') ? ' is-invalid' : '' }}" name="lookingFor" value="{{ old('lookingFor') }}" autofocus >
                                    <option value="">&nbsp</option>
                                    <option value="Socios">Socios</option>
                                    <option value="Oportunidades Laborales">Oportunidades Laborales</option>
                                    <option value="Colaboradores">Colaboradores</option>
                                    <option value="Apoyo">Apoyo</option>
                                    <option value="Mentores">Mentores</option>
                                </select>

                                @if ($errors->has('lookingFor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lookingFor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>

                            <div class="col-md-4">
                                <select id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" autofocus >
                                    <option value="">&nbsp</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Brasil">Brasil</option>
                                    <option value="Chile">Chile</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="España">España</option>
                                    <option value="Estados Unidos">Estados Unidos</option>
                                    <option value="México">México</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Perú">Perú</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Otro">Otro</option>
                                </select>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                            <div class="form-check" style="padding: 8px 2.5rem;">
                                <input class="form-check-input " type="radio" name="gender" id="gender1" value="male" checked>
                                <label class="form-check-label" for="gender1">
                                {{ __('Hombre') }}
                                </label>
                            </div>
                            <div class="form-check" style="padding: 8px 2.5rem;">
                                <input class="form-check-input " type="radio" name="gender" id="gender2" value="female">
                                <label class="form-check-label" for="gender2">
                                {{ __('Mujer') }}
                                </label>
                            </div>

                        </div>
                        <hr>

                        <div class="form-group text-center">
                        <input class="form-check-input" type="checkbox" value="Acepto" id="acceptance" name="acceptance" required>
                        <label class="form-check-label" for="acceptance">
                            Acepto los 
                            <a href=""  data-toggle="modal" data-target="#conditions">
                            Términos y condiciones
                            </a>
                        </label>
                        @if ($errors->has('acceptance'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('acceptance') }}</strong>
                            </span>
                        @endif
                        </div>
                        

                        

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="conditions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Términos y condiciones de Warmy Army
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi excepturi distinctio sapiente obcaecati culpa aut possimus expedita nostrum consequuntur, magnam quia iusto. 
        Quaerat explicabo tempora illum neque, a similique repellendus!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente atque nesciunt praesentium animi voluptatibus temporibus reiciendis quo nam, 
        molestiae maiores aperiam culpa dolor beatae, eaque, adipisci rem repellendus ab eius?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque ipsum adipisci labore, placeat architecto quibusdam accusamus aliquam animi dicta, 
        minima molestiae in atque explicabo exercitationem pariatur laudantium natus autem voluptatem!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non molestias, maxime tenetur aliquam placeat recusandae minima sequi suscipit fugit explicabo ducimus? 
        Quisquam qui doloremque eligendi. Amet expedita aperiam maiores tempora.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis perferendis, ab id dolor alias sint non officia nulla. 
        Expedita blanditiis sint minima, id numquam nulla quos repudiandae assumenda mollitia totam.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum sed molestias temporibus asperiores sint quidem ad reprehenderit, corrupti placeat quae? 
        Velit reprehenderit, quam maiores sequi cumque laudantium! Modi, eos ducimus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection
