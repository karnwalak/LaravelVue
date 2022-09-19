<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Http\Requests\StateStoreRequest;
use App\Http\Requests\StateUpdateRequest;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;

class SystemController extends Controller
{
    public function country(Request $request)
    {
        if($request->has('search')){
            $country = Country::where('name','like', '%' . $request->search . '%')->orWhere('country_code','like', '%' . $request->search . '%')->get();
        }else{
            $country = Country::all();
        }
        return view('system.country',compact('country'));
    }

    public function add_country()
    {
        return view('system.add_country');
    }

    public function store_country(CountryStoreRequest $request)
    {
        Country::create([
            'country_code' => $request->country_code,
            'name' => $request->name
        ]);

        return redirect('country')->with('message','Country Added Successfully!');
    }

    public function edit_country($id)
    {
        $country = Country::find($id);
        return view('system.edit-country',compact('country'));
    }

    public function update_country(CountryUpdateRequest $request)
    {
        Country::where('id',$request->pid)->update([
            'country_code' => $request->country_code,
            'name' => $request->name
        ]);

        return redirect('country')->with('message','Country Updated Successfully!');
    }

    public function delete_country($id)
    {
        Country::where('id',$id)->delete();
        return redirect('country')->with('message','Country Deleted Successfully!');
    }

    public function state(Request $request)
    {
        if($request->has('search')){
            $state = State::join('countries','countries.id','states.country_id')
                     ->where('states.name','like', '%' . $request->search . '%')
                     ->orWhere('countries.name','like', '%' . $request->search . '%')
                     ->get(['states.*','countries.name as country_name']);
        }else{
            $state = State::join('countries','countries.id','states.country_id')->get(['states.*','countries.name as country_name']);
        }
        return view('system.state',compact('state'));
    }

    public function add_state()
    {
        $country = Country::orderBy('name','asc')->get();
        return view('system.add_state',compact('country'));
    }

    public function store_state(StateStoreRequest $request)
    {
        State::create([
            'country_id' => $request->country_name,
            'name' => $request->name
        ]);
        return redirect('state')->with('message','State Added Successfully!');
    }

    public function edit_state($id)
    {
        $country = Country::orderBy('name','asc')->get();
        $state = State::find($id);
        return view('system.edit-state',compact(['state','country']));
    }

    public function update_state(StateUpdateRequest $request)
    {
        State::where('id',$request->pid)->update([
            'country_id' => $request->country_name,
            'name' => $request->name
        ]);

        return redirect('state')->with('message','State Updated Successfully!');
    }

    public function delete_state($id)
    {
        State::where('id',$id)->delete();
        return redirect('state')->with('message','State Deleted Successfully!');
    }

    public function city(Request $request)
    {
        if($request->has('search')){
            $state = City::join('countries','countries.id','cities.country_id')
            ->join('states','states.id','cities.state_id')
            ->where('states.name','like', '%' . $request->search . '%')
            ->orWhere('countries.name','like', '%' . $request->search . '%')
            ->orWhere('cities.name','like', '%' . $request->search . '%')
            ->get(['cities.*','states.name as state_name','countries.name as country_name']);
        }else{
            $state = City::join('countries','countries.id','cities.country_id')
            ->join('states','states.id','cities.state_id')
            ->get(['cities.*','states.name as state_name','countries.name as country_name']);
        }
        return view('system.city',compact('state'));
    }

    public function add_city()
    {
        $country = Country::orderBy('name','asc')->get();
        return view('system.add_city',compact('country'));
    }

    public function store_city(CityStoreRequest $request)
    {
        City::create([
            'country_id' => $request->country_name,
            'state_id' => $request->state_name,
            'name' => $request->name
        ]);
        return redirect('city')->with('message','City Added Successfully!');
    }

    public function edit_city($id)
    {
        $country = Country::orderBy('name','asc')->get();
        $city = City::find($id);
        $state = State::where('country_id',$city->country_id)->get();
        return view('system.edit-city',compact(['state','country','city']));
    }

    public function update_city(CityUpdateRequest $request)
    {
        City::where('id',$request->pid)->update([
            'country_id' => $request->country_name,
            'state_id' => $request->state_name,
            'name' => $request->name
        ]);

        return redirect('city')->with('message','City Updated Successfully!');
    }

    public function delete_city($id)
    {
        City::where('id',$id)->delete();
        return redirect('city')->with('message','City Deleted Successfully!');
    }

    public function fetch_state(Request $request)
    {
        $state = State::where('country_id',$request->id)->get(['id','name']);
        return response() ->json($state);
    }

    public function fetch_city(Request $request)
    {
        $city = City::where('state_id',$request->id)->get(['id','name']);
        return response() ->json($city);
    }
}
