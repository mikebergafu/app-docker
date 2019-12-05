<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function index(Request $request){

        //return $request;
        $title = 'Logs';

        try {
            $date = new Carbon($request->get('date', today()));

            $filePath = storage_path("logs/laravel-{$date->format('Y-m-d')}.log");
            $data = [];
            if(File::exists($filePath)){
                $data = [
                    'lastModified'=>new Carbon(File::lastModified($filePath)),
                    'size'=>File::size($filePath),
                    'file'=>File::get($filePath)
                ];
            }else{
                alert('Oops!','Error loading logs', 'danger');

                return redirect()->back();
            }


        } catch (\Exception $e) {
            alert('Oops!','Error loading logs', 'danger');

            return redirect()->back();
        }

        $results = array();

        $results['user_details']= Auth::guard('admin')->user();

        return view('admin.pages.logs', compact('date','data','title','results'));
    }
}
