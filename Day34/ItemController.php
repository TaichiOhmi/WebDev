<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    //
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function index()// redirects user to index page
    {
        return view('items.index');
    }

    public function show()
    {
        $all_items = $this->item->latest()->paginate(10);

        return view('items.show')->with('all_items',$all_items);
    }

    public function store(Request $request) // $requenst = new Request
    {
        $request->validate([
            'itemName' => 'required|min:1|max:50',
            'itemDescription' => 'required|min:1|max:50',
            'itemPrice' => 'required|min:1|max:50',
            'itemQuality' => 'required'
        ]);

        $this->item->itemName = $request->itemName;
        $this->item->itemDescription = $request->itemDescription;
        $this->item->itemPrice = $request->itemPrice;
        $this->item->itemQuality = $request->itemQuality;
        $this->item->save();

        return redirect()->route('show');
    }

    public function edit($id)
    {
        $item = $this->item->findOrFail($id);

        return view('items.edit')->with('item',$item);
    }

    public function update(Request $request, $id)
    { 
        $request->validate([
            'itemName' => 'required|min:1|max:50',
            'itemDescription' => 'required|min:1|max:50',
            'itemPrice' => 'required|min:1|max:50',
            'itemQuality' => 'required'
        ]);

        $item = $this->item->findOrFail($id);

        $item->itemName = $request->itemName;
        $item->itemDescription = $request->itemDescription;
        $item->itemPrice = $request->itemPrice;
        $item->itemQuality = $request->itemQuality;
        $item->save();

        return redirect()->route('show');
    }

    public function destroy($id)
    {
        $this->item->destroy($id);

        return redirect()->back();
    }

}
