<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductAddition;
use App\Models\ProductImage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow

{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if (!$key) {
                continue;
            }
            if (Product::where('external_code', $row['vnesnii_kod'])->exists()) continue;
            $id = Product::create([
                'external_code' => $row['vnesnii_kod'],
                'name'    => $row['naimenovanie'],
                'description' => $row['opisanie'],
                'price' => str_replace(',', '.', $row['cena_cena_prodazi']),
                'discount' => str_replace(',', '.', $row['minimalnaia_cena']),
            ])->id;

            ProductAddition::create([
                'product_id' => $id,
                'size' => $row['dop_pole_razmer'],
                'color' => $row['dop_pole_cvet'],
                'brand' => $row['dop_pole_brend'],
                'structure' => $row['dop_pole_sostav'],
                'qty_in_package' => $row['dop_pole_kol_vo_v_upakovke'],
                'link_package' => $row['dop_pole_ssylka_na_upakovku'],
                'seo_title' => $row['dop_pole_seo_title'],
                'seo_h1' => $row['dop_pole_seo_h1'],
                'seo_description' => $row['dop_pole_seo_description'],
                'weight_product' => $row['dop_pole_ves_tovarag'],
                'width_product' => $row['dop_pole_sirinamm'],
                'height_product' => $row['dop_pole_vysotamm'],
                'length_product' => $row['dop_pole_dlinamm'],
                'weight_package' => $row['dop_pole_ves_upakovkig'],
                'width_package' => $row['dop_pole_sirina_upakovkimm'],
                'height_package' => $row['dop_pole_vysota_upakovkimm'],
                'length_package' => $row['dop_pole_dlina_upakovkimm'],
                'category' => $row['dop_pole_kategoriia_tovara'],
            ]);
            foreach (explode(', ', $row['dop_pole_ssylki_na_foto']) as $key => $link) {;
                if (!stripos(get_headers($link)[0], "200 OK")) continue;
                $ext = pathinfo($link, PATHINFO_EXTENSION);
                $path = 'images/' . $row['vnesnii_kod'] . '_' . str_replace('.', '', microtime($as_float = true))  . '.' . $ext;
                if (file_get_contents($link)) {
                    $image = file_get_contents($link);
                    if (file_put_contents($path, $image)) {
                        ProductImage::create([
                            'product_id' => $id,
                            'link' => $link,
                            'path' => $path,
                        ]);
                    }
                }
            }
        }
    }
}
