<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Issue_images;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\DB;

class SyncController extends Controller
{

     public function UploadData(Request $request){
        $tableName = $request->table;
        $data = $request->data;
       foreach($data as $key => $record){
        unset($record['id']);
        $model = '\\App\\Models\\'.ucfirst($tableName) . 's';
        $model::create($record);
       }

       return response()->json(['message' => 'Data Uploaded successfully.'], 200);
    }

    public function syncData($tableName, $data){
        $model = '\\App\\Models\\'.ucfirst($tableName) . 's';
        foreach($data as $key => $record){
        
        unset($record['id']);
        $record['id']=$record['live_id'];
        unset($record['live_id']);
    
        if(array_key_exists('images',$record)){
            $record_images=$record['images'];
            unset($record['images']);
        }else{
            $record_images=[];
        }
                
        $previous_record = $model::find($record['id']);
        if($previous_record){
            $updated_id = $previous_record['id'];
            $previous_record->update($record);
        }else{
            $updated_id = $model::create($record);
           
        }
    
        if($record_images!= null){
            foreach($record_images as $image){
                $image_path = $this->addImages($image);
                
                if($image_path != ''){
                    DB::table('issue_images')->insert([
                        'user_issue_id' => $updated_id, // Replace with actual data
                        'image_path' => $image_path,
                        'flat_name' => $record['flat_name'],
                    ]);
                }
             
            }
        }
       }
       $syncData = $model::all();
       return $syncData;
    }

    public function addTower(Request $request){
        $data = $request->data;
        $syncData=$this->syncData('tower', $data);
        if($syncData){
            return response()->json(['message' => 'Towers synced successfully.','data' => $syncData], 200);
        }else{
            return response()->json(['message' => 'Failed to sync towers.'], 500);
        }
    }

    public function addFlats(Request $request){
        $data = $request->data;
        $syncData=$this->syncData('flat', $data);
        if($syncData){
            return response()->json(['message' => 'Flats synced successfully.','data' => $syncData], 200);
        }else{
            return response()->json(['message' => 'Failed to sync flats.'], 500);
        }
    }

    public function addUserIssues(Request $request){
        $data = $request->data;
        $syncData=$this->syncData('user_issue', $data);
        if($syncData){
            return response()->json(['message' => 'User Issues synced successfully.','data' => $syncData], 200);
        }else{
            return response()->json(['message' => 'Failed to sync user issues.'], 500);
        }
    }

    public function addImages($image){
        if($image != NULL){
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image_path = 'issue_images/' . $image_name; 
            $image->move(public_path('issue_images'), $image_name);
            return $image_path;
        }else{
            $image_path = '';
            return $image_path;
        }
    }
}
