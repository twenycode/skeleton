<?php

namespace App\Http\Controllers\Admin\UserLog;

use App\Http\Controllers\BaseController;
use App\Models\AuthenticationLog;

class AuthenticationLogController extends  BaseController
{
    protected $index_view = 'admin.user-log.authentication-logs.index' ;
    protected $show_view =  'admin.user-log.authentication-logs.show';
    protected $resource = 'authenticationLog';
    protected $resources = 'authenticationLogs';
    protected $route = 'admin.authentication-logs.index';
    protected $model_relation = ['user'];


    public function __construct(AuthenticationLog $authenticationLog)
    {
        parent::__construct($authenticationLog);
    }

    public function index()
    {
        return $this->relationshipModel('login_at');
    }


}
