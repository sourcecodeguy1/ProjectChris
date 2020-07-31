<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = Auth::user()->id;

        $user_data = User::find($user_id);

        $page_name = "account_settings";

        $category_name = "users";


        return view('pages/users/user_account_setting')->with(['user_data' => $user_data, 'page_name' => $page_name, 'category_name' => $category_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save user profile image

       /* $this->validate($request,[
           'profile_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('profile_image')){
            // Get file name with the extension
            $fileNameWithExt = $request->file('profile_image')->getClientOriginalName();
            // Get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get file extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('profile_image')->storeAs('public/profile_image', $fileNameToStore);
        }else{
            $fileNameToStore = '200x200.jpg';
        }*/

        // Store the image to the database
        /*$store_image = new User;

        $store_image->profile_image = $fileNameToStore;

        $store_image->save();

        return redirect('account_settings');*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'profile_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('profile_image')){
            // Get file name with the extension
            $fileNameWithExt = $request->file('profile_image')->getClientOriginalName();
            // Get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get file extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('profile_image')->storeAs('public/img', $fileNameToStore);
        }

        $user_id = Auth::user()->id;

        $user_update = User::find($user_id);

        //$name = $request->name;

        $user_update->update($request->all());

        return redirect('account_settings');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
