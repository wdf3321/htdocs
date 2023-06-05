<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $locale = $request->input('locale');
        App::setLocale($locale);

        return redirect()->back();
    }
    
}

?>
