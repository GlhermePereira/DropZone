<?php

namespace App\Http\Controllers;

use App\Models\DropZone;
use Illuminate\Http\Request;  // Certifique-se de corrigir a ortografia
use Illuminate\Support\Facades\DB;

class DropZoneController extends Controller
{
    public function upload(Request $request)
    {
        try {
            if ($request->hasFile('images')) {
                $filenames = [];

                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);
                    $imageModel = DropZone::create(['filename' => $imageName]);
                    $filenames[] = $imageModel->filename;
                }

                return response()->json(['success' => true, 'filenames' => $filenames]);
            } else {
                return response()->json(['error' => 'No files uploaded'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
