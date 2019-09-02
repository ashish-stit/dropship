<?php
namespace App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\employees;
use App\Models\master_thumbnails_model;
use App\Models\customers;
use App\Models\customer_orders_model;
use App\Models\videos_model;
use App\Models\music_model;
use App\Models\gender_model;
use App\Models\masters_model;
use Illuminate\Http\Request;
use App\Notifications\videoUploaded;
use App\Http\Controllers\Controller;
use Session;
use DB;

class EmployeeController extends Controller 
{
    public function loginEmploye()
    {
       return view('emplogin');
   }
   public function forgetPass()
   {
    return view('empForget');
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard() {
        if(Auth::user()->role_id == 2){
            return view('employee/dashboard');
        }
        else{
            return view('errors/404');
        }
    }

    public function viewOrders(Request $request) {
        $employee = employees::where('user_id', Auth::id())->first();

        if($employee['status'] == 1 && Auth::user()->role_id == 2){
            $customerOrder = customer_orders_model::get();
            $customer=customers::get();
            return view('employee/orders', ['customerOrders' => $customerOrder ,'customer' => $customer]);
        }

        elseif($employee['status'] == 0 && Auth::user()->role_id == 2)
        {
         Session::flash('status', "Your Account have been not Activated");
         return redirect('emplogin');
     }

     else{
       return view('errors/404');
   }
}

public function viewOrderByEmp(Request $request ,$id){        
    $viewOrderDetails = customer_orders_model::select('*')
    ->with('getVideos')
    ->with('getGender')
    ->with('getMusic')
    ->findorfail($id);     
    $data=master_thumbnails_model::where('id',$viewOrderDetails->thumbnail_video)->first(); 
    return view('employee/viewOrderDetails')->with(['orderDetails' => $viewOrderDetails,'data' =>$data]);
}

public function assignedOrderByEmp(Request $request) {
    if ($request->isMethod('post') && $request->ajax()) {
        $posts = $request->post();
        $orderId = $posts['order_id'];           
        $empId = $posts['emp_id'];           
        $custOrder = customer_orders_model::findorfail($orderId);            
        if( empty($custOrder->is_assigned) && $custOrder->is_assigned == NULL ){
            $custOrder->is_assigned = $empId;
            $custOrder->save();
        }
    }
    if ($custOrder) {
        return response()->json(array('message' => 'success', 'empId' => $empId, 'orderId' => $orderId));
    } else {
        return response()->json(array('error' => 'Something went wrong!!'));
    }
}

public function rejectOrderByEmp(Request $request) {
    if ($request->isMethod('post') && $request->ajax()) {
        $posts = $request->post();
        $ordrid = $posts['order_id'];
        $orders = customer_orders_model::findorfail($ordrid);
        $orders->is_assigned = NULL;
        $orders->save();
    }
    if ($orders) {
        return response()->json(array('message' => 'success', 'order_id' => $ordrid));
    } else {
        return response()->json(array('error' => 'Something went wrong!!'));
    }
}

public function videoUploadByEmp(Request $request) {
    if ($request->isMethod('post') && $request->ajax()) {
        $posts = $request->post();
        $orderId = $posts['orderid'];
        if ($file = $request->file('video')) {
            $path = public_path() . "/img/video";
            $priv = 0777;
            if (!file_exists($path)) {
                mkdir($path, $priv) ? true : false;
            }
            $name = uniqid($file->getClientOriginalName());
            $file->move($path, $name);
            $findOrder = customer_orders_model::findorfail($orderId);
            $custId = $findOrder->customer_id;
            $userid  = User::findorfail($custId);                
            $findOrder->employe_video = trim("/img/video/" . $name);
            $findOrder->video_counter='1';
            $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P4D'));
            $findOrder->video_upload_time=$dayAfterTomorrow;

            $findOrder->save();
        }
    }
    if ($findOrder) {
        $userid->notify(new videoUploaded($userid));
        return response()->json(array('message' => 'success'));
    } else {
        return response()->json(array('error' => 'Something went wrong!!'));
    }
}

public function rewiseOrderByEmp(Request $request)
{
  if ($request->isMethod('post') && $request->ajax()) {
    $posts = $request->post();
    $proOrdrid = $posts['procedOrdrId'];
    $proedOrders = customer_orders_model::where('id' ,$proOrdrid)->first();
    if($proedOrders->change_thumb == 1 && $proedOrders->change_stop_scroll == 1){
        $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P4D'));
        $proedOrders->order_assign_time=$dayAfterTomorrow;
        $proedOrders->change_thumb = 0;
        $proedOrders->change_stop_scroll = 0;
    }

    elseif($proedOrders->change_stop_scroll == 1){
        $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P4D'));
        $proedOrders->order_assign_time=$dayAfterTomorrow;
        $proedOrders->change_stop_scroll = 0;
    }
    elseif($proedOrders->change_thumb == 1){
        $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P4D'));
        $proedOrders->order_assign_time=$dayAfterTomorrow;
        $proedOrders->change_thumb = 0;
    }
    $proedOrders->save();
     // return view('employee/dashboard');
 }
 if($proedOrders){
    return response()->json(array('message' => 'success'));
 }else{
    return response()->json(array('error' => 'Something went wrong'));
 }
}
public function proceedOrderByEmp(Request $request) {
    
    if ($request->isMethod('post') && $request->ajax()) {
        $posts = $request->post();
        $proOrdrid = $posts['procedOrdrId'];
        $proedOrders = customer_orders_model::findorfail($proOrdrid);
        $custOrd = DB::table('customers')->where('user_id', $proedOrders['customer_id'])->get();
        if($custOrd[0]->subscribe_status == 1)
        {
            if($proedOrders['delivery_day'] == 1){
            $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P1D'));
            $proedOrders->order_assign_time = $dayAfterTomorrow;
        }
        elseif($proedOrders['delivery_day'] == 2)
        {
        $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P2D'));
        $proedOrders->order_assign_time = $dayAfterTomorrow;
        }
         elseif($proedOrders['delivery_day'] == 3)
        {
            $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P3D'));
            $proedOrders->order_assign_time = $dayAfterTomorrow;
         }
         elseif($proedOrders['delivery_day'] == 4)
        {
          $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P4D'));
          $proedOrders->order_assign_time = $dayAfterTomorrow;
        }
         elseif($proedOrders['delivery_day'] == 5)
        {
            $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P5D'));
            $proedOrders->order_assign_time = $dayAfterTomorrow;
        }
         elseif($proedOrders['delivery_day'] == 6)
        {
            $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P6D'));
            $proedOrders->order_assign_time = $dayAfterTomorrow;
        }
         else{
            $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P7D'));
            $proedOrders->order_assign_time = $dayAfterTomorrow;
        }
    }
      else
        {
        $tomorrow = date("l", strtotime('tomorrow'));
        $dayAftrTom = date('l', strtotime('+2 day'));        
        $dayAftrTom_1 = date('l', strtotime('+3 day')); 
        if($tomorrow == 'Saturday'){
            $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P5D'));
            $proedOrders->order_assign_time = $dayAfterTomorrow;
        }elseif( $dayAftrTom == 'Saturday' ){
           $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P5D'));
           $proedOrders->order_assign_time = $dayAfterTomorrow;
       }elseif( $dayAftrTom_1 == 'Saturday'){
           $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P5D'));
           $proedOrders->order_assign_time = $dayAfterTomorrow;
       }else{
        $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P7D'));
        $proedOrders->order_assign_time = $dayAfterTomorrow;
       }
   }
    $proedOrders->order_counter = true;
    $proedOrders->save();
  if ($proedOrders) {
    return response()->json(array('message' => 'success'));
} else {
    return response()->json(array('error' => 'Something went wrong!!'));
}
}
}
    public function showPriority() 
    {

       return view('EmployeLayout/priority');
    }
    public function showCompleted() 
    {
      return view('EmployeLayout/complited');
    }
    public function showDeliver()
     {
       return view('EmployeLayout/delivered');
    }
    public function showLate()
     {
       return view('EmployeLayout/late');
    }
    public function showSolve()
    {
        return view('EmployeLayout/solve');
    
    }

}