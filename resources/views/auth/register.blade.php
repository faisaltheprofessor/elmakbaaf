<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

             <!-- User-->
             
      
      <br/>
             <div>
                <x-label for="user_name" :value="__('User Type')" />

                {{-- <x-input id="user_type" class="block mt-1 w-full" type="text" name="user_type" :value="old('user_type')" required autofocus /> --}}
                <select name="user_type"  id="" class="block mt-1 w-full" type="text" >
                    <option value="Normal User">Normal User </option>
                 {{-- @can('Admin') --}}
                    <option value="Admin">Admin</option>                   
                    <option value="Salse Manager">Salse Manager</option>
                    <option value="Purchese Manager">Purchese Manager</option>
                 {{-- @endcan --}}
                </select>
            </div>
   
         <br>
         
            <div>
                <x-label for="img" :value="__('Add Picture:')" />
                <x-input id="" class="block mt-1 w-full" type="file" name="img" required autofocus />
            </div>
          
            
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
