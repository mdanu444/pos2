<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['addLink'] = "groups.create";
        $this->data['groups'] = Group::all();

        return view('Groups.index', ['data'=> $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:groups'
        ]);

        if(Group::create($request->all())){
            $request->session()->flash('message', 'User Group Title Created Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('groups.index'));
        }else{
            $request->session()->flash('message', 'User Group Title cant Created Successfull.');
            $request->session()->flash('status', 'error');
            return redirect(route('groups.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['group'] = Group::findOrFail($id);
        return view('Groups.show', ['data'=> $this->data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['group'] = Group::findOrFail($id);
        return view('Groups.edit', ['data' => $this->data]);
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
        $group = Group::findOrFail($id);
        $group->title = $request->title;
        $group->updated_at = now();
        if ($group->save()) {
            $request->session()->flash('message', 'User Group Title Updated Successfull.');
            $request->session()->flash('status', 'success');
            return redirect(route('groups.index'));
        }else{
            $request->session()->flash('message', 'User Group Title cant Update.');
            $request->session()->flash('status', 'error');
            return redirect(route('groups.index'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Group::destroy($id)){
            session()->flash('message', 'User Group Title Deleted Successfull.');
            session()->flash('status', 'success');
            return redirect(route('groups.index'));
        }else{
            session()->flash('message', 'User Group Title cant Created Successfull.');
            session()->flash('status', 'error');
            return redirect(route('groups.index'));
        }
    }
}
