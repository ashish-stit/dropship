<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\masters_model;
use App\Models\master_thumbnails_model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\ActivationlinkEvent;
use Illuminate\Http\Request;
use App\Notifications\UserActive;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Models\employees;
use App\Models\videos_model;
use DataTables;
use App\Http\Controllers\Controller;
use Session;
use Closure;
class AdminController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
# -------------- Employee ----------

    public function getAllQPRUPloaded(Request $request) {
        $emp_data = employees::select('*')->get();
        $vars = $request->post();
        //$list = $this->employees->getAllUploadedQprforState($vars);
        return view('datatables', ['empData' => $emp_data]);
    }

    public function getAllEmployeeloaded() {
        return view('datatables');
    }

    public function dashboard() {
         if(Auth::user()->role_id == 3){
        return view('admin/index');
         }
         else {
             return view('errors/404');
         }
         
    }
       public function imageLayout()
        {
        if(Auth::user()->role_id == 3){
        $users = masters_model::get();
        return view('admin/addimage-Layout',['users'=>$users]);
            }
            else {
                return view('errors/404');
            }
        }
    public function storeimageLayout(Request $request){
    $master = new masters_model();
    $master->image_size=request('imagesize');
    $master->description=request('description');
    $master->img=request('image');
    $imagename = time().'.'.request()->image->getClientOriginalExtension();
    $master->img= '' . $imagename;
    request()->image->move(public_path('img'),$imagename);
    $master->save();
    return back()
    ->with('success','You have successfully uploaded images.');
    return view('admin/addimage-Layout');
}
    public function adminDashboard() {
        $emp_data = employees::select('*')->get();
        if(Auth::user()->role_id == 3){
        return view('admin/adminDashboard', ['empData' => $emp_data]);
        }
        else {
             return view('errors/404');
         }
    }

    public function addEmployee(Request $request) {
        if (request()->ajax()) {
            $posts = $request->post();
            $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $generatedPass = substr(str_shuffle($keyspace), 0, 8);
           
            if( User::where('email', $posts['empEmail'])->exists()){
              return response()->json(array('message' => 'user_exists'));
            }  
//          add into user table
            $users = new User();
            $users->name = $posts['empValue'];
            $users->email = $posts['empEmail'];
            $users->password = bcrypt($generatedPass);         
            $users->role_id = '2';
            $users->token = str_random(40) . time();

//          add into employee table           
            $employee = new employees();
            $employee->name = $posts['empValue'];
            $employee->email = $posts['empEmail'];
            $employee->password = bcrypt($generatedPass);
            $employee->contact = $posts['empContact'];
            $employee->last_login = date('Y-m-d h:i:s');
            $employee->status = $posts['status'];

            if ($employee && $users) {
                $users->save();
                $employee->user_id = $users->id;
                $employee->save();
                if ($employee->status == 1) {
                    $users->notify(new UserActive($users,$generatedPass));
                    return response()->json(array('message' => 'success', 'employeeData' => $employee));
                }
                if ($employee->status == 0) {
                    return response()->json(array('message' => 'success', 'employeeData' => $employee));                
           } else {
                return response()->json(array('error' => 'something went wrong!!'));
            }

        }
        }
    }

public function editEmployee(Request $request) {
    if ($request->ajax()) {
        $id = $request->empIds;
        $empData = employees::where('id', $id)->first();
        if ($empData) {
            return response()->json(array('message' => 'success', 'emp_data' => $empData));
        } else {
            return response()->json(array('error' => 'Something went Wrong!!'));
        }
    }
}

public function updateEmp(Request $request) {
    if ($request->isMethod('post') && $request->ajax()) {
        $posts = $request->post();
        $usrData = User::findorfail($posts['user_id']);
        if ($usrData) {
            $usrData->name = $posts['emp_name'];
            $usrData->email = $posts['emp_email'];
        }
        $emp_data = employees::findOrFail($posts['id']);
        if ($emp_data) {
            $emp_data->id = $posts['id'];
            $emp_data->user_id = $posts['user_id'];
            $emp_data->name = $posts['emp_name'];
            $emp_data->email = $posts['emp_email'];
            $emp_data->contact = $posts['emp_cnt'];
            $emp_data->status = $posts['sts'];
        }
        if ($usrData && $emp_data) {
            $usrData->save();
            $emp_data->save();
            return response()->json(array('messsage' => 'success', 'usr_data' => $usrData, 'emp_data' => $emp_data));
        } else {
            return response()->json(array('error' => 'Something went wrong'));
        }
    }
}

