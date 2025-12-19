<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function settings()
    {
        $user = Auth::user();
        return view('settings/company', compact('user'));
    }
    
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        
        // Update phone if field exists
        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }
        
        // Update address if field exists
        if ($request->has('address')) {
            $user->address = $request->address;
        }
        
        $user->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully'
        ]);
    }
    
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is incorrect'
            ], 422);
        }
        
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Password updated successfully'
        ]);
    }
    
    public function currencies()
    {
        return view('settings/currencies');
    }
    
    public function language()
    {
        return view('settings/language');
    }
    
    public function notification()
    {
        return view('settings/notification');
    }
    
    public function notificationAlert()
    {
        return view('settings/notificationAlert');
    }
    
    public function paymentGateway()
    {
        return view('settings/paymentGateway');
    }
    
    public function theme()
    {
        return view('settings/theme');
    }
    
}
