<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index() {  return view('welcome'); }
    public function about() {  return view('about'); }
    public function contacts() {  return view('contacts'); }
}
