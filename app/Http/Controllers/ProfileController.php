<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $data = $request->only(['name', 'email']);

        if (empty($data)) {
            return response()->json(['error' => 'Provide at least one field: name or email'], 400);
        }

        $user->update($data);

        return response()->json([
            'message' => 'Profile updated',
            'profile' => [
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    }
}
