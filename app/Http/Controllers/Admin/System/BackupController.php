<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BackupController extends Controller
{
    private $service;

    // path to index view
    protected $index_view = 'admin.system.backups.index';

    // define variable to hold single resource
    protected $resource = 'backup';

    // define variable to hold collection resources
    protected $resources = 'backups';

    // define variable to hold collection resources
    protected $route = 'admin.backups.index';

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get list of all the backups
    public function index()
    {
        abort_if(Gate::denies('backup_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $files = $this->disk()->files($this->folder());    //Get backup folder
            ${$this->resources} = $this->backupLists($files);  //Get all users
            return view($this->index_view,compact($this->resources));
        }
        catch (Exception $e) {
            throw $e;
        }
    }

    // Create New Backup
    public function create()
    {
        abort_if(Gate::denies('backup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $this->run();    //Get backup folder
            return $this->success('New backup created');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // Delete Backup
    public function destroy($file)
    {
        abort_if(Gate::denies('backup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $file = $this->filePath($file);
            //Check if file exists
            if ($this->disk()->exists($file)){
                $this->disk()->delete($file);
            }
            return $this->success('Backup deleted');
        }
        catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // Download Backup
    public function download($file)
    {
        abort_if(Gate::denies('backup_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $file = $this->filePath($file);

        if(!$this->disk()->exists($file))
        {
            return $this->error('Backup not found');
        }
        return $this->disk()->download($file);
    }

    // Get backup file path
    private function filePath($file)
    {
        return $this->folder().'/'.$file;
    }

    // Get backup storage link
    private function disk(): \Illuminate\Contracts\Filesystem\Filesystem
    {
        return Storage::disk(config('backup.backup.destination.disks')[0]);
    }

    // Get backup folder name
    private function folder()
    {
        return config('backup.backup.name');
    }

    /* get backup files */
    private function backupLists($files)
    {
        try {
            $backups = [];

            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -4) == '.zip' && $this->disk()->exists($f)) {
                    $backups[] = [
                        'file_path' => $f,
                        'file_name' => str_replace($this->folder().'/','',$f),
                        'file_size' => $this->disk()->size($f),
                        'last_modified' => date('j F Y, H:i ',$this->disk()->lastModified($f)),
                    ];
                }
            }
            // reverse the backups, so the newest one would be on top
            $backups = array_reverse($backups);
            return $backups;
        }
        catch (Exception $e){
            $this->error($e->getMessage());
        }
    }

    // Call the backup:run command
    private function run()
    {
        return Artisan::call('backup:run');
    }

    // Command to download backup
    private function fileDownload()
    {
        return Artisan::call('backup:run');
    }



}
