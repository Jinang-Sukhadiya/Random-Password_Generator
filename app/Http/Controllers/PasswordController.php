<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class PasswordController extends Controller
{
    public function showPasswordForm()
    {
        return view('password.form');
    }

//     public function generatePassword(Request $request)
//  {
//     $request->validate([
//         'length' => 'required|integer|min:0|max:9',
//     ]);

//     $length = intval($request->input('length'));
//     $password = $this->generateRandomPassword($length);
//     $totalCombinations = $this->calculateCombinations($length);

//     return view('password.result', compact('password', 'totalCombinations'));
//  }


    private function calculateCombinations($length)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+=[]{}|;:,.<>?';
        $charsLength = strlen($chars);
        $combinations = pow($charsLength, $length);

        return $combinations;
    }

    private function generateRandomPassword($length)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+=[]{}|;:,.<>?';
        $password = '';
        $charsLength = strlen($chars);

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $charsLength - 1);
            $password .= $chars[$randomIndex];
        }

        return $password;

    }


 public function generatePassword(Request $request)
 {
    $request->validate([
        'length' => 'required|integer|min:6|max:50',
    ]);

    $length = intval($request->input('length'));
    $passwords = [];

    // Generate multiple passwords based on the desired length
    $numberOfPasswords = 100; // You can adjust the number of passwords you want to generate
    for ($i = 0; $i < $numberOfPasswords; $i++) {
        $passwords[] = $this->generateRandomPassword($length);
    }

    // Save passwords into the session
    Session::put('generate_password', $passwords);

    return view('password.result', compact('passwords', 'length'));
 }


public function downloadPasswords()
{
    $passwords = session('generated_passwords', []);
    $content = implode(PHP_EOL, $passwords);
    $filename = 'generated_passwords.txt';

    return Response::make($content, 200, [
        'Content-Type' => 'text/plain',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ]);
}

}
