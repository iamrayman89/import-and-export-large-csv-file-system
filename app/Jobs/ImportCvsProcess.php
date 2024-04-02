<?php

namespace App\Jobs;

use App\Models\Diamonds;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Batchable;


use App\Models\Sales;

class ImportCvsProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   
    public $data;
    public $header;

    /**
     * Create a new job instance.
     */
    public function __construct($data,$header)
    {
        //
      $this->data = $data;
      $this->header = $header;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      
        //      $header =[];
   
        //             }
                    foreach($this->data as $diamond){
                        $itemData = array_combine($this->header,$diamond);
                        Diamonds::create($itemData);
                     }

    }
}
