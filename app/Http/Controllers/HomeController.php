<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;

class HomeController extends Controller
{
   

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/


public function create()
{
//
}

/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function getAllEmployees()
{
    $employees = DB::table('employees')->get();
    return view('list_employees',compact('employees'));
}

public function postAddtime(Request $request)
{
    $this->validate($request, [
        'monday_start_time' => 'required',
        'monday_end_time' => 'required',
        'tuesday_start_time' => 'required',
        'tuesday_end_time' =>'required',
        'wednesday_start_time' => 'required',
        'wednesday_end_time' => 'required',
        'thursday_start_time' => 'required',
        'thursday_end_time' => 'required',
        'friday_start_time' => 'required',
        'friday_end_time' => 'required',
        'saturday_start_time' => 'required',
        'saturday_end_time' => 'required',
        ]);
        
        DB::table('times')->update([                       
        'monday_start_time' => $request->monday_start_time,
        'monday_end_time' => $request->monday_end_time,
        'tuesday_start_time' => $request->tuesday_start_time,
        'tuesday_end_time' =>$request->tuesday_end_time,
        'wednesday_start_time' => $request->wednesday_start_time,
        'wednesday_end_time' => $request->wednesday_end_time,
        'thursday_start_time' => $request->thursday_start_time,
        'thursday_end_time' => $request->thursday_end_time,
        'friday_start_time' => $request->friday_start_time,
        'friday_end_time' => $request->friday_end_time,
        'saturday_start_time' => $request->saturday_start_time,
        'saturday_end_time' => $request->saturday_end_time,
    
        ]);     
        
        
    
        return redirect()->back()->with('info', 'You have Added time Successfully!');
}


public function postAddEmployee(Request $request)
{
   
    

    $this->validate($request, [
        'surname' => 'required',
        'name' => 'required',
        'address' => 'required',
        'province' => 'required',
        'mobile' =>'required|integer|min:12',
        'email' => 'required|unique:employees',
        'account_number' => 'required|unique:employees',
        'account_type' => 'required',
        'bank' => 'required',
        'emergency_number' => 'digits_between:7,12|required',        
    ]);

        // dd($request->emergency_number);
    DB::table('employees')->insert([                       
        'surname' => $request->surname,
        'name' => $request->name,
        'address' => $request->address,
        'province' => $request->province,
        'mobile' => $request->mobile,
        'email' => $request->email,
        'account_number' => $request->account_number,
        'account_type' => $request->account_type,
        'bank' => $request->bank,
        'emergency_number' => $request->emergency_number,

    ]);       

    return redirect()->back()->with('info', 'You have Added User Successfully!');
}


public function add_user(Request $request)
{

    

    $this->validate($request, [
        'username' => 'required|unique:users',
        'password' => 'min:6|required_with:confirm_password|same:confirm_password',
        'confirm_password' => 'min:6'
    ]);


    DB::table('users')->insert([                       
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'new_employee' => $request->has('new_employee')?1:0,
        'list_employees' => $request->has('list_employees')?1:0,
        'history_employees' => $request->has('history_employees')?1:0,
        'project_list' => $request->has('project_list')?1:0,
        'production' => $request->has('production')?1:0,
        'dedicated_time' => $request->has('dedicated_time')?1:0,
        'create_tool' => $request->has('create_tool')?1:0,
        'list_tools' => $request->has('list_tools')?1:0,
        'history_tools' => $request->has('history_tools')?1:0,
        'create_state' => $request->has('create_state')?1:0,
    ]);       

    return redirect()->back()->with('info', 'You have Added User Successfully!');
}

public function edit_user($id){
    $edit_user = DB::table('users')->where('id',$id)->first();
    return view('editpage',compact("edit_user"));
}
public function edit_employee($id){
    $edit_employee = DB::table('employees')->where('id',$id)->first();
    return view('editemppage',compact("edit_employee"));
    dd($edit_employee);
    
}
 
public function update(Request $request)
    { 
        $this->validate(request(), [
            'username' => 'required',   
        ]);
       
        DB::table('users')->where('id',$request->id)->update([
            'username' => $request->username,
            'new_employee' => $request->has('new_employee')?1:0,
            'list_employees' => $request->has('list_employees')?1:0,
            'history_employees' => $request->has('history_employees')?1:0,
            'project_list' => $request->has('project_list')?1:0,
            'production' => $request->has('production')?1:0,
            'dedicated_time' => $request->has('dedicated_time')?1:0,
            'create_tool' => $request->has('create_tool')?1:0,
            'list_tools' => $request->has('list_tools')?1:0,
            'history_tools' => $request->has('history_tools')?1:0,
            'create_state' => $request->has('create_state')?1:0,
        ]);
        return redirect('user')->with('info', 'You have Edited User Successfully!');
    }
    public function update_employee(Request $request)
    { 
        
        DB::table('employees')->where('id',$request->id)->update([
            'surnames' => $request->surnames,
            'name' => $request->name,
            'direction' => $request->direction,
            'province' => $request->province,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'account_number' => $request->account_number,
            'account_type' => $request->account_type,
            'bank' => $request->bank,
            'emergency_number' => $request->emergency_number,
        ]);
        return redirect('user')->with('info', 'You have Edited User Successfully!');
    }
   

