<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;


class RegisterController extends Controller
{
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'generate' => 'required',
        ]);

        $quotes = collect([
            "The only way to do great work is to love what you do. - Steve Jobs",
            "Success is not final, failure is not fatal: It is the courage to continue that counts. - Winston Churchill",
            "Believe you can and you're halfway there. - Theodore Roosevelt",
            "In the middle of every difficulty lies opportunity. - Albert Einstein",
            "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
            "The only limit to our realization of tomorrow will be our doubts of today. - Franklin D. Roosevelt",
            "You miss 100% of the shots you don't take. - Wayne Gretzky",
            "The best time to plant a tree was 20 years ago. The second best time is now. - Chinese Proverb",
            "The only person you are destined to become is the person you decide to be. - Ralph Waldo Emerson",
            "Your time is limited, don't waste it living someone else's life. - Steve Jobs"
        ]);

        $randomQuote = $quotes->random();

        return response()->json(['success' => true , 'quote' => $randomQuote]);
    }

}
