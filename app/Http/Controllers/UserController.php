<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller {


    /**
     * create new user
     *
     * @param Request $request
     * @return user
     */
    public function register(Request $request) {

        print_r("i am here");
        die;
        try {
            $inputs = $request->all();
            $result = User::saveNewUser([
                'email' => $inputs['email'],
                'password' =>  Hash::make($inputs['password']),
            ]);

            if ($result) {
                return response()->json(['user' => $result], 200);
            }
        } catch (\Exception $ex) {
            $log = [];
            $log["message"] = $ex->getMessage();
            $log["file"] = $ex->getFile();
            $log["line"] = $ex->getLine();
            \Log::info(print_r($log, true));
        }
        return response()->json(['message' => "Something went wrong in creating a new user!"], 400);
    }

    /**
     * login user
     *
     * @param Request $request
     * @return jwt
     */
    public function login(Request $request) {

        try {
            $inputs = $request->get('data');

            if (Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']])) {
                $user = User::where('email', $inputs['email'])->first();
                $token = $user->createToken('UserToken')->plainTextToken;
                return response()->json(['jwt' => $token], 200);
            } else {
                return response()->json(['message' => "Invalid credentials. Please try again."], 400);
            }
        } catch (\Exception $ex) {
            $log = [];
            $log["message"] = $ex->getMessage();
            $log["file"] = $ex->getFile();
            $log["line"] = $ex->getLine();
            \Log::info(print_r($log, true));
        }
        return response()->json(['message' => "Something went wrong in creating a new user!"], 400);
    }



    /**
     * get user
     *
     * @param Request $request
     * @return jwt
     */
    public function getUser(Request $request) {

        try {
            $user = $request->get('user');
            return response()->json(['user' => $this->cookUserData($user)], 200);

            // else {
            //     return response()->json(['message' => "Invalid credentials. Please try again."], 400);
            // }
        } catch (\Exception $ex) {
            $log = [];
            $log["message"] = $ex->getMessage();
            $log["file"] = $ex->getFile();
            $log["line"] = $ex->getLine();
            \Log::info(print_r($log, true));
        }
        return response()->json(['message' => "Something went wrong in creating a new user!"], 400);
    }

    public function cookUserData($user) {

        return ['id' => $user['id'], 'email' => $user['email']];
    }
}
