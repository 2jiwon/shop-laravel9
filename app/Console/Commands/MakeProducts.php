<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\{Product, ProductImage};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MakeProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fake 상품 Data 만들기';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /**
         * API 호출해서 상품정보 가져오기
         */
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.escuelajs.co/api/v1/products?offset=0&limit=20',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        $rawDatas = json_decode($response);

        /**
         * 상품 정보 저장
         */
        foreach ($rawDatas as $data) {
            $id = Product::insertGetId([
                'name' => $data->title,
                'detail' => $data->description,
                'stock_amount' => rand(1, 100),
                'supply_price' => ($data->price - 10) * 1200,
                'selling_price' => $data->price * 1200,
                'delivery_fee' => floor(rand(0, 3000)/1000) * 1000,
                'category' => $data->category->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'view_cnt' => floor(rand(3, 100))
            ]);

            /**
             * 이미지 따로 처리
             */
            foreach ($data->images as $key => $img) {
                $contents = file_get_contents($img);
                $name = 'uploads/'.Str::lower(Str::random(6)).".png";
                Storage::put('public/'.$name, $contents);

                ProductImage::create([
                    'product_id' => $id,
                    'type' => ($key == 0) ? 'main' : 'detail',
                    'filename' => $name,
                ]);
            }
        }

        return Command::SUCCESS;
    }
}
