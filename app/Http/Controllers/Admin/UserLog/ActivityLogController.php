<?php

namespace App\Http\Controllers\Admin\UserLog;

use App\Http\Controllers\BaseController;
use App\Models\ActivityLog;

class ActivityLogController extends  BaseController
{
    protected $index_view = 'admin.user-log.activity-logs.index' ;
    protected $show_view =  'admin.user-log.activity-logs.show';
    protected $resource = 'activityLog';
    protected $resources = 'activityLogs';
    protected $route = 'admin.activity-logs.index';
    protected $model_relation = ['user'];

    public function __construct(ActivityLog $activityLog)
    {
        parent::__construct($activityLog);
    }

    public function index()
    {
        return $this->relationshipModel();
    }


}
