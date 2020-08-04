<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use App\Helpers\CollectionHelper;
use Intervention\Image\Facades\Image;
use PDF;

class PostcardsController extends Controller
{
    private $http;

    public function __construct()
    {
        $this->http = Http::get('https://appdsapi-6aa0.kxcdn.com/content.php?lang=de&json=1&search_text=berlin&currencyiso=EUR');
    }

    public function index(){
        // parse the result to json
        $result = $this->http->json();
        //create a collection
        $list = new Collection();
        
        foreach($result['content'] as $item){
            //convert json to Posrcard (model) and push to collection
            $list->push(new \App\Postcard($item));
        }
        
        //Paginate the result
        $pageSize = 25;
        $list = CollectionHelper::paginate($list, $pageSize);

        return view('PostcardList', compact('list'));
    }


    public function pdf(Request $request){
        //set pdf title
        PDF::SetTitle($request->title);
        //create a new page
        PDF::AddPage();
        //load the image in the center
        PDF::Image($request->url,'','','' ,'' , '', '', '', false, 300, 'C');
        //generate pdf
        PDF::Output($request->title.'.pdf');
    }


    function thumbnail(Request $request) {

        $url= $request->url;
        $filename = $request->id;

        $to= "images/cache/";

        // Download image
        $image = ImageCreateFromString(file_get_contents($url));
       
        // calculate resized ratio
        // Note: if $height is set to TRUE then we automatically calculate the height based on the ratio
        $width = 200;
        $height =  (ImageSY($image) * $width / ImageSX($image)) ;
       
        // create image 
        $output = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($output, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));
       
        header("Content-type: image/jpeg");
        // save image
        ImageJPEG($output, $to.$filename.".jpg", 95); 
    
        // return resized image
        return Image::make( $to.$filename.".jpg")->response();
    }




    public function price(Request $request){
        $id = $request->id;
        $json= Http::get('https://www.mypostcard.com/mobile/product_prices.php?json=1&type=get_postcard_products&currencyiso=EUR&store_id='.$id)->json();
        return $json['products'][0]['product_options'];
    }

    


}
