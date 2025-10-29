<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mt-3">
                    {{ __("You're logged in!") }}
                </div>
                <div class="mt-5">
                    <h1>Welcome {{tenant('name')}}</h1>

                    <h2>Your tenant ID is: {{ tenant('id') }}</h2>
                    <h2>Your Database name is: {{ tenant('db_name') }}</h2>

                    <h3>Users:</h3>
                    <ul>
                        @foreach($users as $user)
                        <li>
                            Name: {{ $user->name }} <br>
                            Email: {{ $user->email }} <br>
                            Role: {{ $user->role }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>