<?php

namespace App\Http\Controllers;

use App\Exports\BookMarksExport;
use App\Http\Requests\RequestStoreBockMark;
use App\Models\BookMark;
use App\Tables\BookMarksTable;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $table = (new BookMarksTable)->setup();

        return view('BookMark.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BookMark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreBockMark $request)
    {
        $fileName = time().'_'.$request->favicon->getClientOriginalName();
        $filePath = $request->file('favicon')->storeAs('uploads', $fileName, 'public');

        $model = new BookMark();
        $model->title = $request->title;
        $model->url = $request->url;
        $model->meta_keywords = $request->meta_keywords;
        $model->meta_description = $request->meta_description;
        $model->favicon = $filePath;
        $model->save();

        return redirect()->route('book-marks.show', ['book_mark' => $model->id])->with('alert','Page addded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mark = BookMark::findOrFail($id);

        return view('bookMark.show', compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = BookMark::findOrFail($id);

        return view('bookMark.edit', compact('mark'));
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
        $mark = BookMark::findOrFail($id);
        $mark->update($request->all());

        // check request favicon
        if($request->favicon){
            $fileName = time().'_'.$request->favicon->getClientOriginalName();
            $filePath = $request->file('favicon')->storeAs('uploads', $fileName, 'public');

            $mark->favicon = $filePath;
            $mark->save();
        }

        return redirect()->route('book-marks.show', ['book_mark' => $id])->with('alert','Page updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = BookMark::findOrFail($id);

        $mark->delete();

        return back()->with(['alert' => 'Page deleted']);
    }

    /**
     * Export data in excel
     *
     * @return mixed
     */
    public function export()
    {
        return Excel::download(new BookMarksExport(), 'book-marks.xlsx');
    }
}
