<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     */
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users_create');
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

        return redirect()->route('users')
                         ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing an existing user.
     */
    public function edit(User $user)
    {
        return view('users_edit', compact('user'));
    }

    /**
     * Update the specified user in the database.
     * Handles optional avatar upload, resize via GD, and old-file cleanup.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username'  => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['nullable', 'email', 'max:255'],
            'avatar'    => ['nullable', 'image', 'max:2048'],   // max 2 MB
        ]);

        $data = [
            'username'  => $request->username,
            'full_name' => $request->full_name,
            'name'      => $request->full_name,
            'email'     => $request->email ?? $user->email,
        ];

        // ── Avatar upload ───────────────────────────────────────────────────
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');

            // Generate a unique filename
            $filename = 'avatars/' . $user->id . '_' . time() . '.jpg';

            // ── Resize to 200×200 thumbnail using PHP GD ────────────────────
            // Load source image
            $mime    = $file->getMimeType();
            $tmpPath = $file->getRealPath();

            if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
                $src = imagecreatefromjpeg($tmpPath);
            } elseif ($mime === 'image/png') {
                $src = imagecreatefrompng($tmpPath);
            } elseif ($mime === 'image/gif') {
                $src = imagecreatefromgif($tmpPath);
            } elseif ($mime === 'image/webp') {
                $src = imagecreatefromwebp($tmpPath);
            } else {
                $src = imagecreatefromjpeg($tmpPath);
            }

            $srcW = imagesx($src);
            $srcH = imagesy($src);

            // Square-crop from centre, then resize to 200×200
            $size     = min($srcW, $srcH);
            $offsetX  = intdiv($srcW - $size, 2);
            $offsetY  = intdiv($srcH - $size, 2);

            $thumb = imagecreatetruecolor(200, 200);
            imagecopyresampled($thumb, $src, 0, 0, $offsetX, $offsetY, 200, 200, $size, $size);

            // Capture to buffer and store via Storage facade
            ob_start();
            imagejpeg($thumb, null, 85);
            $imageData = ob_get_clean();

            imagedestroy($src);
            imagedestroy($thumb);

            // Store on the public disk (storage/app/public/avatars/...)
            Storage::disk('public')->put($filename, $imageData);

            // Delete the old avatar file if one existed
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $filename;
        }

        $user->update($data);

        return redirect()->route('users')
                         ->with('success', 'User updated successfully.');
    }
}
