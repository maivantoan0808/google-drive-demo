<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\PutFile;

class DemoController extends Controller
{
    public function store(Request $request)
    {
        $name = $request->file->getClientOriginalName();
        $request->file->storeAs('/', $name, 'google');
        
        PutFile::dispatch($name);

        return 'File was saved to Google Drive';
    }
}
