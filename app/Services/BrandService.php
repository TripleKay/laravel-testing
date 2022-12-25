<?php

namespace App\Services;

use App\Models\Brand;

class BrandService {



    public function store($request) : Brand
    {

        $data = $this->getRequestBrandData($request,true);

        $brand = Brand::create($data);

        return $brand;
    }

    public function update($request,$brand)
    {
        $data = $this->getRequestBrandData($request);

        $brand->update($data);

        return $brand;

    }

    //get  request data
    private function getRequestBrandData($request,$create = false)
    {
        $data = [
            'name' => $request->name,
        ];

        if($create){
            $data['created_at'] = now();
        }

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('categories');
        }

        return $data;
    }
}