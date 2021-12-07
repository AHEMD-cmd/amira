<?php

namespace App\Http\Controllers;

use App\Image;
use App\Project;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function browse_all()
    {
        $projects = Project::all();
        // $projects = Project::take(4)->get();
        return view('browse_all', compact('projects'));
    }

    public function front_project()
    {
        $projects = Project::all();
        // $projects = Project::take(4)->get();
        return view('home', compact('projects'));
    }
    public function index()
    {
        $projects = Project::all();
        $site = Site::first();
        // $projects = Project::take(4)->get();
        return view('projects.index', compact('projects', 'site'));

        if(auth()->user()->type == 'admin'){

            $projects = Project::all();
            $site = Site::first();

            // $projects = Project::take(4)->get();
            return view('projects.index', compact('projects', 'site'));
        }else{
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site = Site::first();
        return view('projects.create', compact('site'));
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
            'title' => 'required|string',
            'desc' => 'required|string',
            'cover' => 'required|image',
            'images' => 'required'
        ]);

        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $imageName = time().'_'. $file->getClientOriginalName();
            $file->move(\public_path('cover/'),$imageName);
        }

        $project = new Project([
            'title' => $request->title,
            'desc' => $request->desc,
            'cover' => $imageName,
        ]);

        $project->save();

        if($request->hasFile('images')){
            $files = $request->file('images');
            foreach($files as $file){
                $imageName = time().'_'.$file->getClientOriginalName();
                $request['image'] = $imageName;
                $request['project_id'] = $project->id;
                $file->move(\public_path('/images'),$imageName);
                Image::create($request->all());
            }
        }

        return redirect()->route('project.index')->with('success', 'success');

    }


    public function show($id)
    {
        $project = Project::findOrFail($id);
        $site = Site::first();
        return view('projects.show', compact('project', 'site'));
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'desc' => 'required|string',
            'cover' => 'nullable|image',
            'images' => 'nullable'
        ]);
        $project = Project::findOrFail($id);

        $imageName = $project->cover;
        if($request->hasFile('cover')){
            if(File::exists('cover/'.$project->cover)){
                File::delete('cover/'.$project->cover);
            }

            $file = $request->file('cover');
            $imageName = time().'_'. $file->getClientOriginalName();
            $file->move(\public_path('cover/'),$imageName);
        }
        $project->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'cover' => $imageName,
        ]);

        if($request->hasFile('images')){
            $files = $request->file('images');
            foreach($files as $file){
                $imageName = time().'_'.$file->getClientOriginalName();
                $request['image'] = $imageName;
                $request['project_id'] = $id;
                $file->move(\public_path('/images'),$imageName);
                Image::create($request->all());
            }
        }

        return redirect()->route('project.index')->with('success', 'success');


    }


    public function destroy(Project $project, $id)
    {
        $project = Project::findOrFail($id);
        if(File::exists('cover/'.$project->cover)){
            File::delete('cover/'.$project->cover);
        }
        $images = Image::where('project_id', $project->id)->get();
        foreach($images as $image){
            if(File::exists('images/'.$image->image)){
                File::delete('images/'.$image->image);
            }
        }

        $project->delete();
        return back();
    }

    public function image_destroy($id)
    {
        $image = Image::findOrFail($id);
        if(File::exists('images/'.$image->image)){
            File::delete('images/'.$image->image);
        }
        Image::find($id)->delete();
        return back();
    }


}
