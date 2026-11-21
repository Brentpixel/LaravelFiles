<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Apply auth middleware to all resource actions.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of all users.
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'  => ['required', 'string', 'max:255', 'unique:users,username'],
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['nullable', 'email', 'max:255'],
        ]);

        User::create([
            'username'  => $request->username,
            'full_name' => $request->full_name,
            'name'      => $request->full_name,
            'email'     => $request->email ?? '',
            'password'  => bcrypt('password'),
        ]);

        return redirect()->route('users.index')
                         ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing an existing user.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user (with optional avatar upload via GD).
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username'  => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['nullable', 'email', 'max:255'],
            'avatar'    => ['nullable', 'image', 'max:2048'],
        ]);

        $data = [
            'username'  => $request->username,
            'full_name' => $request->full_name,
            'name'      => $request->full_name,
            'email'     => $request->email ?? $user->email,
        ];

        // ── Avatar upload & GD resize ──────────────────────────────────────
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file     = $request->file('avatar');
            $filename = 'avatars/' . $user->id . '_' . time() . '.jpg';
            $mime     = $file->getMimeType();
            $tmpPath  = $file->getRealPath();

            $src = match(true) {
                in_array($mime, ['image/jpeg','image/jpg']) => imagecreatefromjpeg($tmpPath),
                $mime === 'image/png'  => imagecreatefrompng($tmpPath),
                $mime === 'image/gif'  => imagecreatefromgif($tmpPath),
                $mime === 'image/webp' => imagecreatefromwebp($tmpPath),
                default                => imagecreatefromjpeg($tmpPath),
            };

            $srcW    = imagesx($src);
            $srcH    = imagesy($src);
            $size    = min($srcW, $srcH);
            $offsetX = intdiv($srcW - $size, 2);
            $offsetY = intdiv($srcH - $size, 2);

            $thumb = imagecreatetruecolor(200, 200);
            imagecopyresampled($thumb, $src, 0, 0, $offsetX, $offsetY, 200, 200, $size, $size);

            ob_start();
            imagejpeg($thumb, null, 85);
            $imageData = ob_get_clean();

            imagedestroy($src);
            imagedestroy($thumb);

            Storage::disk('public')->put($filename, $imageData);

            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $filename;
        }

        $user->update($data);

        return redirect()->route('users.index')
                         ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from the database.
     */
    public function destroy(User $user)
    {
        // Clean up avatar file first
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('users.index')
                         ->with('success', 'User deleted successfully.');
    }
}