    public function delete_user($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('info', 'You have Deleted User Successfully!');
    }
    public function delete_employee($id){
        DB::table('employees')->where('id',$id)->delete();
        return redirect()->back()->with('info', 'You have Deleted User Successfully!');
    }

    public function gettest()
    {
        $view_users = DB::table('users')->where('username','!=', 'admin')->get();
        return view('users',compact("view_users"));
    }

/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/


/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
   

/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/


/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

///////////////////////////////////////////////////////
///////////////////    IP METHODS   ///////////////////
///////////////////////////////////////////////////////
    public function getIP()
    {
        $opt['opt'] = 'add-ip';
        return view('ip')->with($opt);
    }
    public function getHome()
    {
        $opt['opt'] = '';
        return view('cdn-ip');
    }

    public function postIP(Request $request)
    {
        $this->validate($request, [
            'ip' => 'required'
        ]);

        DB::table('ips')->insert([
            'ip' => $request['ip'],
        ]);

        $fixed = DB::table('fixed_fields')->get()->first();
        $strms = DB::table('strms')->get();

        foreach($strms as $strm)
        {
            DB::table('streams')->insert([
                'dest_port' => $fixed->dest_port,
                'auth_schema' => $fixed->auth_schema,
                'paused' => $fixed->paused,
                'ssl' => $fixed->ssl,
                'keep_src_stream_params' => $fixed->keep_src_stream_params,
                'src_app' => $fixed->src_app,
                'src_strm' => $strm->strm,
                'dest_addr' => $request['ip'],
                'dest_app' => $fixed->dest_app,
                'dest_strm' => $strm->strm,
                'dest_app_params' => $fixed->dest_app_params,
                'dest_stream_params' => $fixed->dest_stream_params,
                'dest_login' => $fixed->dest_login,
                'dest_password' => $fixed->dest_password,
                'description' => $fixed->description,
                'protocol' => $fixed->protocol,
            ]);
        }

        return redirect()->back()->with('info', 'New IP Added Successfully');
    }

    public function getUpdateIP()
    {
        $ips['ips'] = DB::table('ips')->get();
        $opt['opt'] = 'update-ip';
        return view('update-ip')->with($opt)->with($ips);
    }

    public function postUpdateIP(Request $request)
    {
        $ips = DB::table('ips')->get();
        foreach($ips as $ip)
        {
            $index = $ip->id;
            if ($ip->ip != $request[$ip->id])
            {
                DB::table('streams')->where('dest_addr', $ip->ip)->update([
                    'dest_addr' => $request[$index],
                ]);
                DB::table('ips')->where('ip', $ip->ip)->update([
                    'ip' => $request[$index],
                ]);
            }
        }

        return redirect()->back()->with('info', 'IP Updated Successfully');
    }

    public function getDeleteIP($id)
    {
        DB::table('streams')->where('dest_addr', $id)->delete();
        DB::table('ips')->where('ip', $id)->delete();
        return redirect()->back()->with('info', "IP deleted Successfully");
    }
///////////////////////////////////////////////////////
///////////////////    STRM METHODS   ///////////////////
///////////////////////////////////////////////////////
    public function getSTRM()
    {
        $opt['opt'] = 'add-strm';
        return view('strm')->with($opt);
    }

    public function postSTRM(Request $request)
    {
        $this->validate($request, [
            'strm' => 'required'
        ]);

        DB::table('strms')->insert([
            'strm' => $request['strm'],
        ]);

        $fixed = DB::table('fixed_fields')->get()->first();
        $ips = DB::table('ips')->get();

        foreach($ips as $ip)
        {
            DB::table('streams')->insert([
                'dest_port' => $fixed->dest_port,
                'auth_schema' => $fixed->auth_schema,
                'paused' => $fixed->paused,
                'ssl' => $fixed->ssl,
                'keep_src_stream_params' => $fixed->keep_src_stream_params,
                'src_app' => $fixed->src_app,
                'src_strm' => $request['strm'],
                'dest_addr' => $ip->ip,
                'dest_app' => $fixed->dest_app,
                'dest_strm' => $request['strm'],
                'dest_app_params' => $fixed->dest_app_params,
                'dest_stream_params' => $fixed->dest_stream_params,
                'dest_login' => $fixed->dest_login,
                'dest_password' => $fixed->dest_password,
                'description' => $fixed->description,
                'protocol' => $fixed->protocol,
            ]);
        }

        return redirect()->back()->with('info', 'New STRM Added Successfully');
    }

    public function getUpdateSTRM()
    {
        $strms['strms'] = DB::table('strms')->get();
        $opt['opt'] = 'update-strm';
        return view('update-strm')->with($opt)->with($strms);
    }

    public function postUpdateSTRM(Request $request)
    {
        $strms = DB::table('strms')->get();
        foreach($strms as $strm)
        {
            $index = $strm->id;
            if ($strm->strm != $request[$strm->id])
            {
                DB::table('streams')->where('src_strm', $strm->strm)->update([
                    'src_strm' => $request[$index],
                    'dest_strm' => $request[$index],
                ]);
                DB::table('strms')->where('strm', $strm->strm)->update([
                    'strm' => $request[$index],
                ]);
            }
        }

        return redirect()->back()->with('info', 'STRM Updated Successfully');
    }

