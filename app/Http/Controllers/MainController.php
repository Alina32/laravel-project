<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
use App\Traits\UploadTrait;

class MainController extends Controller
{

 use UploadTrait;
    public function getCities() {

       $model = new Cities();
       $cities = $model->getCities();

        return response()->json(['cities' => $cities]);
    }

   public function index(){
    return Cities::all();
   }

     public function show($id) {

        return Cities::find($id);
    }

    public function store(Request $request){
      
      $data = $request->all();
      try{
        if ($request->has('image')) {
              $image = $request->file('image');
              $name = time();
              $folder = '/images';
              $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
              $data['image'] =  $this->uploadOne($image, $folder, 'public', $name);            
        }
      }catch (\Exception $e) {
        return $e->getMessage();
      }
      $model = Cities::create($data);
      return $model;      
    }

    public function update(Request $request, $id){
      $cities = Cities::findorFail($id);
      $cities->update($request->all());

      return $cities;   
    }

    public function delete($id){
       $cities = Cities::findorFail($id);
       $cities->delete();

      return 204;      
    }
   
}
