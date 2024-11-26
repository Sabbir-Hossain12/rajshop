<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CampaignReview;
use App\Models\Campaign;
use Illuminate\Support\Str;
use Image;
use Toastr;
//use Str;
use File;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        $show_data = Campaign::orderBy('id','DESC')->get();
        return view('backEnd.campaign.index',compact('show_data'));
    }
    public function create()
    {
        $products = Product::where(['status'=>1])->select('id','name','status')->get();
        return view('backEnd.campaign.create',compact('products'));
    }
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'name' => 'string',
            'header_title' => 'string',
            'video' => 'string',
            'status' => 'required',
            'variant_1_title' => 'string',
            'variant_2_title' => 'string',
            'variant_3_title' => 'string',
            'warranty_text' => 'string',
            'feature_desc_1'=>'string',
            'feature_desc_2'=>'string',
        ]);

        $input = $request->except(['review_img','banner_img','variant_1_img','variant_2_img','variant_3_img','image_one','image_two','image_three']);
        
        //banner image
        if ($request->hasFile('banner_img')) {
            $image1 = $request->file('banner_img');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1); // Moves the file to the upload path
            $image1Url = $uploadpath1 . $name1;  // Get the file path to save in DB or for further use
            $input['banner_img']=$image1Url;
        }
        
        //variant 1 image
        if($request->hasFile('variant_1_img'))
        {
            $image1 = $request->file('variant_1_img');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1); // Moves the file to the upload path
            $image1Url = $uploadpath1 . $name1;  // Get the file path to save in DB or for further use
            $input['variant_1_img']=$image1Url;
        }

        //variant 2 image
        if($request->hasFile('variant_2_img'))
        {
            $image1 = $request->file('variant_2_img');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1); // Moves the file to the upload path
            $image1Url = $uploadpath1 . $name1;  // Get the file path to save in DB or for further use
            $input['variant_2_img']=$image1Url;
        }

        //variant 3 image
        if($request->hasFile('variant_3_img'))
        {
            $image1 = $request->file('variant_3_img');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1); // Moves the file to the upload path
            $image1Url = $uploadpath1 . $name1;  // Get the file path to save in DB or for further use
            $input['variant_3_img']=$image1Url;
        }


        // Image One
        if ($request->hasFile('image_one')) {
            $image1 = $request->file('image_one');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1); // Moves the file to the upload path
            $image1Url = $uploadpath1 . $name1;  // Get the file path to save in DB or for further use

            $input['image_one']=$image1Url;
        }

        // Image Two
        if ($request->hasFile('image_two')) {
            $image2 = $request->file('image_two');
            $name2 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image2->getClientOriginalName()));
            $uploadpath2 = 'public/uploads/campaign/';
            $image2->move($uploadpath2, $name2); // Moves the file to the upload path
            $image2Url = $uploadpath2 . $name2;  // Get the file path to save in DB or for further use

            $input['image_two']=$image2Url;
        }

        // Image Three
        if ($request->hasFile('image_three')) {
            $image3 = $request->file('image_three');
            $name3 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image3->getClientOriginalName()));
            $uploadpath3 = 'public/uploads/campaign/';
            $image3->move($uploadpath3, $name3); // Moves the file to the upload path
            $image3Url = $uploadpath3 . $name3;  // Get the file path to save in DB or for further use
            $input['image_three']=$image3Url;
        }
        

        $input['slug'] = strtolower(Str::slug($request->name));
        

        $campaign = Campaign::create($input);

     
        //Review Images
        
        if ($request->hasFile('review_img')) {
            $images = $request->file('review_img');
            foreach ($images as $image) {
                
                $name = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image->getClientOriginalName()));
                $uploadpath = 'public/uploads/campaign/';
                $image->move($uploadpath, $name); // Moves the file to the upload path
                $imageUrl = $uploadpath . $name;  // Get the file path to save in DB or for further use

                $reviewImg= new CampaignReview();
                $reviewImg->campaign_id	=$campaign->id;
                $reviewImg->review_img=$imageUrl;
                $reviewImg->save();
              
            }
            
        }
        
        

        Toastr::success('Success','Data insert successfully');
        return redirect()->route('campaign.index');
    }

    public function edit($id)
    {
        $edit_data = Campaign::with('images')->find($id);
        $select_products = Product::where('campaign_id',$id)->get();
        $show_data = Campaign::orderBy('id','DESC')->get();
        $products = Product::where(['status'=>1])->select('id','name','status')->get();
        return view('backEnd.campaign.edit',compact('edit_data','products','select_products'));
    }


    public function update(Request $request)
    {
//        dd($request->all());
        
        $this->validate($request, [
            'name' => 'string',
            'header_title' => 'string',
            'video' => 'string',
            'status' => 'required',
            'variant_1_title' => 'string',
            'variant_2_title' => 'string',
            'variant_3_title' => 'string',
            'warranty_text' => 'string',
            'feature_desc_1' => 'string',
            'feature_desc_2' => 'string',
        ]);

        $campaign = Campaign::findOrFail($request->hidden_id); // Find the campaign by ID
        $input = $request->except(['hidden_id','review_img', 'banner_img', 'variant_1_img', 'variant_2_img', 'variant_3_img', 'image_one', 'image_two', 'image_three']);

        // Handle banner image
        if ($request->hasFile('banner_img')) {
            $image1 = $request->file('banner_img');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1);
            $image1Url = $uploadpath1 . $name1;

            // Delete old banner image if exists
            if ($campaign->banner_img && file_exists($campaign->banner_img)) {
                unlink($campaign->banner_img);
            }

            $input['banner_img'] = $image1Url;
        }

        // Handle variant 1 image
        if ($request->hasFile('variant_1_img')) {
            $image1 = $request->file('variant_1_img');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1);
            $image1Url = $uploadpath1 . $name1;

            // Delete old image if exists
            if ($campaign->variant_1_img && file_exists($campaign->variant_1_img)) {
                unlink($campaign->variant_1_img);
            }

            $input['variant_1_img'] = $image1Url;
        }
        

        // Handle variant 2 image
        if ($request->hasFile('variant_2_img')) {
            $image1 = $request->file('variant_2_img');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1);
            $image1Url = $uploadpath1 . $name1;

            // Delete old image if exists
            if ($campaign->variant_2_img && file_exists($campaign->variant_2_img)) {
                unlink($campaign->variant_2_img);
            }

            $input['variant_2_img'] = $image1Url;
        }
        
        // Handle variant 3 image
        if ($request->hasFile('variant_3_img')) {
            $image1 = $request->file('variant_3_img');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1);
            $image1Url = $uploadpath1 . $name1;

            // Delete old image if exists
            if ($campaign->variant_3_img && file_exists($campaign->variant_1_img)) {
                unlink($campaign->variant_3_img);
            }

            $input['variant_3_img'] = $image1Url;
        }

      
        // image_one
        if ($request->hasFile('image_one')) {
            $image1 = $request->file('image_one');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1);
            $image1Url = $uploadpath1 . $name1;

            if ($campaign->image_one && file_exists($campaign->image_one)) {
                unlink($campaign->image_one);
            }

            $input['image_one'] = $image1Url;
        }

        // image two
        if ($request->hasFile('image_two')) {
            $image1 = $request->file('image_two');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1);
            $image1Url = $uploadpath1 . $name1;

            if ($campaign->image_two && file_exists($campaign->image_two)) {
                unlink($campaign->image_two);
            }

            $input['image_two'] = $image1Url;
        }

        // image three
        if ($request->hasFile('image_three')) {
            $image1 = $request->file('image_three');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1);
            $image1Url = $uploadpath1 . $name1;

            if ($campaign->image_three && file_exists($campaign->image_three)) 
            {
                unlink($campaign->image_three);
            }

            $input['image_three'] = $image1Url;
        }

        // Update campaign details
        $campaign->update($input);

        // Handle review images
        if ($request->hasFile('review_img')) {

            $existingReviewImages = CampaignReview::where('campaign_id', $campaign->id)->get();
            
            foreach ($existingReviewImages as $existingReviewImage) {
                if (file_exists($existingReviewImage->review_img)) {
                    unlink($existingReviewImage->review_img);
                }
                $existingReviewImage->delete();
            }
            
            $images = $request->file('review_img');
            foreach ($images as $image) {
                $name = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image->getClientOriginalName()));
                $uploadpath = 'public/uploads/campaign/';
                $image->move($uploadpath, $name);
                $imageUrl = $uploadpath . $name;

                CampaignReview::create([
                    'campaign_id' => $campaign->id,
                    'review_img' => $imageUrl,
                ]);

            }
        }

        Toastr::success('Success', 'Data updated successfully');
        return redirect()->route('campaign.index');
    }




