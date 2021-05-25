@extends('dashboard')
@section('contenido')
<h1>Configuracion de la cuenta</h1>

<x-guest-layout>
<!-- Validation Errors -->
            
        <x-auth-card>
            <x-slot name="logo">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </x-slot>

            
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            

            


            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" aria-label="Configuracion de mi cuenta">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->name" required autofocus />
                </div>

                <!-- Surname -->
                <div class="mt-4">
                    <x-label for="surname" :value="__('Surname')" />

                    <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="Auth::user()->surname" required />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="Auth::user()->email" required />
                </div>

                <!-- Nick -->
                <div class="mt-4">
                    <x-label for="nick" :value="__('Nick')" />

                    <x-input id="nick" class="block mt-1 w-full" type="text" name="nick" :value="Auth::user()->nick" required />
                </div>

                <!-- Subir imagenes -->
                <div class="mt-4">
                    <x-label for="image_path" :value="__('Avatar')" />

                    <x-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" required />
                </div>
                @if(Auth::user()->image)
                    <img src="images/{{ Auth::user()->image }}"   class="avatar"/>
                @endif
                <div class="flex items-center justify-end mt-4">
        

                    <x-button class="ml-4">
                        {{ __('Guardar Cambios') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
@endsection

