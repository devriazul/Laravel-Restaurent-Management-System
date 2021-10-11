<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\Foodchef;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // user's list
    public function user(){ 
        $data = User::all();
        return view('admin.users',compact('data'));
    }

    // user delete 
    public function deleteuser($id){ 
        $data=User::find($id);
        $data->delete();
        return redirect()->back();
    }

    // food information delete
    public function deletemenu($id){ 
        $data=Food::find($id);
        $data->delete();
        return redirect()->route('foodmenu');
    }

    // food menu page
    public function foodmenu(){ 
        $data = Food::all();
        return view('admin.foodmenu',compact('data'));
    }

    // food information upload
    public function upload(Request $request){ 

        try {
            $request->validate([
                'title'=>'required',
                'price'=>'required',
                'description'=>'required',
                'image'=>'required'
            ],$messages = [
                'title.required' => 'Food title is required.',
                'price.required' => 'Food price is required.',
                'description.required' => 'Food description is required.',
                'image.required' => 'Food image is required.'
            ]);
            $data = new Food();

            $image = $request->image;
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $request->image->move('foodimage',$imageName);

            $data->image = $imageName;
            $data->title = $request->title;
            $data->price = $request->price;
            $data->description = $request->description;

            $data->save();
            return redirect()->back()->with('msg','Successfully Data Added');
        } catch (\Exception $exception) {
            $errors = $exception->validator->getMessageBag();
            return redirect()->back()->withErrors($errors)->withInput();
        }

    }

    // food update show page
    public function updateview($id){
        $data=Food::find($id);
        return view('admin.updateview',compact('data'));
    }

    // food information update function
    public function update(Request $request,$id){

        $data=Food::find($id);
        $image = $request->image;

        if($image){
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $request->image->move('foodimage',$imageName);
            $data->image = $imageName;
        }

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();
        return redirect()->route('foodmenu');

    }
    

    // reservation page show
    public function reservation(Request $request){ 
        
        try {
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'guest'=>'required',
                'date'=>'required',
                'time'=>'required',
                'message'=>'required',
            ],$messages = [
                'name.required' => 'name is required.',
                'email.required' => 'email is required.',
                'phone.required' => 'phone is required.',
                'guest.required' => 'guest no is required.',
                'date.required' => 'date is required.',
                'time.required' => 'time is required.',
                'message.required' => 'message is required.',
            ]);
            $data = new Reservation();    
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->guest = $request->guest;
            $data->date = $request->date;
            $data->time = $request->time;
            $data->message = $request->message;
            $data->save();
            return redirect()->back()->with('msg','Data Added Successfully');
        } catch (\Exception $exception) {
            $errors = $exception->validator->getMessageBag();
            return redirect()->back()->withErrors($errors)->withInput();
        }
        
    }

    // view reservation page
    public function viewreservation(){ 
        if (Auth::id()) {
            $data=Reservation::all();
            return view('admin.adminreservation',compact('data'));   
        }else {
            return redirect()->back();
        }
    }

    // chef view page
    public function viewchef(){ 
        $data = Foodchef::all();
        return view('admin.adminchef',compact('data'));
    }

    // upload chef information
    public function uploadchef(Request $request){ 
        try {
            $request->validate([
                'name'=>'required',
                'speciality'=>'required',
                'image'=>'required'
            ],$messages = [
                'name.required' => 'name is required.',
                'speciality.required' => 'speciality is required.',
                'image.required' => 'chef\'s image is required.'
            ]);
            $data = new Foodchef();

            $image = $request->image;
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $request->image->move('chefimage',$imageName);
    
            $data->image = $imageName;
            $data->name = $request->name;
            $data->speciality = $request->speciality;
    
            $data->save();
            return redirect()->back()->with('msg','Data Added Successfully');
        } catch (\Exception $exception) {
            $errors = $exception->validator->getMessageBag();
            return redirect()->back()->withErrors($errors)->withInput();
        }

    }


    // update chef information show page
    public function updatechef($id){ 
        $data=Foodchef::find($id);
        return view('admin.updatechef',compact('data'));
    }

    // update food chef information
    public function updatefoodchef(Request $request,$id){ 
        $data=Foodchef::find($id);
        $image = $request->image;

        if($image){
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $request->image->move('chefimage',$imageName);
            $data->image = $imageName;
        }

        $data->name=$request->name;
        $data->speciality=$request->speciality;

        $data->save();
        return redirect()->route('admin.viewchef');
    }

    // delete chef information
    public function deletechef($id){ 
        $data=Foodchef::find($id);
        $data->delete();
        return redirect()->back();
    }

    // order page
    public function orders(){ 
        $data=Order::all();
        return view('admin.orders',compact('data'));
    }

    // search orders
    public function search(Request $request){ 
        $search = $request->search;
        $data=Order::where('name','Like','%'.$search.'%')->orWhere('foodname','Like','%'.$search.'%')->get();
        return view('admin.orders',compact('data'));
    }

}
