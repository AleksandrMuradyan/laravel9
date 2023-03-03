<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Str;
use Session;

class LoginUserCommand extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:login {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User Login';

    /**
     * Execute the console command.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function handle()
    {


        $validator = Validator::make($this->option(), [
            'email' => ['required', 'string', 'email', 'exists:users'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {


            $this->info(response()->json(['errors' => $validator->errors()]));
        } else {
            $request = [
                'email' => $this->option('email'),
                'password' => $this->option('password'),
            ];

            $credentials = $request;

            if (Auth::attempt($credentials)) {
                Auth::user()->token_unique = Str::random(10);
                Auth::user()->token_created_at = Carbon::now();
                Auth::user()->update();
                $this->info(response()->json('success you token' .'  '. Auth::user()->token_unique));

            } else {
                $this->info(response()->json('Login details are not valid'));

            }

        }

    }
}
