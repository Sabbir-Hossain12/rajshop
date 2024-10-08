<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        return view('backEnd.blog.index');
    }



    public function store(Request $request){


        $blog = new Blog();
        $blog->b_title = $request->b_title;
        $blog->b_short_des = $request->b_short_des;
        $blog->b_long_des = $request->b_long_des;
        if( $request->hasFile('b_image') ){
            $image = $request->file('b_image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backEnd/image/blog/';
            $image->move($imagePath, $imageName);

            $blog->b_image   = $imagePath . $imageName;
        }
        $blog->b_author = $request->b_author;
        if( $request->hasFile('b_author_image') ){
            $image = $request->file('b_author_image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backEnd/image/blog/';
            $image->move($imagePath, $imageName);

            $blog->b_author_image   = $imagePath . $imageName;
        }
        $blog->b_date = $request->b_date;
        $blog->status = $request->status;
        $blog->save();


   }



     public function show(){
      $blog = Blog::all();
      return view('backEnd.blog.show', compact('blog'));

        }


      public function edit($id){
      $edit =Blog::find($id);
       return view('backEnd.blog.edit',compact('edit'));
      }


      public function update(Request $request){
        $id=$request->id;

     $blog = Blog::find($id);
        $blog->b_title = $request->b_title;
        $blog->b_short_des = $request->b_short_des;
        $blog->b_long_des = $request->b_long_des;
        if( $request->hasFile('b_image') ){
            $image = $request->file('b_image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backEnd/image/blog';
            $image->move($imagePath, $imageName);

            $blog->b_image   = $imagePath . $imageName;
        }
        $blog->b_author = $request->b_author;
        if( $request->hasFile('b_author_image') ){
            $image = $request->file('b_author_image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backEnd/image/blog/';
            $image->move($imagePath, $imageName);

            $blog->b_author_image   = $imagePath . $imageName;
        }
        $blog->b_date = $request->b_date;
        $blog->status = $request->status;
        $blog->save();

      }



//     public function update(Request $request)
// {
//     // Validate request data
//     $request->validate([
//         'b_title' => 'required|string|max:255',
//         'b_short_des' => 'required|string|max:500',
//         'b_long_des' => 'required|string',
//         'b_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'b_author' => 'required|string|max:255',
//         'b_author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'b_date' => 'required|date',
//         'status' => 'required|boolean'
//     ]);

//     // Find the blog by id
//     $blog = blog::find($request->id);

//     if(!$blog) {
//         return redirect()->back()->withErrors(['Blog not found.']);
//     }

//     // Update fields
//     $blog->b_title = $request->b_title;
//     $blog->b_short_des = $request->b_short_des;
//     $blog->b_long_des = $request->b_long_des;

//     // Handle blog image upload
//     if ($request->hasFile('b_image')) {
//         $image = $request->file('b_image');
//         $imageName = microtime(true) . '.' . $image->getClientOriginalExtension();
//         $imagePath = 'public/backEnd/image/blog/'; // Ensure this path has a trailing slash
//         $image->move($imagePath, $imageName);

//         $blog->b_image = $imagePath . $imageName;
//     }

//     // Update author and author image
//     $blog->b_author = $request->b_author;

//     if ($request->hasFile('b_author_image')) {
//         $authorImage = $request->file('b_author_image');
//         $authorImageName = microtime(true) . '.' . $authorImage->getClientOriginalExtension();
//         $authorImagePath = 'public/backEnd/image/blog/'; // Ensure consistent path
//         $authorImage->move($authorImagePath, $authorImageName);

//         $blog->b_author_image = $authorImagePath . $authorImageName;
//     }

//     // Update date and status
//     $blog->b_date = $request->b_date;
//     $blog->status = $request->status;

//     // Save the updated blog
//     $blog->save();

//     // Redirect back with success message
//     return redirect()->back()->with('success', 'Blog updated successfully!');
// }



      public function delete($id){


           $blog = Blog::findOrFail($id);

           if ( !is_null($blog->image) ) {
                if (file_exists($blog->image)) {
                    unlink($blog->image);
                }
            }

            $blog->delete();

            return redirect()->back()->with('message', 'Delete Successfully');
        }






        // front blog

        public function blog($id){
        $resentpost=Blog::all();
        $blog=Blog::find($id);
        return view('frontEnd.blog.blog',compact('blog','resentpost'));

        }



   }
