<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Member_groups;
use App\Models\Friends;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderBy('id','desc')->paginate(3);
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view ('groups.create');
    }
    public function createmember($id)
    {

        $data['friends'] = Friends::all();
        $data['group'] = Groups::where('id',$id)->first();
     return view ('groups.createmember', $data);
    }
    public function deletemember($id)
    {
        Member_groups::where('id', $id)->update(['status' => 2]);
        
        return redirect('groups'); 
    }
    
    public function storemember(Request $request, $id)
    {
        $cek = Friends::all();
        foreach($cek as $f){
            $isi = 'member'. $f->id;

            $member = $request[$isi];

            if($member != NULL){
                $cekmem = Member_groups::where('groups_id', $id)->where('friends_id', $member)->first();

                if($cekmem == NULL){
                    $save = new Member_groups;
                    $save->groups_id = $id;
                    $save->friends_id = $member;
                    $save->status = 1;
                    $save->save();
                }else{
                    Member_groups::where('id', $cekmem->id)->update(['status' => 1]);
                }
            }

        }

        return redirect('groups'); 


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
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
 
        $groups = new Groups;
 
        $groups->name = $request->name;
        $groups->description = $request->description;
 
        $groups->save();

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $group = Groups::where('id', $id)->first();
        return view('groups.show', ['group'=> $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $groups = Groups::where('id', $id)->first();
        return view('groups.edit', ['group'=> $groups]);
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
     $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
 
        Groups::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        Groups::find($id)->delete();
        return redirect('/groups');
    }
}