<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $tags=Tag::paginate(1);
        return view('dashboard.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tag=new Tag();
        return view('dashboard.tags.create',compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $clean_data = $request->validate(Tag::rules(), [
            'required' => 'This field (:attribute) is required',
            'name.unique' => 'This name is already exists!'
        ]);

        //Request Merge to add value to the request 
        $request->merge([
            'slug' =>Str::slug($request->post('name'))
        ]);
        //Mass-Assignment so we do declare fillable property in the model
        $tag=Tag::create($request->all());
 return  redirect()->route('tags.index')->with('success','created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tag= Tag::findOrFail($id);
        return view('dashboard.tags.edit',compact('tag'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request,$id)
    {
        //
        $tag=Tag::findOrFail($id);
        $tag->fill($request->all())->save();
        return  redirect()->route('tags.index')->with('info', 'Updated successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tag::destroy($id);

        return  redirect()->route('tags.index')->with('danger', 'Deleted successfully');

    }

    public function trash(){
        $tags=Tag::onlyTrashed()->paginate();
        return view('dashboard.tags.trash',compact('tags'));
    }


    
public function restore(Request $request,$id){
    $tags=Tag::onlyTrashed()->findOrFail($id);
    $tags->restore();
    return redirect()->route('dashboard.tags.trash');
    
}

    public function forceDelete($id)
    {
        $tags = Tag::onlyTrashed()->findOrFail($id);
        $tags->forceDelete();
        return redirect()->route('dashboard.tags.trash');
    }
    
}