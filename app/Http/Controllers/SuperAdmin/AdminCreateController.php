<?php
    
namespace App\Http\Controllers\SuperAdmin;

use App\Models\AdminCreate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    
class AdminCreateController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = AdminCreate::latest()->paginate(5);
        return view('adminCreate.index',compact('adminCreate'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminCreate.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'agencyName' => ['required', 'string', 'max:255'],
            'agencyAddress' => ['required', 'string', 'max:255'],
            'agencyContact' => ['required', 'digits:11'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'contactNumber' => ['required', 'digits:11'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admin'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        AdminCreate::create($request->all());
    
        return redirect()->route('adminCreate.index')
                        ->with('success','Admin created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\AdminCreate  $adminCreate
     * @return \Illuminate\Http\Response
     */
    public function show(AdminCreate $adminCreate)
    {
        return view('adminCreate.show',compact('adminCreate'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminCreate  $adminCreate
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminCreate $adminCreate)
    {
        return view('adminCreate.edit',compact('adminCreate'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminCreate  $adminCreate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminCreate $adminCreate)
    {
         request()->validate([
            'agencyName' => ['required', 'string', 'max:255'],
            'agencyAddress' => ['required', 'string', 'max:255'],
            'agencyContact' => ['required', 'digits:11'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'contactNumber' => ['required', 'digits:11'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admin'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        $adminCreate->update($request->all());
    
        return redirect()->route('adminCreate.index')
                        ->with('success','Admin updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminCreate  $adminCreate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminCreate $adminCreate)
    {
        $adminCreate->delete();
    
        return redirect()->route('adminCreate.index')
                        ->with('success','Admin deleted successfully');
    }
}