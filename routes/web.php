<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('guest')->group(function ()
{
    Route::get('/', '\App\Http\Controllers\UserController@getLogin');
    Route::get('/login', '\App\Http\Controllers\UserController@getLogin')
        ->name('login');
    Route::post('/login', '\App\Http\Controllers\UserController@postLogin');
});

Route::middleware('auth:web')->group(function ()
{

    // Route::get('/home', '\App\Http\Controllers\HomeController@getHome');
    Route::get('/user', '\App\Http\Controllers\HomeController@gettest');
    Route::post('/add_user', '\App\Http\Controllers\HomeController@add_user');
    Route::get('delete_user/{id}', '\App\Http\Controllers\HomeController@delete_user');
    Route::get('edit_user/{id}', '\App\Http\Controllers\HomeController@edit_user');
    Route::post('/save_changes', '\App\Http\Controllers\HomeController@update');

    Route::get('/home', function ()
    {
        $times = DB::table('times')->first();
        return view('home', compact('times'));
    });
    Route::get('/profile/{id}', function ($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        return view('profile', compact('employee'));
    });
    Route::get('/project_list', function ()
    {
        
        return view('project_list');
    });
    Route::get('/production', function ()
    {
        return view('production');
    });
    Route::get('/dedicated_time', function ()
    {
        return view('dedicated_time');
    });
    Route::get('/history_employees', function ()
    {
        return view('history_employees');
    });
    Route::get('/new_employee', function ()
    {
        return view('new_employee');
    });
    Route::get('/create_state', function ()
    {
        return view('create_state');
    });
    Route::get('/list_tools', function ()
    {
        return view('list_tools');
    });
    Route::get('/list_employees', '\App\Http\Controllers\HomeController@getAllEmployees');

    Route::get('/create_tool', function ()
    {
        return view('create_tool');
    });
    Route::get('/create_project', function ()
    {
        $tasks = DB::table('tasks_and_subtasks')->get();

        return view('create_project', compact('tasks'));
    });
    Route::post('/create_project', '\App\Http\Controllers\HomeController@postAddProject');

    Route::get('/view_project', function ()
    {

        $projects = DB::table('projects')->orderby('id', 'desc')
            ->get();
        $tasks = DB::table('tasks')->get();

        return view('project_list', compact('projects','tasks'));
    });
    Route::get('/search_project', function ()
    {

        $projects = DB::table('projects')->orderby('id', 'desc')
            ->get();

        return view('search_project', compact("projects"));
    });
    Route::post('/search_project', '\App\Http\Controllers\HomeController@SearchProject');
    Route::post('/search', '\App\Http\Controllers\HomeController@Search');


    Route::post('/change_status', '\App\Http\Controllers\HomeController@postchangeStatus');

    Route::get('/assign_task', function ()
    {
        return view('assign_task');
    });
    Route::post('/assign_task', '\App\Http\Controllers\HomeController@postAssignTask');

    Route::get('/tasks-subtasks', function ()
    {
        $tasks = DB::table('tasks_and_subtasks')->where('parent_id', 0)
            ->get();

        return view('create_tasks_and_subtasks', compact('tasks'));
    });
    Route::post('/create_task', '\App\Http\Controllers\HomeController@postCreateTask');
    Route::post('/create_subtask', '\App\Http\Controllers\HomeController@postCreateSubTask');
    Route::get('/schedule-task-subtask', function ()
    {
        $tasks = DB::table('tasks')->orderBy('id', 'DESC')
            ->get();

        $subtasks = DB::table('sub_tasks')->orderBy('id', 'DESC')
            ->get();
        return view('schedule_tasks_subtasks', compact('tasks', 'subtasks'));
    });
    Route::get('/add-materials', function ()
    {
        return view('create_materials');
    });

    Route::get('/view-materials', function ()
    {
        $materials = DB::table('materials')->orderBy('id', 'DESC')
            ->get();
        return view('view_materials', compact('materials'));
    });

    Route::get('/delete/{id}', function ($id)
    {

        DB::table('materials')->where('id', $id)->delete();
        return redirect()
            ->back()
            ->with('info', 'You have Deleted Successfully!');
    });

    Route::get('/register-materials', function ()
    {

        return view('register_materials');
    });
    Route::post('/register_material', '\App\Http\Controllers\HomeController@postRegisterMaterials');

    Route::post('/create_material', '\App\Http\Controllers\HomeController@postAddMaterials');

    Route::get('/password', '\App\Http\Controllers\HomeController@getChangePassword');
    Route::post('/password', '\App\Http\Controllers\HomeController@postChangePassword');

    Route::post('/add_emloyee', '\App\Http\Controllers\HomeController@postAddEmployee');
    Route::post('/add_time', '\App\Http\Controllers\HomeController@postAddtime');

    Route::get('/logout', '\App\Http\Controllers\UserController@getLogout');

    Route::post('/change_actual_cost', function (Request $request)
    {
        DB::table('projects')->where('id', $request->id)
            ->update(['actual_cost' => $request->actual_cost, ]);

        return redirect()
            ->back()
            ->with('info', 'Successfully Updated');
    });

    Route::post('/change_current_status', function (Request $request)
    {
        DB::table('projects')->where('id', $request->id)
            ->update(['current_task' => $request->current_task, ]);

        return redirect()
            ->back()
            ->with('info', 'Successfully Updated');
    });

    Route::post('/change_degree_of_progree', function (Request $request)
    {

        if ($request->degree_of_progress > 100 || $request->degree_of_progress < 0)
        {
            return redirect()
                ->back()
                ->with('alert', 'Degree of Progress must be percentage');
        }

        DB::table('projects')
            ->where('id', $request->id)
            ->update(['degree_of_progress' => $request->degree_of_progress, ]);

        return redirect()
            ->back()
            ->with('info', 'Successfully Updated');
    });

    Route::get('/daily_worker_performance', '\App\Http\Controllers\HomeController@daily_worker_performance');
    Route::post('/daily_worker_performance', '\App\Http\Controllers\HomeController@post_daily_worker_performance');
    Route::get('/work-performance', function ()
    {
        return view('performance_of_work');
    });

    







    Route::post('test', function(Request $request)
    {
        $employee =  DB::Table('employees')->where('name',$request->name)->first();

        $assignment = DB::Table('assignments')->where('employee_id_1',$employee->id)->first();

        $project = DB::Table('projects')->where('id',$assignment->project_id)->first();

        
             return "<option>{$project->project}</option>";
            // return response()->json(['success'=>'Data saved','result'=>$request->file]);
        
    });



});

