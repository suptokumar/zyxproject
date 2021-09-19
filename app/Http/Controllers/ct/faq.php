<?php

namespace App\Http\Controllers\ct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faqs;
use App\Models\faqCategory;

class faq extends Controller
{
    function index()
    {
        $faqs = new faqs;
         $allfaqs = $faqs->all();
         return view('faq/index', [
             'allfaqs' => $allfaqs,
         ]);
    }

    function create()
    {
        $faqCategory = new faqCategory;
        $faqCategory = $faqCategory->all();
        return view('faq/create', [
            'faqCategory' => $faqCategory,
        ]);
        
    }
    function store(Request $request)
    {
        if(!$request->question){
        return redirect("create/faq")->with("failed",__("Question feild can't be blank."));
        }
        if(!$request->answer){
        return redirect("create/faq")->with("failed",__("Answer feild can't be blank."));
        }
        //dd($request->all());
        $faqs = new faqs;
        $faqs->faq_category_id  = $request->category_id;
        $faqs->question         = $request->question;
        $faqs->answer           = $request->answer;
        if($faqs->save()){
            return redirect("faqs")->with("success",__("FAQS Created Successfuly."));           
        }else{
            return redirect("create/faqs")->with("failed",__("Failed to Create FAQS."));   
        }
        
    }
    public function edit($id){

        $faqCategory = new faqCategory;
        $faqCategory = $faqCategory->all();
        $faqs = new faqs;
        $editfaqs = $faqs->find($id);
        return view('faq/edit',[
            'editfaqs' => $editfaqs, 'faqCategory' => $faqCategory,
        ]);
     }
    public function update(Request $request){
        $faqs_id = $request->faqs_id;
        if($faqs_id)
        {
            if($faqs = faqs::find($faqs_id)){
                $faqs->faq_category_id  = $request->category_id?$request->category_id:$faqs->category_id;
                $faqs->question         = $request->question?$request->question:$faqs->question;
                $faqs->answer           = $request->answer?$request->answer:$faqs->answer;        
            
                if($faqs->save()){
                    return redirect('/faqs'.$request->vendor_id)->with('successfully','FAQs Update Successfuly');
                }else{
                    return redirect('/faqs'.$request->vendor_id)->with('successfully','Failed to update FAQs');
                }
            }else{
                return redirect('/faqs'.$request->vendor_id)->with('successfully','ID not matched');
            }
        }else{
            return redirect('/faqs'.$request->vendor_id)->with('successfully','ID not found ');
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
    function faqsCategory()
    {
        $faqCategory = new faqCategory;
         $faqCategory = $faqCategory->all();
         return view('faq/category', [
             'faqCategory' => $faqCategory,
         ]);
    }

}
