<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    //
    // public function syncData(Request $request){
    //     $tableName = $request->table;
    //     $data = $request->data;
    //    foreach($data as $key => $record){
    //     unset($record['id']);
    //     $model = '\\App\\Models\\'.ucfirst($tableName) . 's';
    //     $model::create($record);
    //    }
    // }

    public function syncData($tableName, $data){
        $model = '\\App\\Models\\'.ucfirst($tableName) . 's';
       foreach($data as $key => $record){
        unset($record['id']);
        $model::create($record);    
       }
       $syncData = $model::all();
       return $syncData;
    }

    public function addTower(Request $request){
        $data = $request->data;
        $syncData=$this->syncData('towers', $data);
        if($syncData){
            return response()->json(['message' => 'Towers synced successfully.','data' => $syncData], 200);
        }else{
            return response()->json(['message' => 'Failed to sync towers.'], 500);
        }
    }

    public function addFlats(Request $request){
        $data = $request->data;
        $syncData=$this->syncData('flats', $data);
        if($syncData){
            return response()->json(['message' => 'Flats synced successfully.','data' => $syncData], 200);
        }else{
            return response()->json(['message' => 'Failed to sync flats.'], 500);
        }
    }

    public function addUserIssues(Request $request){
        $data = $request->data;
        $syncData=$this->syncData('user_issues', $data);
        if($syncData){
            return response()->json(['message' => 'User Issues synced successfully.','data' => $syncData], 200);
        }else{
            return response()->json(['message' => 'Failed to sync user issues.'], 500);
        }
    }

    


}
