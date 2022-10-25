<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\TenderFilter;
use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;

use App\Models\Tender;
use Illuminate\Http\Response;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterRequest $request)
    {
        $data = $request->validate([
            'name' => '',
            'change_at' => ''
        ]);

        $filter = app()->make(TenderFilter::class, ['queryParams' => array_filter($data)]);

        $tenders = Tender::filter($filter)->paginate(10);

        return $tenders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tenders.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'outer_code' => 'required',
            'number' => 'required',
            'status' => 'required',
            'name' => 'required'
        ]);

        $validated['change_at'] = date("Y-m-d H:i:s");

        Tender::create($validated);

        return redirect()->route("index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tender = Tender::findOrFail($id);

        return $tender;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tender = Tender::find($id);

        return view("tenders.edit", ['tender' => $tender]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'outer_code' => 'required',
            'number' => 'required',
            'status' => 'required',
            'name' => 'required'
        ]);

        $validated['change_at'] = date("Y-m-d H:i:s");

        Tender::where('id', $id)->update($validated);

        return redirect()->route("index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tender = Tender::find($id);

        $tender->delete();

        return redirect()->route("index");
    }
}
