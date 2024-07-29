<?php

namespace App\Http\Controllers;

use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $url = __DIR__ . '/../../../storage/storage/' . $request->folder . '/' . $request->path;
        $contents = file_get_contents($url);
        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->buffer($contents);
        $response = Response::make($contents, 200);
        $response->header('Content-Type', $mime_type);
        return $response;
    }
}
