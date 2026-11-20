<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    // Display Create User form
    public function create()
    {
        return view('users-create');
    }

    // Save a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                'unique:users,username',
            ],
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Keep name synchronized with full_name
        $validated['name'] = $validated['full_name'];

        // Process and resize uploaded avatar
        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $this->saveAvatar(
                $request->file('avatar')
            );
        }

        try {
            User::create($validated);
        } catch (\Throwable $e) {
            if (!empty($validated['avatar'])) {
                Storage::disk('public')->delete($validated['avatar']);
            }

            throw $e;
        }

        return redirect('/users')
            ->with('success', 'User created successfully!');
    }

    // Display Edit User form
    public function edit(User $user)
    {
        return view('users-edit', compact('user'));
    }

    // Update an existing user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Keep name synchronized with full_name
        $validated['name'] = $validated['full_name'];

        // Keep the current password if no new one is entered
        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $oldAvatar = $user->avatar;
        $newAvatar = null;

        // Process replacement avatar if uploaded
        if ($request->hasFile('avatar')) {
            $newAvatar = $this->saveAvatar(
                $request->file('avatar')
            );

            $validated['avatar'] = $newAvatar;
        }

        try {
            $user->update($validated);
        } catch (\Throwable $e) {
            if ($newAvatar) {
                Storage::disk('public')->delete($newAvatar);
            }

            throw $e;
        }

        // Delete old avatar after successful update
        if ($newAvatar && $oldAvatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        return redirect('/users')
            ->with('success', 'User updated successfully!');
    }

    // Resize and save an avatar
    private function saveAvatar($file): string
    {
        $manager = new ImageManager(new Driver());

        // Read uploaded image
        $image = $manager->read($file->getRealPath());

        // Crop and resize to 300 x 300 pixels
        $image->cover(300, 300);

        // Generate a unique filename
        $filename = Str::uuid() . '.jpg';

        $path = 'avatars/' . $filename;

        // Convert to JPEG and store on public disk
        Storage::disk('public')->put(
            $path,
            (string) $image->toJpeg(85)
        );

        return $path;
    }
}