//    public function update(Request $request)
//    { 
//        $this->validate($request, [
//        'name' => 'required',
//        'short_description' => 'required',
//        'description' => 'required',
//        'status' => 'required',
//    ]);
//
//        $update_data = Campaign::find($request->hidden_id);
//        $input = $request->except('hidden_id','product_ids','files','image');
//        $image_one = $request->file('image_one');
//
//        // Image One
//        if ($request->hasFile('image_one')) {
//            // Delete the old image if it exists
//            if ($update_data->image_one && file_exists($update_data->image_one)) {
//                unlink($update_data->image_one); // Remove the old image
//            }
//
//            // Upload and store the new image
//            $image_one = $request->file('image_one');
//            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image_one->getClientOriginalName()));
//            $uploadPath1 = 'uploads/campaign/';
//            $image_one->move($uploadPath1, $name1); // Save to the 'uploads/campaign/' folder directly
//            $input['image_one'] = $uploadPath1 . $name1; // Add the new image path to the input array
//        }
//
//// Image Two
//        if ($request->hasFile('image_two')) {
//            // Delete the old image if it exists
//            if ($update_data->image_two && file_exists($update_data->image_two)) {
//                unlink($update_data->image_two); // Remove the old image
//            }
//
//            // Upload and store the new image
//            $image_two = $request->file('image_two');
//            $name2 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image_two->getClientOriginalName()));
//            $uploadPath2 = 'uploads/campaign/';
//            $image_two->move($uploadPath2, $name2); // Save to the 'uploads/campaign/' folder directly
//            $input['image_two'] = $uploadPath2 . $name2; // Add the new image path to the input array
//        }
//
//// Image Three
//        if ($request->hasFile('image_three')) {
//            // Delete the old image if it exists
//            if ($update_data->image_three && file_exists($update_data->image_three)) {
//                unlink($update_data->image_three); // Remove the old image
//            }
//
//            // Upload and store the new image
//            $image_three = $request->file('image_three');
//            $name3 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image_three->getClientOriginalName()));
//            $uploadPath3 = 'uploads/campaign/';
//            $image_three->move($uploadPath3, $name3); // Save to the 'uploads/campaign/' folder directly
//            $input['image_three'] = $uploadPath3 . $name3; // Add the new image path to the input array
//        }
//
//
//
//
//
//
//
//
//
//        if($request->hasFile('image')){
//            $image_four= $request->file('image');
//
//            $name =  time().'-'.$image_four->getClientOriginalName();
//            $name = strtolower(preg_replace('/\s+/', '-', $name));
//            $uploadPath = 'public/uploads/campaign/';
//            $image_four->move($uploadPath,$name);
//            $imageUrl =$uploadPath.$name;
//
//
//
//            $input['image']= $imageUrl;
//
//        }
//        // image four
//        $input['slug'] = strtolower(Str::slug($request->name));
//        $update_data = Campaign::find($request->hidden_id);
//        $update_data->update($input);
//
//        Toastr::success('Success','Data update successfully');
//        return redirect()->route('campaign.index');
//    }

    public function inactive(Request $request)
    {
        $inactive = Campaign::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Campaign::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {

        $delete_data = Campaign::find($request->hidden_id);
        $delete_data->delete();

        $campaign = Product::whereNotNull('campaign_id')->get();
        foreach($campaign as $key=>$value){
            $product = Product::find($value->id);
            $product->campaign_id = null;
            $product->save();
        }
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
    public function imgdestroy(Request $request)
    {
        $delete_data = CampaignReview::find($request->id);
        File::delete($delete_data->image);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
