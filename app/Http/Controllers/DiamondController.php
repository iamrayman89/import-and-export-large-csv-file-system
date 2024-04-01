<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;
use App\Models\Diamnd;
use App\Jobs\ImportCsvProcess;


use Illuminate\Http\Request;

class DiamondController extends Controller
{
    /**
     * Show the form for importing csv file.
     */
    public function index()
    {
        //
        return view('import-csv-file');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function import(Request $request)
    {
        //
        if(request()->has('mycsv')){
            // $data = array_map('str_getcsv',file(request()->mycsv));
            $data = file(request()->mycsv);
            // $header = $data[0];
            // unset($data[0]);  
            

            $chucks = array_chunk($data,2000);
            $header =[];
        //    $batch = Bus::batch([]) -> dispatch();

           foreach($chucks as $key => $chunk){
           $data = array_map('str_getcsv',$chunk);
           if($key == 0){
              $header = $data[0];
              unset($data[0]);
           }
          
           ImportCsvProcess::dispatch($data,$header);


                  }
    //  return $batch;
    return "Done";
            
        }
        return "please upload file";
    }

    /**
     * Display the data from the Database.
     */
    public function show()
    {
        //
        return view('display-csv-file');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
