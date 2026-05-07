<?php

namespace App\Http\Controllers;
use App\Models\Visa;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function store(Request $request)
    {
        Visa::create($request->all());

return redirect()->back()->with('success', 'تم إرسال الطلب بنجاح');    }

public function index(Request $request)
{
    $visas = Visa::latest()->get();

    $selected = $request->id 
        ? Visa::where('id', $request->id)->first()
        : $visas->first();

    if (!$selected) {
        $selected = $visas->first();
    }

    return view('admin.inbox', compact('visas', 'selected'));
}
public function table()
{
    $visas = Visa::latest()->get();

    return view('admin.table', compact('visas'));
}
}