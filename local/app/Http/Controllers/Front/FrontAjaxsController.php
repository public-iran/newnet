<?php

namespace App\Http\Controllers\Front;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontAjaxsController extends Controller
{
    public function deleteItem($id)
    {
//        $idd = $_POST['item'];
        session()->forget("product.$id");
//        return "dfg";
    }

    public function addProductCount(Request $request)
    {
        $id = $_POST['item'];
        $oldCount = session("product.$id.1");
        $newCount = $oldCount + 1;
        $productArray = array($id, $newCount);
        $request->session()->put("product.$id", $productArray);
//        return true;
    }

    public function minusProductCount(Request $request)
    {
        $id = $_POST['item'];
        $newCount=0;
        $oldCount = session("product.$id.1");
        if ($oldCount != 0)
            $newCount = $oldCount - 1;
        $productArray = array($id, $newCount);
        $request->session()->put("product.$id", $productArray);
//        return true;
    }

    public function commentStore()
    {
        $comment = new Comment();
        $comment->productId = $_POST['productId'];
        $comment->user_id = $_POST['userId'];
        $comment->content = $_POST['content'];
        $comment->parentId =  $_POST['parentId'];
        $comment->save();
    }
}
