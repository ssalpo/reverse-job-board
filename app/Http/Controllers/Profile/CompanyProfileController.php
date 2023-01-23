<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\CompanyProfileRequest;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');

        $this->middleware('redirect.companies.profile.exists')->only(['create', 'store']);
    }

    public function create()
    {
        return inertia('Profile/Company/Edit', [
            'company' => new CompanyProfile
        ]);
    }

    public function store(CompanyProfileRequest $request)
    {
        $profile = CompanyProfile::my()->first();

        // Redirect to edit page if profile already exists
        if ($profile) {
            return redirect()->route('companies.profile.edit', $profile->id);
        }

        $data = array_merge($request->validated(), ['user_id' => auth()->id()]);

        $data['avatar'] = $request->file('avatar')?->store('avatars', 'public');

        $company = CompanyProfile::create($data);

        return redirect()->route('companies.profile.show', $company->id);
    }

    public function show(CompanyProfile $company)
    {
        return inertia('Profile/Company/Show', compact('company'));
    }

    public function edit(int $id)
    {
        $company = CompanyProfile::my()->findOrFail($id);

        return inertia('Profile/Company/Edit', compact('id', 'company'));
    }

    public function update(int $id, CompanyProfileRequest $request)
    {
        $data = $request->validated();

        $company = CompanyProfile::my()->findOrFail($id);

        unset($data['avatar']);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')?->store('avatars', 'public');

            Storage::disk('public')->delete($company->avatar ?? '');
        }

        $company->update($data);

        return redirect()->route('companies.profile.show', $company->id);
    }
}