public function removeEmployee(Request $request) {
    if (request()->ajax()) {

        $empDelete = employees::where('id', $request->empid)->first();
        $userData = User::where('id', $empDelete->user_id)->first();
        if ($empDelete && $userData) {
            $empDelete->delete();
            $userData->delete();
            return response()->json(array('message' => 'success'));
        } else {
            return response()->json(array('error' => 'something went wrong!!'));
        }
    }
}
   public function addVideoStyle(){
       if(Auth::user()->role_id == 3){
     $users = videos_model::get();
        return view('admin/add-video', compact('users'));
       }
       else
       {
           return view('errors/404');
       }
}
public function storeAddVideoStyle(Request $request){
    $video = new videos_model();   
    $video->name=request('name');
    $video->description=request('description');
    $videoSave=$request->file('video'); 
    $path = public_path() . "/img/video";
    $name = uniqid($videoSave->getClientOriginalName());
    $video->links= '' . $name;
    $videoSave->move($path, $name);
    $video->save();
    return view('admin/add-video');
    }
    public function deleteimage($id)
     {
       $customer = masters_model::find($id);
        if ($customer->delete()) {
         Session::flash('msg', "Image Successfully deleted");
        return redirect('admin/addimage');
        }
     }

  
        public function deletevideo($id)
            {
               $customer =videos_model::find($id);
                if ($customer->delete())
                {
                     Session::flash('msg', "Video Successfully deleted");
                    return redirect('admin/add-video');
                }
            }
            
            
    public function AddthumVideo(Request $request){
    $video = new master_thumbnails_model();   
    $videoSave=$request->video; 
    $video->thum_video=$videoSave;
    if($video->save())
    {
    return response()->json(array('success' => 'Thumd Video Uploaded!!'));

    }
    }
        
    public function ShowThumlist()
    {
        if(Auth::user()->role_id == 3){
        $thumbVideo=master_thumbnails_model::select('*')->get();
        return view('admin/thumbnail')->with('thumb',$thumbVideo);
        }
        else{
            return view('errors/404');
        }
    }
 
  public function updateImg(Request $request) {
    if ($request->ajax()) {
        $id = $request->ImgId;
        $empData = masters_model::where('id', $id)->first();
        if ($empData) {
            return response()->json(array('message' => 'success', 'admin_img_data' => $empData));
        } else {
            return response()->json(array('error' => 'Something went Wrong!!'));
        }
    }
}
    public function UpdateImglayout(Request $request) {
        if ($request->isMethod('post') && $request->ajax()) 
        {
        $posts = $request->post();
       $layout_data = masters_model::findOrFail($posts['id']);

        if ($layout_data) {
            $layout_data->id = $posts['id'];
            $layout_data->image_size = $posts['img_size'];
            $layout_data->description = $posts['img_desc'];
            $layout_data->img = $posts['image'];
            if($layout_data->save())
            {
                return response()->json(array('messsage' => 'success', 'admin_img_data' => $layout_data));
                } 
                else {
                    return response()->json(array('error' => 'Something went wrong'));
                }
            }
        }
    
    }
      public function deletethumb($id)
            {
               $thumbnail =master_thumbnails_model::find($id);
                if ($thumbnail->delete())
                {
                     Session::flash('msg', "Video Successfully deleted");
                    return redirect('admin/thumImg');
                }
            }
    
        public function EditThumbVideo(Request $request)
        {
            if ($request->ajax()) {
                 $id = $request->ThumId;
                $thumData = master_thumbnails_model::where('id', $id)->first();
                if ($thumData) {
                    return response()->json(array('message' => 'success', 'admin_thum_data' => $thumData));
                } else {
                    return response()->json(array('error' => 'Something went Wrong!!'));
                }
            }
        }

    public function UpdateThumbVideo(Request $request) {
          if ($request->isMethod('post') && $request->ajax()) 
        {
        $posts = $request->post();
       $thum_layout_data = master_thumbnails_model::findOrFail($posts['id']);

        if ($thum_layout_data) {
            $thum_layout_data->id = $posts['id'];
            $thum_layout_data->thum_video = $posts['thumb'];
           if($thum_layout_data->save())
            {
                return response()->json(array('messsage' => 'success', 'thumb_video_data' => $thum_layout_data));
                } 
                else {
                    return response()->json(array('error' => 'Something went wrong'));
                }
            }
        }
    }
    public function editVideoData(Request $request){
  if($request->ajax()){
    $id = $request->empEditId;
    $editVideo = videos_model::where('id',$id)->first();
    if($editVideo){
      return response()->json(array('message' => 'success', 'empdata' => $editVideo));
    }else{
      return response()->json(array('message' => 'something went wrong'));
    }
  }
}
public function updateVideo(Request $request){
  if($request->isMethod('post') && $request->ajax()){
    $posts = $request->post();
    $employDat = videos_model::findOrFail($posts['id']);
    if($employDat){
     $employDat->id = $posts['id'];
     //print_r($employDat);exit;
     $employDat->links = $posts['links'];
     
     $employDat->name = $posts['name'];
     //print_r($employDat);exit;
     $employDat->description = $posts['description'];
     //print_r($employDat);exit;
   }
   if($employDat){
    $employDat->save();
    return response()->json(array('message' => 'success', 'employDat' => $employDat));
  }else{
    return response()->json(array('error' => 'something went wrong'));
  }
}
}

}
