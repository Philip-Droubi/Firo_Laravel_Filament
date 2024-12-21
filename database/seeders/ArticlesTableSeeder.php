<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('articles')->delete();
        
        \DB::table('articles')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'category_id' => 2,
                'main_img_url' => 'articles/01JFGNKVFJKD3S5V92DR5CJS1F.png',
                'title' => 'Laravel API Authentication via Sanctum & Socialite and test on Postman',
                'body' => '<p><strong>Laravel Sanctum with Socialite API</strong></p><p>Hello everyone, this is my first post on DEV.to . In this post, I will show you how to implement Laravel Sanctum with Socialite in a very basic way.</p><p>So let\'s get started. </p><p><strong>1. Create a new Laravel project:</strong></p><p><strong>Step 1:</strong> Open your terminal OR command prompt and run this command:</p><pre class="hljs"><code>composer create-project laravel/laravel test</code></pre><p>Or by this command:</p><pre class="hljs"><code>laravel new test</code></pre><p><strong>Step 2:</strong> Create a new DB, then go to your <code>.env</code> file and add your database details.</p><p>For example:</p><pre class="hljs"><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=root
DB_PASSWORD=</code></pre><p><strong>2. Install Laravel Sanctum Package:</strong></p><p><strong>Step 1:</strong> Install Laravel Sanctum via the Composer:</p><pre class="hljs"><code>composer require laravel/sanctum</code></pre><p><strong>Step 2:</strong> You should publish the Sanctum configuration and migration files using the <code>vendor:publish</code> Artisan command:</p><pre class="hljs"><code>php artisan vendor:publish --provider="Laravel\\Sanctum\\SanctumServiceProvider"</code></pre><p><strong>Step 3:</strong> Uncomment the Sanctum middleware in <code>app/Http/Kernel.php</code> file :</p><pre class="hljs"><code>\'api\' =&gt; [
\\Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful::class,
\'throttle:api\',
\\Illuminate\\Routing\\Middleware\\SubstituteBindings::class,
],</code></pre><p><strong>Step 4:</strong> Go to the users table and set <code>password</code> to <code>nullable()</code> as Laravel Socialite does not need a password:</p><pre class="hljs"><code>&lt;?php

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create(\'users\', function (Blueprint $table) {
$table-&gt;id();
$table-&gt;string(\'name\');
$table-&gt;string(\'email\')-&gt;unique();
$table-&gt;timestamp(\'email_verified_at\')-&gt;nullable();
$table-&gt;string(\'password\')-&gt;nullable();
$table-&gt;rememberToken();
$table-&gt;timestamps();
});
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::dropIfExists(\'users\');
}
};</code></pre><p><strong>Step 5:</strong> Now we need to create an AuthController to handle users sign-in and sign-up:</p><p><code>php artisan make:controller AuthController</code></p><p>This is a very simple Auth controller with two functions <code>register</code> and <code>login</code>:</p><pre class="hljs"><code>&lt;?php

namespace App\\Http\\Controllers;

use App\\Http\\Controllers\\Controller;
use App\\Models\\User;
use Illuminate\\Http\\Request;
use Illuminate\\Support\\Facades\\Validator;
use Illuminate\\Support\\Facades\\Hash;
use Illuminate\\Support\\Facades\\Auth;

class AuthController extends Controller
{
public function register(Request $request)
{
$validator = Validator::make($request-&gt;only(\'name\', \'email\', \'password\', \'password_confirmation\'), [
\'name\' =&gt; [\'required\', \'min:2\', \'max:50\', \'string\'],
\'email\' =&gt; [\'required\', \'email\', \'unique:users,email\'],
\'password\' =&gt; [\'required\', \'min:6\', \'max:255\', \'confirmed\', \'string\'],
]);
if ($validator-&gt;fails())
return response()-&gt;json($validator-&gt;errors(), 400);
$input = $request-&gt;only(\'name\', \'email\', \'password\');
$input[\'password\'] = Hash::make($request[\'password\']);
$user = User::create($input);
$data =  [
\'token\' =&gt; $user-&gt;createToken(\'Sanctom+Socialite\')-&gt;plainTextToken,
\'user\' =&gt; $user,
];
return response()-&gt;json($data, 200);
}

public function login(Request $request)
{
$validator = Validator::make($request-&gt;only(\'email\', \'password\'), [
\'email\' =&gt; [\'required\', \'email\', \'exists:users,email\'],
\'password\' =&gt; [\'required\', \'min:6\', \'max:255\', \'string\'],
]);
if ($validator-&gt;fails())
return response()-&gt;json($validator-&gt;errors(), 400);
if (Auth::attempt([\'email\' =&gt; $request-&gt;email, \'password\' =&gt; $request-&gt;password])) {
$user = $request-&gt;user();
$data =  [
\'token\' =&gt; $user-&gt;createToken(\'Sanctom+Socialite\')-&gt;plainTextToken,
\'user\' =&gt; $user,
];
return response()-&gt;json($data, 200);
}
}
}</code></pre><p><strong>3. Install Laravel Socialite Package:</strong></p><p><strong>Step 1:</strong> To get started with Socialite, use the Composer package manager to add the package to your project\'s dependencies:</p><pre class="hljs"><code>composer require laravel/socialite</code></pre><p><strong>Step 2:</strong> Before using Socialite, you will need to add credentials for the OAuth providers your application utilizes,(In my case it\'s Google), So go to <code>config/services.php</code> and add this code:</p><pre class="hljs"><code>\'google\' =&gt; [
\'client_id\' =&gt; env(\'GOOGLE_CLIENT_ID\'),
\'client_secret\' =&gt; env(\'GOOGLE_CLIENT_SECRET\'),
\'redirect\' =&gt; \'GOOGLE_REDIRECT_URI\',
],</code></pre><p><strong><em>Remember that this will only work for Google tokens</em></strong>.</p><p>Since you are building API you don\'t need to set anything in your <code>.env</code> file to let socialite work.</p><p><strong>Step 3:</strong> To keep things organized you need a new controller to handle login via provider, So we will create it:</p><pre class="hljs"><code>php artisan make:controller SocialiteController</code></pre><p>Now we need to make two functions <code>handleProviderCallback</code> to handle the login and <code>validateProvider</code> to check what provider used:</p><pre class="hljs"><code>&lt;?php

namespace App\\Http\\Controllers;

use App\\Http\\Controllers\\Controller;
use App\\Models\\User;
use Illuminate\\Http\\Request;
use Laravel\\Socialite\\Facades\\Socialite;
use Illuminate\\Support\\Facades\\Validator;

class SocialiteController extends Controller
{
public function handleProviderCallback(Request $request)
{
$validator = Validator::make($request-&gt;only(\'provider\', \'access_provider_token\'), [
\'provider\' =&gt; [\'required\', \'string\'],
\'access_provider_token\' =&gt; [\'required\', \'string\']
]);
if ($validator-&gt;fails())
return response()-&gt;json($validator-&gt;errors(), 400);
$provider = $request-&gt;provider;
$validated = $this-&gt;validateProvider($provider);
if (!is_null($validated))
return $validated;
$providerUser = Socialite::driver($provider)-&gt;userFromToken($request-&gt;access_provider_token);
$user = User::firstOrCreate(
[
\'email\' =&gt; $providerUser-&gt;getEmail()
],
[
\'name\' =&gt; $providerUser-&gt;getName(),
]
);
$data =  [
\'token\' =&gt; $user-&gt;createToken(\'Sanctom+Socialite\')-&gt;plainTextToken,
\'user\' =&gt; $user,
];
return response()-&gt;json($data, 200);
}

protected function validateProvider($provider)
{
if (!in_array($provider, [\'google\'])) {
return response()-&gt;json(["message" =&gt; \'You can only login via google account\'], 400);
}
}
}</code></pre><p><strong>Step 4:</strong> We need now to create our API routes, So go to <code>routes/api.php</code> and add these routes:</p><pre class="hljs"><code>use App\\Http\\Controllers\\AuthController;
use App\\Http\\Controllers\\SocialiteController;
Route::controller(AuthController::class)-&gt;group(function () {
Route::post(\'/\', \'register\');
Route::post(\'/login\', \'login\');
});

Route::post(\'/login/callback\', [SocialiteController::class, \'handleProviderCallback\']);</code></pre><p><strong>Step 5:</strong> Run:</p><p><code>php artisan migrate</code></p><p>And:</p><p><code>php artisan serv</code></p><p>Now that we\'ve finished the code, let\'s go to Postman and test our routes:</p><p><strong>Test normal register and login</strong>:</p><p><strong>register</strong>:</p>
<p><img src="http://127.0.0.1:8000/storage/articles/2/182cdd78-fb8e-4fbc-8977-d1f1379ccd2f.PNG" alt="REGISTER"></p><p><strong>Via Socialite</strong>:</p><p><img src="http://127.0.0.1:8000/storage/articles/2/36f063a2-a1f5-4c8c-9df0-f2c2abc680ac.PNG" alt="via Laravel Socialite"></p><p></p><p>You may now be wondering how to get <strong>access_provider_token</strong>, well I&#039;m using a Flutter application created by my friend <a href="https://www.linkedin.com/in/fadi-asfour" target="_blank" data-as-button="false">Fadi Asfour</a> to get these tokens.</p><p>Some images from the Flutter app:</p><p style="text-align: center;"><img src="http://127.0.0.1:8000/storage/articles/2/93140b83-9d37-4797-b7e0-dbb2642603dc.jpg" width="254"> <img src="http://127.0.0.1:8000/storage/articles/2/c839e36d-46c9-45a2-bb3e-c19d8923ea4b.jpg" width="254"></p><p></p><p></p><p><strong>Or</strong> get the token online from this <a href="https://fadi-asfour.github.io/get_access_token" data-as-button="false">SITE</a>.</p><p>You can see all user info given by Google token by <code>dd</code> the <code>$providerUser</code> in <code>SocialiteController</code>:</p><p><img src="http://127.0.0.1:8000/storage/articles/2/9c74e2de-7458-4b79-9057-cabccd831789.PNG" alt="All Info"></p><p></p><p><strong>You can get the source code for this project from <a href="https://github.com/Philip-Droubi/Laravel-Sanctum-Socialite-example" target="_blank" data-as-button="true" data-as-button-theme="secondary">GITHUB</a>.</strong></p><p>In the end, I hope this article is useful and helpful to you, and remember that this is just a very simple form of the code so that the article is not too long, so try to add what you need (for example <code>Providers Table</code>), and link each user registered by Laravel Socialite to this table and record the user Provider and other details, and do not forget your touch.</p>',
'is_draft' => 0,
'published_at' => NULL,
'created_at' => '2024-12-19 23:56:28',
'updated_at' => '2024-12-19 23:56:28',
),
));
        
        
    }
}