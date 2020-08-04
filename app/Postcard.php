<?php

namespace App;

use Spatie\DataTransferObject\DataTransferObject;
use coffeecode\cropper\Cropper;
use Illuminate\Support\Facades\Http;

class Postcard extends DataTransferObject
{
    public $id;
    public $title;
    public $price;
    public $thumb_url;
    public $favourited; 
    Public $author_id; 
    Public $creator_id; 
    Public $creator;
    Public $author_url_slug;
    Public $creator_icon; 
    Public $category_icon;
    Public $author_likes;
    Public $author_designs; 
    Public $url_slug_de;
    Public $url_slug_en; 
    Public $url_slug_es;
    Public $url_slug_nl;
    Public $url_slug_it; 
    Public $url_slug_sv;
    Public $url_slug_fr; 
    Public $url_slug_pt; 
    Public $url_slug_ru; 
    Public $url_slug_tr; 
    Public $url_slug; 
    Public $alt_tag; 
    Public $seo_noindex; 
    Public $category_id; 
    Public $cat_name; 
    Public $category_name; 
    Public $cat_url_slug; 
    Public $price_foldingcard; 
    Public $price_audiocard; 
    Public $currencyiso; 
    Public $price_group; 
    Public $orientation;
    Public $maincolor; 
    Public $full_url; 
    Public $big_url;
    Public $is_editable;
    public $envelope;

}
