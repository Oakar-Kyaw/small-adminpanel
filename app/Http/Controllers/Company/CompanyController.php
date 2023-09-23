<?php

namespace App\Http\Controllers\Company;

use App\Models\Company\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy("id")->latest()->paginate(5);
        return view('company.company',compact("companies"));
    }
    
    //combine store and create function 
    public function add(Request $request){
        //validate function
        $validator = Validator::make($request->all(),[
            'company_name' => 'required',
            'company_email' => 'required',
            'company_website' => 'required',
            'company_logo' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->create($request);
        $this->store($request);
        return redirect("/company")->with("info","A company is successfully added");
    }

    //combine store and update function 
    public function updateone(Request $request,string $id){
        $this->update($request,$id);
        $this->store($request);
        return redirect("/company")->with("info","A company is successfully edited");
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $companies = new Company;
        $companies->name = $request->company_name;
        $companies->email = $request->company_email;
        $companies->website = $request->company_website;
        $file = $request->file('company_logo');
        $filename= $file->getClientOriginalName();
        $companies->logo = $filename;
        $companies->save();
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
     
        $file = $request->file('company_logo');
        if($file){
            
            $filename = $file->getClientOriginalName();
             $path = $request->file('company_logo')->storeAs('public/images',$filename);

        }
        
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view("company.editcompany",compact("company"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $company = Company::find($id);
        $company->name = $request->company_name;
        $company->email = $request->company_email;
        $company->website = $request->company_website;
        $file = $request->file('company_logo');
        if($file){
         $filename= $file->getClientOriginalName();
         $company->logo = $filename;   
        }
        else{
            $company->logo = $company->logo;  
        }
        
        $company->save();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        $companies = Company::find($id);
        $companies->delete();
        return redirect()->route('company.index')->with("info","Successfully Deleted");
        
    }
}
