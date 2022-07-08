<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ZipArchiveController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function zipDownload()
    {
//        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";
//        // Create backup folder and set permission if not exist.
//        $storageAt = storage_path('files') . "/app/backup/";
//        if(!File::exists($storageAt)) {
//            File::makeDirectory($storageAt, 0755, true, true);
//        }
//        $command = "".env('DB_DUMP_PATH', 'mysqldump')." --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . " --port=" . env('DB_PORT') . " " . env('DB_DATABASE') . "  | gzip > " . $storageAt . $filename;
//        $returnVar = NULL;
//        $output = NULL;
//        exec($command, $output, $returnVar);

        $zip      = new ZipArchive;
        $fileName = 'attachment.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = Storage::disk('files')->allFiles();
            foreach ($files as $key => $value) {
                $thefile = storage_path('files') .'/'. $value;
                $zip->addFile($thefile);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName));
    }
}
