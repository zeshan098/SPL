<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $data['tasks'] = [
                [
                        'name' => 'Design New Dashboard',
                        'progress' => '87',
                        'color' => 'danger'
                ],
                [
                        'name' => 'Create Home Page',
                        'progress' => '76',
                        'color' => 'warning'
                ],
                [
                        'name' => 'Some Other Task',
                        'progress' => '32',
                        'color' => 'success'
                ],
                [
                        'name' => 'Start Building Website',
                        'progress' => '56',
                        'color' => 'info'
                ],
                [
                        'name' => 'Develop an Awesome Algorithm',
                        'progress' => '10',
                        'color' => 'success'
                ]
        ];
        $data['page_title'] = "Dashboard";
        $data['page_description'] = "Welcome to Admin Dashboard";
        return view('admin.index')->with($data);
    }
    
    public function users(){
        $data["users"] = array();
        $data['page_title'] = "Users List";
        $data['page_description'] = "Users List";
        return view('admin.users')->with($data);
    }
    
    public function add_user_view(){
        $data["users"] = array();
        $data['page_title'] = "Add User";
        $data['page_description'] = "Add User";
        return view('admin.add_user')->with($data);
    }
    
    public function add_user_post(Request $request){
        dd($request);
        $data["users"] = array();
        $data['page_title'] = "Add User";
        $data['page_description'] = "Add User";
        return view('admin.add_user')->with($data);
    }
}
