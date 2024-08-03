<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

function translit($str)
{
    $tr = array(
        "А" => "A", "Б" => "B", "В" => "V", "Г" => "G",
        "Д" => "D", "Е" => "E", "Ж" => "J", "З" => "Z", "И" => "I",
        "Й" => "Y", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N",
        "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T",
        "У" => "U", "Ф" => "F", "Х" => "H", "Ц" => "TS", "Ч" => "CH",
        "Ш" => "SH", "Щ" => "SCH", "Ъ" => "", "Ы" => "YI", "Ь" => "",
        "Э" => "E", "Ю" => "YU", "Я" => "YA", "а" => "a", "б" => "b",
        "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ж" => "j",
        "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l",
        "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
        "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h",
        "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sch", "ъ" => "y",
        "ы" => "yi", "ь" => "", "э" => "e", "ю" => "yu", "я" => "ya",
        "Ё" => "E", "Є" => "E", "Ї" => "YI", "ё" => "e", "є" => "e", "ї" => "yi",
        " " => "_", "/" => "_"
    );
    if (preg_match('/[^A-Za-z0-9_\-]/', $str)) {
        $str = strtr($str, $tr);
        $str = preg_replace('/[^A-Za-z0-9_\-.]/', '', $str);
    }
    return $str;
}


class ProductController extends Controller
{
    public function index()
    {
        $product_list = DB::table('products')->get();
        foreach ($product_list as $product) {
            $product->images = DB::table('product_images')->where('product_id', '=', $product->id)->pluck('path');
            $product->url =  $product->id . '__' . translit($product->name);
        }
        return view('index', ['product_list' => $product_list, 'title' => 'Каталог']);
    }
    public function import()
    {
        Excel::import(new ProductsImport, $_FILES['file']['tmp_name']);

        return redirect('/import')->with('success', 'All good!');
    }
    public function product(string $key, string $name)
    {

        if ($name == '' or $key == '') return redirect('/');
        $product = DB::table('products')->find($key);
        $product->additions = DB::table('product_additions')->where('product_id',$key)->first();
        $product->images = DB::table('product_images')->where('product_id',$key)->pluck('path');

        return view('product', ['product' => $product, 'title' => $product->additions->seo_title]);
    }
}
