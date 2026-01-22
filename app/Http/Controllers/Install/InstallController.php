<?php

namespace App\Http\Controllers\Install;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class InstallController extends Controller
{
    public function welcome()
    {
        return view('install.welcome');
    }

    public function requirements()
    {
        $requirements = [
            'PHP Version >= 8.1' => version_compare(PHP_VERSION, '8.1.0', '>='),
            'BCMath Extension' => extension_loaded('bcmath'),
            'Ctype Extension' => extension_loaded('ctype'),
            'JSON Extension' => extension_loaded('json'),
            'Mbstring Extension' => extension_loaded('mbstring'),
            'OpenSSL Extension' => extension_loaded('openssl'),
            'PDO Extension' => extension_loaded('pdo'),
            'Tokenizer Extension' => extension_loaded('tokenizer'),
            'XML Extension' => extension_loaded('xml'),
            'Storage Writable' => is_writable(storage_path()),
            'Bootstrap Cache Writable' => is_writable(base_path('bootstrap/cache')),
        ];

        $all_met = !in_array(false, $requirements);

        return view('install.requirements', compact('requirements', 'all_met'));
    }

    public function database()
    {
        return view('install.database');
    }

    public function postDatabase(Request $request)
    {
        $request->validate([
            'db_host' => 'required',
            'db_name' => 'required',
            'db_user' => 'required',
        ]);

        try {
            $config = config('database.connections.mysql');
            $config['host'] = $request->db_host;
            $config['database'] = $request->db_name;
            $config['username'] = $request->db_user;
            $config['password'] = $request->db_pass ?? '';

            config(['database.connections.mysql' => $config]);
            DB::purge('mysql');
            DB::connection()->getPdo();

            // Save to .env
            $this->updateEnv([
                'DB_HOST' => $request->db_host,
                'DB_DATABASE' => $request->db_name,
                'DB_USERNAME' => $request->db_user,
                'DB_PASSWORD' => $request->db_pass ?? '',
            ]);

            return redirect()->route('install.admin');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Could not connect to the database: ' . $e->getMessage()]);
        }
    }

    public function admin()
    {
        return view('install.admin');
    }

    public function postAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        try {
            // Run Migrations
            Artisan::call('migrate:fresh', ['--force' => true]);
            Artisan::call('db:seed', ['--force' => true]);

            // Create Admin
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin', // Assuming 'role' column exists
            ]);

            return redirect()->route('install.finish')->with([
                'email' => $request->email,
                'password' => $request->password
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Installation failed: ' . $e->getMessage()]);
        }
    }

    public function finish()
    {
        File::put(storage_path('installed'), date('Y-m-d H:i:s'));
        return view('install.finish');
    }

    private function updateEnv($data)
    {
        $path = base_path('.env');
        if (!file_exists($path)) {
            if (file_exists(base_path('.env.example'))) {
                copy(base_path('.env.example'), $path);
            } else {
                touch($path);
            }
        }

        $content = file_get_contents($path);
        foreach ($data as $key => $value) {
            // Check if key exists
            if (preg_match("/^{$key}=/m", $content)) {
                $content = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $content);
            } else {
                $content .= "\n{$key}={$value}";
            }
        }
        file_put_contents($path, $content);
    }
}
