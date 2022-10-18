<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DonateFormRequest;
use App\Models\Donate;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donates = Donate::query()->orderBy("created_at", 'desc')->paginate(10);

        return view('admin.donates.index', [
            'donates' => $donates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donates.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DonateFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonateFormRequest $request)
    {
        $donate = Donate::query()->create($this->getData($request));

        return to_route('admin.donates.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donate = Donate::query()->findOrFail($id);

        return view('admin.donates.create', [
            'donate' => $donate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DonateFormRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonateFormRequest $request, $id)
    {
        $donate = Donate::query()->findOrFail($id);
        if ($request->has('image')) $this->delete($donate);
        $donate->update($this->getData($request));

        return to_route('admin.donates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Donate $donate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donate $donate)
    {
        $this->delete($donate);
        $donate->delete();

        return to_route('admin.donates.index');
    }

    private function getData(DonateFormRequest $request)
    {
        $data = $request->validated();
        if ($request->has('image')) {
            $thumbnail = str_replace('public/donates', '', $request->file('image')->store('public/donates'));
            $data['image'] = $thumbnail;
        }
        return $data;
    }

    private function delete(Donate $donate)
    {
        unlink(storage_path('app/public/donates') . $donate->image);
    }
}
