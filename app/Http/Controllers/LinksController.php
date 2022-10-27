<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use Flasher\Prime\FlasherInterface;

class LinksController extends Controller
{
	public function index()
	{
		return view('addsomething');
	}

    public function store(Request $request)
    {
        $model = new Text();
        $model->text = $request->justarandomtext;
        $model->save();
        flash()->addSuccess('Data has been saved successfully!');
        return back();
    }

    public function fetch()
    {
        $models = Text::get();
        return view('viewsavedvalues',compact('models'));
    }

    public function delete($id)
    {
        Text::destroy($id);
        flash()->addWarning('Your Text is Deleted');
        return back();
    }

}
