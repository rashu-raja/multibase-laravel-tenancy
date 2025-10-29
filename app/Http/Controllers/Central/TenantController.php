<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with(['domains' => function ($query) {
            $query->select('id', 'tenant_id', 'domain');
        }])->get();
        return view('central/tenant/index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('central/tenant/createTenant');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            'name' => 'required|max:255',
            'domain_name' => 'required|string|max:255|unique:domains,domain',
            'db_name' => 'required|max:255|unique:tenants,db_name',
        ]);

        // dd($validated);

        // Create tenant
        $tenant = Tenant::create($validated);


        $tenant->domains()->create(['domain' => $request->domain_name]);

        // Initialize tenant (create DB)
        tenancy()->initialize($tenant);

        // Run tenant migrations
        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => 'database/migrations/tenant',
            '--force' => true,
        ]);

        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\TenantUsersSeeder',
            '--force' => true,
        ]);

        // End tenancy
        tenancy()->end();

        return redirect()->intended('/tenants')->with('success', 'Tenant created successfully!');
    }


    public function showDashboard()
    {
        $users = User::all();
        return view('tenant/dashboard', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