    public function getDeleteSTRM($id)
    {
        DB::table('streams')->where('dest_strm', $id)->delete();
        DB::table('strms')->where('strm', $id)->delete();
        return redirect()->back()->with('info', "STRM deleted Successfully");
    }
///////////////////////////////////////////////////////
///////////////////      OUTPUT     ///////////////////
///////////////////////////////////////////////////////
    public function getFixed()
    {
        $fixed['fixed'] = DB::table('fixed_fields')->get()->first();
        $opt['opt'] = 'fixed';
        return view('fixed')->with($opt)->with($fixed);
    }

    public function postFixed(Request $request)
    {
        DB::table('fixed_fields')->where('id', '1')->update([
            'dest_port' => $request->dest_port,
            'auth_schema' => $request->auth_schema,
            'paused' => $request->paused,
            'ssl' => $request->ssl,
            'keep_src_stream_params' => $request->keep_src_stream_params,
            'src_app' => $request->src_app,
            'dest_app' => $request->dest_app,
            'dest_app_params' => $request->dest_app_params,
            'dest_stream_params' => $request->dest_stream_params,
            'dest_login' => $request->dest_login,
            'dest_password' => $request->dest_password,
            'description' => $request->description,
            'protocol' => $request->protocol,
        ]);

        $streams = DB::table('streams')->get();

        foreach ($streams as $stream)
        {
            DB::table('streams')->where('id', $stream->id)->update([
                'dest_port' => $request->dest_port,
                'auth_schema' => $request->auth_schema,
                'paused' => $request->paused,
                'ssl' => $request->ssl,
                'keep_src_stream_params' => $request->keep_src_stream_params,
                'src_app' => $request->src_app,
                'dest_app' => $request->dest_app,
                'dest_app_params' => $request->dest_app_params,
                'dest_stream_params' => $request->dest_stream_params,
                'dest_login' => $request->dest_login,
                'dest_password' => $request->dest_password,
                'description' => $request->description,
                'protocol' => $request->protocol,
            ]);
        }

        return redirect()->back()->with('info', 'Fixed Fields Updated');
    }

    public function getCopyCode()
    {
        $streams['streams'] = DB::table('streams')
            ->get( ['dest_port','auth_schema','paused','ssl','keep_src_stream_params','src_app','src_strm',
                'dest_addr','dest_app','dest_strm','dest_app_params','dest_stream_params','dest_login','dest_password',
                'description','protocol']);
        $opt['opt'] = 'copy-code';
        return view('code')->with($opt)->with($streams);
    }
///////////////////////////////////////////////////////
/////////////////      PASSWORD     ///////////////////
///////////////////////////////////////////////////////
    public function getChangePassword()
    {
        $opt['opt'] = 'password';
        return view('password')->with($opt);
    }

    public function postChangePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'confirm_password' => 'required | same:password',
        ]);

        DB::table('users')->where('id', Auth::user()->id)->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('info', 'Password Changed Successfully');
    }
///////////////////////////////////////////////////////
////////////////    CDN IP METHODS   //////////////////
///////////////////////////////////////////////////////
    public function getCDNIP()
    {
        $opt['opt'] = 'add-cdn-ip';
        return view('cdn-ip')->with($opt);
    }

    public function postCDNIP(Request $request)
    {
        $this->validate($request, [
            'cdn_ip' => 'required'
        ]);

        DB::table('cdn_ips')->insert([
            'cdn_ip' => $request['cdn_ip'],
        ]);

        return redirect()->back()->with('info', 'New CDN IP Added Successfully');
    }

    public function getEditCDNIP()
    {
        $ips['ips'] = DB::table('cdn_ips')->get();
        $opt['opt'] = 'edit-cdn-ip';
        return view('edit-cdn-ip')->with($opt)->with($ips);
    }

    public function postEditCDNIP(Request $request)
    {
        $ips = DB::table('cdn_ips')->get();
        foreach($ips as $ip)
        {
            $index = $ip->id;
            if ($ip->cdn_ip != $request[$ip->id])
            {
                DB::table('cdn_ips')->where('cdn_ip', $ip->cdn_ip)->update([
                    'cdn_ip' => $request[$index],
                ]);
            }
        }

        return redirect()->back()->with('info', 'CDN IP Updated Successfully');
    }

    public function getDeleteCDNIP($id)
    {
        DB::table('cdn_ips')->where('id', $id)->delete();
        return redirect()->back()->with('info', 'CDN IP Deleted Successfully');
    }

    public function getPublish()
    {
        $opt['opt'] = 'publish';
        $ips['ips'] = DB::table('cdn_ips')->get();
        return view('publish')->with($opt)->with($ips);
    }

    public function postPublish(Request $request)
    {
        Storage::disk('public')->put('ipcall.php', '<?php ' . $request['content']);
        return redirect()->back()->with('info', 'File Published Successfully');
    }

}
