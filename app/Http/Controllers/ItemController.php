<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Models\Item;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list()
    {

        // INSERT INTO
        /*
        $item = new Item;
        $item->item_name = 'Anaïs Serrant';
        $item->item_code = 'ANA-SER-77';
        $item->item_price = '59.99';
        $item->item_qty = 1000;
        $item->item_tax = 20;
        $item->item_status = 1;
        $item->created_at = now();
        $item->save();
        */
        //dd($item);

        // UPDATE
        //$update = Item::find(5);
        //$update->item_name = 'Rebecca Margot';
        //$update->item_code = 'REB-MAR-77';
        //$update->item_price = '5659.99';
        //$update->save();
        //dd($update);

        // DELETE
        $delete = Item::find(4);
        //$delete->delete();
        //dd($delete);
        // SELECT * FROM items
        $items = Item::all();
        $nbitems = count($items);
        //dd($nbitems);



        return view('export.list', ['items' => $items, 'total' => $nbitems]);
    }


    public function index()
    {
        return view('export.items');
    }

    public function import(Request $request)
    {
      if($request->file('imported-file'))
      {
                $path = $request->file('imported-file')->getRealPath();
                $data = Excel::load($path, function($reader)
          {
                })->get();
          //dd($data);
          if(!empty($data) && $data->count())
          {
            foreach ($data->toArray() as $row)
            {
              if(!empty($row))
              {
                $dataArray[] =
                [
                  'item_name' => $row['item_name'],
                  'item_code' => $row['item_code'],
                  'item_price' => $row['item_price'],
                  'item_qty' => $row['item_qty'],
                  'item_tax' => $row['item_tax'],
                  'item_status' => $row['item_status'],
                  'created_at' => $row['created_at']
                ];
              }
          }
          if(!empty($dataArray))
          {
             Item::insert($dataArray);
             //dd(count($data));
             session()->flash('insert', count($data).' donnée(s) enregistrée(s) en base');
             //return view ('export.list');
             //return redirect('list');
             return back();
           }
         }
       }
       return view ('export.list');
    }

    public function export($type){
      $items = Item::all();
      $date = date('Y-m-d');
      Excel::create('items_'.$date, function($excel) use($items) {
          $excel->sheet('Export_Item', function($sheet) use($items) {
              $sheet->fromArray($items);
          });
      })->export($type);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Item::find($id);
        $delete->delete();
        session()->flash('delete', 'Item supprimé');

        return redirect('items-list');
    }
}
