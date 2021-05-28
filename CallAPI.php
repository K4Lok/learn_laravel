<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CallAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:get';
    #protected $signature = 'api:get {mms_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call API and return the value';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        #$mms_id = $this->argument('mms_id');
        //Connet to the Database
        $datas = DB::table('publish_list')->get();
        $number = 1;
        date_default_timezone_set("Asia/Macau");
        
        foreach ($datas as $row) {
            //Check whether the book have mms_id or not
            if (!is_null($row->code) && !empty($row->code) && $row->code!= " ") 
            {
                $mms_id = $row->code;
                
                // if (!is_numeric($mms_id[0])) {
                //     $mms_id = substr($mms_id, 1);
                // }

                while (!is_numeric($mms_id[0])) {
                    $mms_id = substr($mms_id, 1);
                }
                print_r($number);
                print_r(" : ");
                print_r($mms_id);
                print_r("\n");

                $url = "https://api-ap.hosted.exlibrisgroup.com/almaws/v1/bibs/" . $mms_id ."?view=full&expand=None&format=json&apikey=l8xx46d97a514f50458fb5d433da26ac4209";
                
                //Request data from the API (Web)
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $response = curl_exec($ch);
                
                $jsonData = json_decode($response);
                    
                    //Connect to the DB and modify the data
                DB::table('publish_list')
                    ->where('code', $row->code)
                    ->update(array('author' => isset($jsonData->author) ? $jsonData->author : $row->author, 
                                    'title' => isset($jsonData->title) ? $jsonData->title : $row->title,
                                    'pub_place' => isset($jsonData->place_of_publication) ? $jsonData->place_of_publication : $row->pub_place,
                                    'publisher' => isset($jsonData->publisher_const) ? $jsonData->publisher_const : $row->publisher,
                                    'pub_date' => isset($jsonData->date_of_publication) ? $jsonData->date_of_publication : $row->pub_date,
                                    'isbn' => isset($jsonData->isbn) ? $jsonData->isbn : $row->isbn,
                                    'updated_at' => date("Y-m-d h:i:s")
                                ));
                
                $number++;
            }
        }

        #$obect = DB::table('publish_list')->where('code', '991006944159706306')->get();
        #$obect = DB::table('publish_list')->where('isbn', '9789993792215')->pluck('code');
        
        #echo $obect;

        // $url = "https://api-ap.hosted.exlibrisgroup.com/almaws/v1/bibs/" . $mms_id ."?view=full&expand=None&format=json&apikey=l8xx46d97a514f50458fb5d433da26ac4209";
        
        // $response = Http::get($url);
        
        // $obj = json_decode($response);
        // print_r($obj->{'title'});
        //     return 0;
    }
}
