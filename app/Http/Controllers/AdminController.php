<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Coder;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('admin.dashboard');
    // }

    public function dashboard()
    {
        // Fetch the admin dashboard data
        // $users = User::where('user_type', 'user')->get();
        // return view('admin.dashboard', compact('users'));

        // Check if the user is an admin
        // if (Auth::user()->isAdmin()) {
        //     return view('admin.dashboard');
        // }
         $coders = Coder::with('company')->orderBy('created_at', 'desc')->paginate(20);  // eagar loading // loading both the coder and company data


        // return redirect()->route('coders.index'); // Normal user dashboard
        return view('admin.dashboard', ['coders_names' => $coders]);
    }

    // public function create()
    // {
    //     return view('admin.create');
    // }

    // public function store(Request $request)
    // {
    //     // Handle the form submission
    //     // ...
    //     return redirect()->route('admin.index')->with('success', 'Admin created successfully.');
    // }
    // public function edit($id)
    // {
    //     // Fetch the admin details for editing
    //     // ...
    //     return view('admin.edit', compact('id'));
    // }
    // public function update(Request $request, $id)
    // {
    //     // Handle the update
    //     // ...
    //     return redirect()->route('admin.index')->with('success', 'Admin updated successfully.');
    // }
    // public function destroy($id)
    // {
    //     // Handle the deletion
    //     // ...
    //     return redirect()->route('admin.index')->with('success', 'Admin deleted successfully.');
    // }
    // public function show($id)
    // {
    //     // Fetch the admin details
    //     // ...
    //     return view('admin.show', compact('id'));
    // }
    // public function list()
    // {
    //     // Fetch the list of admins
    //     // ...
    //     return view('admin.list');
    // }
    // public function settings()
    // {
    //     // Fetch the admin settings
    //     // ...
    //     return view('admin.settings');
    // }
    // public function profile()
    // {
    //     // Fetch the admin profile
    //     // ...
    //     return view('admin.profile');
    // }
    // public function notifications()
    // {
    //     // Fetch the admin notifications
    //     // ...
    //     return view('admin.notifications');
    // }
    // public function logs()
    // {
    //     // Fetch the admin logs
    //     // ...
    //     return view('admin.logs');
    // }
    // public function permissions()
    // {
    //     // Fetch the admin permissions
    //     // ...
    //     return view('admin.permissions');
    // }
    // public function roles()
    // {
    //     // Fetch the admin roles
    //     // ...
    //     return view('admin.roles');
    // }
    // public function activity()
    // {
    //     // Fetch the admin activity
    //     // ...
    //     return view('admin.activity');
    // }
    // public function reports()
    // {
    //     // Fetch the admin reports
    //     // ...
    //     return view('admin.reports');
    // }
    // public function analytics()
    // {
    //     // Fetch the admin analytics
    //     // ...
    //     return view('admin.analytics');
    // }
    // public function dashboard()
    // {
    //     // Fetch the admin dashboard data
    //     // ...
    //     return view('admin.dashboard');
    // }
    // public function settings()
    // {
    //     // Fetch the admin settings
    //     // ...
    //     return view('admin.settings');
    // }
    // public function help()
    // {
    //     // Fetch the admin help data
    //     // ...
    //     return view('admin.help');
    // }
    // public function feedback()
    // {
    //     // Fetch the admin feedback data
    //     // ...
    //     return view('admin.feedback');
    // }
    // public function support()
    // {
    //     // Fetch the admin support data
    //     // ...
    //     return view('admin.support');
    // }
    // public function api()
    // {
    //     // Fetch the admin API data
    //     // ...
    //     return view('admin.api');
    // }
    // public function integrations()
    // {
    //     // Fetch the admin integrations data
    //     // ...
    //     return view('admin.integrations');
    // }
    // public function updates()
    // {
    //     // Fetch the admin updates data
    //     // ...
    //     return view('admin.updates');
    // }
    // public function backup()
    // {
    //     // Fetch the admin backup data
    //     // ...
    //     return view('admin.backup');
    // }
    // public function restore()
    // {
    //     // Fetch the admin restore data
    //     // ...
    //     return view('admin.restore');
    // }
    // public function security()
    // {
    //     // Fetch the admin security data
    //     // ...
    //     return view('admin.security');
    // }
    // public function privacy()
    // {
    //     // Fetch the admin privacy data
    //     // ...
    //     return view('admin.privacy');
    // }
    // public function terms()
    // {
    //     // Fetch the admin terms data
    //     // ...
    //     return view('admin.terms');
    // }
    // public function logout()
    // {
    //     // Handle the admin logout
    //     // ...
    //     return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    // }
    // public function login()
    // {
    //     // Handle the admin login
    //     // ...
    //     return view('admin.login');
    // }
    // public function register()
    // {
    //     // Handle the admin registration
    //     // ...
    //     return view('admin.register');
    // }
    // public function postLogin(Request $request)
    // {
    //     // Handle the admin login form submission
    //     // ...
    //     return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully.');
    // }
    // public function postRegister(Request $request)
    // {
    //     // Handle the admin registration form submission
    //     // ...
    //     return redirect()->route('admin.dashboard')->with('success', 'Registered successfully.');
    // }
    // public function postLogout(Request $request)
    // {
    //     // Handle the admin logout form submission
    //     // ...
    //     return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    // }
    // public function postSettings(Request $request)
    // {
    //     // Handle the admin settings form submission
    //     // ...
    //     return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    // }
    // public function postProfile(Request $request)
    // {
    //     // Handle the admin profile form submission
    //     // ...
    //     return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    // }
    // public function postNotifications(Request $request)
    // {
    //     // Handle the admin notifications form submission
    //     // ...
    //     return redirect()->route('admin.notifications')->with('success', 'Notifications updated successfully.');
    // }
    // public function postLogs(Request $request)
    // {
    //     // Handle the admin logs form submission
    //     // ...
    //     return redirect()->route('admin.logs')->with('success', 'Logs updated successfully.');
    // }
    // public function postPermissions(Request $request)
    // {
    //     // Handle the admin permissions form submission
    //     // ...
    //     return redirect()->route('admin.permissions')->with('success', 'Permissions updated successfully.');
    // }
    // public function postRoles(Request $request)
    // {
    //     // Handle the admin roles form submission
    //     // ...
    //     return redirect()->route('admin.roles')->with('success', 'Roles updated successfully.');
    // }
    // public function postActivity(Request $request)
    // {
    //     // Handle the admin activity form submission
    //     // ...
    //     return redirect()->route('admin.activity')->with('success', 'Activity updated successfully.');
    // }
    // public function postReports(Request $request)
    // {
    //     // Handle the admin reports form submission
    //     // ...
    //     return redirect()->route('admin.reports')->with('success', 'Reports updated successfully.');
    // }
    // public function postAnalytics(Request $request)
    // {
    //     // Handle the admin analytics form submission
    //     // ...
    //     return redirect()->route('admin.analytics')->with('success', 'Analytics updated successfully.');
    // }
    // public function postDashboard(Request $request)
    // {
    //     // Handle the admin dashboard form submission
    //     // ...
    //     return redirect()->route('admin.dashboard')->with('success', 'Dashboard updated successfully.');
    // }
    // public function postHelp(Request $request)
    // {
    //     // Handle the admin help form submission
    //     // ...
    //     return redirect()->route('admin.help')->with('success', 'Help updated successfully.');
    // }
    // public function postFeedback(Request $request)
    // {
    //     // Handle the admin feedback form submission
    //     // ...
    //     return redirect()->route('admin.feedback')->with('success', 'Feedback updated successfully.');
    // }
    // public function postSupport(Request $request)
    // {
    //     // Handle the admin support form submission
    //     // ...
    //     return redirect()->route('admin.support')->with('success', 'Support updated successfully.');
    // }
    // public function postApi(Request $request)
    // {
    //     // Handle the admin API form submission
    //     // ...
    //     return redirect()->route('admin.api')->with('success', 'API updated successfully.');
    // }
    // public function postIntegrations(Request $request)
    // {
    //     // Handle the admin integrations form submission
    //     // ...
    //     return redirect()->route('admin.integrations')->with('success', 'Integrations updated successfully.');
    // }
    // public function postUpdates(Request $request)
    // {
    //     // Handle the admin updates form submission
    //     // ...
    //     return redirect()->route('admin.updates')->with('success', 'Updates updated successfully.');
    // }
    // public function postBackup(Request $request)
    // {
    //     // Handle the admin backup form submission
    //     // ...
    //     return redirect()->route('admin.backup')->with('success', 'Backup updated successfully.');
    // }
    // public function postRestore(Request $request)
    // {
    //     // Handle the admin restore form submission
    //     // ...
    //     return redirect()->route('admin.restore')->with('success', 'Restore updated successfully.');
    // }
    // public function postSecurity(Request $request)
    // {
    //     // Handle the admin security form submission
    //     // ...
    //     return redirect()->route('admin.security')->with('success', 'Security updated successfully.');
    // }
    // public function postPrivacy(Request $request)
    // {
    //     // Handle the admin privacy form submission
    //     // ...
    //     return redirect()->route('admin.privacy')->with('success', 'Privacy updated successfully.');
    // }
    // public function postTerms(Request $request)
    // {
    //     // Handle the admin terms form submission
    //     // ...
    //     return redirect()->route('admin.terms')->with('success', 'Terms updated successfully.');
    // }
}
