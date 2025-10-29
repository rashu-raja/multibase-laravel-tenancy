<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Tenant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tenants.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="domain_name" class="form-label">Domain Name</label>
                            <input type="text" name="domain_name" id="domain_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="db_name" class="form-label">Database Name</label>
                            <input type="text" name="db_name" id="db_name" class="form-control" required>
                        </div>

                        <input type="hidden" name="status" value="active">

                        <button type="submit" class="btn btn-primary">Create Tenant</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>