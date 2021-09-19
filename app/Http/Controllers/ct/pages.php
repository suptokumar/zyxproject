<?php

namespace App\Http\Controllers\ct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;


class pages extends Controller
{
    function index()
    {
        $page = new page;
         $allpages = $page->all();
         return view('pages/index', [
             'allpages' => $allpages,
         ]);
    }

    function create()
    {
        
        return view('pages/create');
        
    }
    function store(Request $request)
    {
       
        if(!$request->title){
        return redirect("create/pages")->with("failed",__("title feild can't be blank."));
        }
        if(!$request->content){
        return redirect("create/pages")->with("failed",__("content feild can't be blank."));
        }
        //dd($request->all());
        $page = new page;
        $page->title    = $request->title;
        $page->status   = $request->category;
        $page->content  = $request->content;
        if($page->save()){
            return redirect("view/pages")->with("success",__("page Created Successfuly."));           
        }else{
            return redirect("create/pages")->with("failed",__("Failed to Create page."));   
        }
        
    }
    public function edit($id){

        
        $page = new page;
        $editpage = $page->find($id);
        return view('pages/edit',[
            'editpage' => $editpage,
        ]);
     }
    public function update(Request $request){
       // dd($request->all());
        $pages_id = $request->pages_id;
        if($pages_id)
        {
            if($pages = page::find($pages_id)){
                $pages->title       = $request->title?$request->title:$pages->title;
                $pages->status      = $request->category?$request->category:$pages->status;
                $pages->content     = $request->content?$request->content:$pages->content;        
            
                if($pages->save()){
                    return redirect('/view/pages/')->with('successfully','pages Update Successfuly');
                }else{
                    return redirect('/view/pages/')->with('successfully','Failed to update pages');
                }
            }else{
                return redirect('/edit/pages/'.$pages_id)->with('successfully','ID not matched');
            }
        }else{
            return redirect('/edit/pages/'.$pages_id)->with('successfully','ID not found ');
        }
    }

    function delete(Request $request){
        if(!$request->id)
        {
            return  json_encode(["status"=>201,"message"=>__("`id` field is Required")]);
        }else{
            $faqs = faqs::find($request->id);
            if($faqs){
            if($faqs->delete()){
                return json_encode(["status"=>200,"message"=>__("FAQs Deleted Successfuly")]);
            }else{
                return json_encode(["status"=>202,"message"=>__("Failed to Delete FAQs")]);
            }
            }else{
            return  json_encode(["status"=>201,"message"=>__("The requested id not matched.")]);
            }
        }
        
    }
}
