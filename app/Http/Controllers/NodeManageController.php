<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AncestorNode;
use App\Models\DescendentPivot;
use Illuminate\Support\Facades\DB;

class NodeManageController extends Controller
{
    public function createNode(Request $request){
       
/**
 * Wherever your Select may come from
 **/
        $master_node_model= new AncestorNode();
        $master_node = $master_node_model->create($request->all());

                  
                  $lst_inserted = $master_node->id;
                  $parent_id = $request->last_id;
                  $select =  DB::statement("INSERT INTO descendant_pivots(ancestor_id,descendant_id,length )
                                            SELECT t.ancestor_id, $lst_inserted,t.length + 1 
                                            FROM descendant_pivots as t
                                            WHERE t.descendant_id = $parent_id 
                                            UNION ALL SELECT $lst_inserted,$lst_inserted,0");
                 
       

    }

    public function fetchNode(Request $request){
    
       $parent_id = $request->parent_id;
        $select =  DB::select("
                                SELECT a.*
                                FROM ancestor_nodes a
                                JOIN descendant_pivots t ON (a.id = t.descendant_id)
                                WHERE t.ancestor_id = $parent_id 
                                --    AND t.length = 1
                                "
                            );
        return response()->json(['data' => $select]);
               
        
    }
}
