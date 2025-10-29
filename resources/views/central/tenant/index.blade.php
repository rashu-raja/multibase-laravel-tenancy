<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark">
            {{ __('Tenants') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">

            <!-- Top button -->
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('tenants.create') }}" class="btn btn-primary">Create Client</a>
            </div>

            <!-- Success message -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Tenants table -->
            <div class="card shadow-sm">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Tenant ID</th>
                                <th>Name</th>
                                <th>Database Name</th>
                                <th>Status</th>
                                <th>Domains</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenants as $tenant)
                            <tr>
                                <td>{{ $tenant->id }}</td>
                                <td>{{ $tenant->name }}</td>
                                <td>{{ $tenant->db_name }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <form action="{{ route('tenant.status', $tenant->id) }}" method="POST" onsubmit="return confirm('Do you want to {{ $tenant->status === 'active' ? 'disable' : 'activate' }} this tenant?');">
                                        @csrf
                                        <button type="submit" class="badge {{ $tenant->status === 'active' ? 'bg-success text-white' : 'bg-danger text-white' }} border-0">
                                            {{$tenant->status }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    @foreach($tenant->domains as $domain)
                                    <span class="badge bg-secondary me-1">{{ $domain->domain }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>