<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\DeveloperProfileRequest;
use App\Models\DeveloperProfile;
use Illuminate\Support\Facades\Storage;

class DeveloperProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('redirect.developer.profile.exists')->only(['create', 'store']);
    }

    public function index()
    {
        $developers = DeveloperProfile::filter(request())
            ->whereSearchStatus(DeveloperProfile::SEARCH_STATUS_OPEN)
            ->orderBy('created_at', 'DESC')
            ->get();

        return inertia('Profile/Developer/Index', compact('developers'));
    }

    public function create()
    {
        return inertia('Profile/Developer/Edit', [
            'developerProfile' => new DeveloperProfile
        ]);
    }

    public function store(DeveloperProfileRequest $request)
    {
        $data = array_merge($request->validated(), ['user_id' => auth()->id()]);

        $data['avatar'] = $request->file('avatar')?->store('avatars', 'public');

        $profile = DeveloperProfile::create($data);

        return redirect()->route('developers.profile.show', $profile->id);
    }

    public function show(DeveloperProfile $developer)
    {
        return inertia('Profile/Developer/Show', compact('developer'));
    }

    public function edit(int $id)
    {
        $developerProfile = DeveloperProfile::my()->findOrFail($id);

        return inertia('Profile/Developer/Edit', compact('id', 'developerProfile'));
    }

    public function update(int $id, DeveloperProfileRequest $request)
    {
        $data = $request->validated();

        $developer = DeveloperProfile::my()->findOrFail($id);

        unset($data['avatar']);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')?->store('avatars', 'public');

            Storage::disk('public')->delete($company->avatar ?? '');
        }

        $developer->update($data);

        return redirect()->route('developers.profile.show', $developer->id);
    }
}
