<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function labels_all()
    {
        return Label::orderBy('id', 'desc')->paginate(10);
    }

    public function es_web($request)
    {
        return $request->acceptsHtml() && collect($request->route()->middleware())->contains('web');
    }

}
