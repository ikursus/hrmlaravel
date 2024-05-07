<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Laravel akan cari folder resources/views
        // dan template bernama welcome.php atau welcome.blade.php

        $pageTitle = '<h1>Welcome Page</h1><script>alert("Anda dihack")</script>';
        $subTitle = 'Sub Title';
        $copyright = config('hrm.site.copyright');

        $senaraiUsers = [
            ['name' => 'Ahmad', 'email' => 'ahmad@gmail.com', 'status' => 'aktif'],
            ['name' => 'Ali', 'email' => 'ali@gmail.com', 'status' => 'banned'],
            ['name' => 'Abu', 'email' => 'abu@gmail.com', 'status' => 'pending'],
        ];

        // Cara 1 passing / attach data ke template
        // return view('welcome')->with('pageTitle', $pageTitle)->with('subTitle', $subTitle)->with('copyright', $copyright);
        // Cara 2 passing / attach data ke template
        // return view('welcome', ['pageTitle' => $pageTitle, 'subTitle' => $subTitle,'copyright' => $copyright]);
        // Cara 3 passing / attach data ke template
        return view('welcome', compact('pageTitle', 'subTitle', 'copyright', 'senaraiUsers'));
    }
}
