<?php

namespace App\Http\Controllers;

use App\Repository;
use App\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TargetsController extends Controller
{

    public function create(Request $request, $repository)
    {
        $repository = Repository::find($repository);

        if (request('target') === 'boss') {
            $request->session()->flash('name', 'Boss');
            $request->session()->flash('host', '149.202.95.126');
            $request->session()->flash('db_prefix', str_before($repository->name, '-') . '_');
        }

        return view('targets.create', compact('repository'));
    }

    public function store(Request $request, $repository)
    {
        $request->validate([
            'name' => 'required',
            'host' => 'required',
            'url' => 'required',
            'db_name' => 'required',
            'db_host' => 'required',
            'db_user' => 'required',
            'db_pass' => 'required',
        ]);

        $target = Target::create([
            'name' => request('name'),
            'repository_id' => $repository,
            'host' => request('host'),
            'url' => request('url'),
            'db_name' => request('db_name'),
            'db_host' => request('db_host'),
            'db_user' => request('db_user'),
            'db_pass' => request('db_pass'),
        ]);

        if (request('create_wp')) {
            $this->generateWPConfig($target);
        }

        return redirect('/repositories/' . $repository);

    }

    public function generateWPConfig($target)
    {

//        $target = Target::first();

        $template = Storage::get('wp-config.txt');

        $template = str_replace('database_name_here', $target->db_name, $template);
        $template = str_replace('username_here', $target->db_user, $template);
        $template = str_replace('password_here', $target->db_pass, $template);
        $template = str_replace('localhost', $target->db_host, $template);

        Storage::disk('local')->put('wp-config-generated.txt', $template);

    }
}


//<?php
///**
// * The base configuration for WordPress
// *
// * The wp-config.php creation script uses this file during the
// * installation. You don't have to use the web site, you can
// * copy this file to "wp-config.php" and fill in the values.
// *
// * This file contains the following configurations:
// *
// * * MySQL settings
// * * Secret keys
// * * Database table prefix
// * * ABSPATH
// *
// * @link https://codex.wordpress.org/Editing_wp-config.php
// *
// * @package WordPress
// */
//// ** MySQL settings - You can get this info from your web host ** //
///** The name of the database for WordPress */
//define('DB_NAME', 'database_name_here');
///** MySQL database username */
//define('DB_USER', 'username_here');
///** MySQL database password */
//define('DB_PASSWORD', 'password_here');
///** MySQL hostname */
//define('DB_HOST', 'localhost');
///** Database Charset to use in creating database tables. */
//define('DB_CHARSET', 'utf8');
///** The Database Collate type. Don't change this if in doubt. */
//define('DB_COLLATE', '');
///**#@+
// * Authentication Unique Keys and Salts.
// *
// * Change these to different unique phrases!
// * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
// * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
// *
// * @since 2.6.0
// */
//define('AUTH_KEY',         'put your unique phrase here');
//define('SECURE_AUTH_KEY',  'put your unique phrase here');
//define('LOGGED_IN_KEY',    'put your unique phrase here');
//define('NONCE_KEY',        'put your unique phrase here');
//define('AUTH_SALT',        'put your unique phrase here');
//define('SECURE_AUTH_SALT', 'put your unique phrase here');
//define('LOGGED_IN_SALT',   'put your unique phrase here');
//define('NONCE_SALT',       'put your unique phrase here');
///**#@-*/
///**
// * WordPress Database Table prefix.
// *
// * You can have multiple installations in one database if you give each
// * a unique prefix. Only numbers, letters, and underscores please!
// */
//$table_prefix  = 'wp_';
///**
// * For developers: WordPress debugging mode.
// *
// * Change this to true to enable the display of notices during development.
// * It is strongly recommended that plugin and theme developers use WP_DEBUG
// * in their development environments.
// *
// * For information on other constants that can be used for debugging,
// * visit the Codex.
// *
// * @link https://codex.wordpress.org/Debugging_in_WordPress
// */
//define('WP_DEBUG', false);
///* That's all, stop editing! Happy blogging. */
///** Absolute path to the WordPress directory. */
//if ( !defined('ABSPATH') )
//    define('ABSPATH', dirname(__FILE__) . '/');
///** Sets up WordPress vars and included files. */
//require_once(ABSPATH . 'wp-settings.php');