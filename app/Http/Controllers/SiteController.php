<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteController extends Controller
{

    public function show(Site $site)
    {
        //
    }


    public function edit(Site $site)
    {

        if(auth()->user()->type == 'admin'){

            $site = Site::first();
            return view('site.edit', compact('site'));

        }else{
            return back();
        }
    }


    public function update(Request $request, Site $site)
    {
        $request->validate([
            'title1' => 'nullable|string|max:250',
            'sub1' => 'nullable|string',
            'about_us' => 'nullable|string',
            'sub2' => 'nullable',
            'image' => 'nullable',
        ]);

        $imageName = null;
        if($request->hasFile('image')){


            if(File::exists('site/'.$site->image)){
                File::delete('site/'.$site->image);
            }
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('site/'),$imageName);
        }
        $site->update([
            'title1' => $request->title1,
            'sub1' => $request->sub1,
            'about_us' => $request->about_us,
            'sub2' => $request->sub2,
            'image' => $imageName
        ]);
        return redirect('/')->with('suc', 'asd');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
