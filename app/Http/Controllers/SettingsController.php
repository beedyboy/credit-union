<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\JsonHelper;

class SettingsController extends Controller
{
  private $_users;
  public function __construct()
  {

    $user_path = base_path("resources/json/users.json");
    $this->_users = json_decode(file_get_contents($user_path), true);
  }
    public function index()
    {
        $user = []; 
    
        if (session()->has('user')) {
            $user = $this->_users[session()->get('email')];
        }
        $path = base_path("resources/json/user.json");
        // Read user settings from JSON file
        $settings = JsonHelper::readJson($path);
        return view('settings.view-profile', compact('user', 'settings'));
    }

    public function update(Request $request)
    {
        // Validate and update user settings
        $validatedData = $request->validate([
            'setting_name' => 'required',
            // Add more validation rules as needed
        ]);

        // Read existing settings from JSON file
        $settings = JsonHelper::readJson(storage_path('app/settings.json'));

        // Update settings based on form input
        $settings['setting_name'] = $validatedData['setting_name'];
        // Add more settings as needed

        // Write updated settings back to JSON file
        JsonHelper::writeJson($settings, storage_path('app/settings.json'));

        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    public function notifications()
    {
        // Read user notification preferences from JSON file
        $user = []; 
    
        if (session()->has('user')) {
            $user = $this->_users[session()->get('email')];
        }
    
   
        return view('settings.notifications')->with('user', $user);
    }

    public function updateNotifications(Request $request)
    {
        // Validate and update user notification preferences
        $validatedData = $request->validate([
            'email_notifications' => 'required|boolean',
            // Add more validation rules as needed
        ]);

        // Read existing notification preferences from JSON file
        $notifications = JsonHelper::readJson(storage_path('app/notifications.json'));

        // Update notification preferences based on form input
        $notifications['email_notifications'] = $validatedData['email_notifications'];
        // Add more preferences as needed

        // Write updated preferences back to JSON file
        JsonHelper::writeJson($notifications, storage_path('app/notifications.json'));

        return redirect()->back()->with('success', 'Notification preferences updated successfully');
    }
}
