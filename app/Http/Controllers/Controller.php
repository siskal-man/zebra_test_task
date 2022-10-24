<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\TenderController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Requests\FilterRequest;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getMainView(FilterRequest $request)
    {
        $api = new TenderController();

        $tenders = $api->index($request);

        return view("tenders.index", ['tenders' => $tenders]);
    }
}
