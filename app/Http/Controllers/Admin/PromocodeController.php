<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PromocodeFormRequest;
use App\Models\Promocode;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocodes = Promocode::query()->orderBy("created_at", 'desc')->paginate(10);

        return view('admin.promocodes.index', [
            'promocodes' => $promocodes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promocodes.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PromocodeFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromocodeFormRequest $request)
    {
        $promocode = Promocode::query()->create($request->validated());

        return to_route('admin.promocodes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocode = Promocode::query()->findOrFail($id);

        return view('admin.promocodes.create', [
            'promocode' => $promocode
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PromocodeFormRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromocodeFormRequest $request, $id)
    {
        $promocode = Promocode::query()->findOrFail($id);
        $promocode->update($request->validated());

        return to_route('admin.promocodes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Promocode $promocode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocode $promocode)
    {
        $promocode->delete();
        return to_route('admin.promocodes.index');
    }
}
