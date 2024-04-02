<?php

namespace App\Http\Controllers;

use App\Jobs\ImportCvsProcess;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Jobs\SalesCsvProcess;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Diamonds;

use Illuminate\Bus\Batch;
use Illuminate\Bus\Batchable;




class DiamondController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('import-csv-file');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function export()
    {
        //
        $fileName = 'large_dataset.csv';
        $handle = fopen(public_path($fileName), 'w');

        $column = [
            "cut",
            "color",
            "clarity",
            "carat_weight",
            "cut_quality",
            "lab",
            "symmetry",
            "polish",
            "eye_clean",
            "culet_size",
            "culet_condition",
            "depth_percent",
            "table_percent",
            "meas_length",
            "meas_width",
            "meas_depth",
            "girdle_min",
            "girdle_max",
            "fluor_color",
            "fluor_intensity",
            "fancy_color_dominant_color",
            "fancy_color_secondary_color",
            "fancy_color_overtone",
            "fancy_color_intensity",
            "total_sales_price"
        ];

        fputcsv($handle, ['Column 1', 'Column 2', 'Column 3', 'Column 4', 'Column 5', 'Column 6', 'Column 7', 'Column 8', 'Column 9', 'Column 10', 'Column 11', 'Column 12', 'Column 13', 'Column 14']);

        // 
        // Write CSV header

        // Fetch data in chunks
        Sales::chunk(1000, function ($records) use ($handle) {
            foreach ($records->toArray() as $record) {
                // Write data to CSV
                fputcsv($handle, $record);
            }
        });

        // Close the file handle
        fclose($handle);

        $file= public_path(). "/large_dataset.csv";

    $headers = array(
              'Content-Type: application/csv',
            );

    return Response::download($file,$fileName , $headers);

        // Move the generated CSV file to the desired location
        // return Storage::disk('public')->download($fileName);
        // return Storage::disk('public')->get($fileName);

        // return Storage::move($fileName, 'public' . $fileName);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function upload(Request $request)
    {

        if (request()->has('mycsv')) {
            $data = file(request()->mycsv);



            $chucks = array_chunk($data, 1000);
            $header = [];
            $batch = Bus::batch([])->dispatch();

            foreach ($chucks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);
                if ($key == 0) {
                    $header = $data[0];
                    unset($data[0]);
                }

                $batch->add(new  ImportCvsProcess($data, $header));

            }
            return "Done";
            
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function batch()
    {
        //
        $batchId = request('id');
        return Bus::findBatch($batchId);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function getSales()
    {
        //
        // $diamonds = Sales::Paginate(15);
        // return view('view')->with('cargos', $diamonds);    



        $diamonds = Diamonds::Paginate(15);
        return view('view')->with('diamonds', $diamonds);
    }
    public function clearTable()
    {
        // Clear all data from the users table
        Diamonds::truncate();

        return redirect('/view')->with('success', 'Table cleared successfully');
    }
}
