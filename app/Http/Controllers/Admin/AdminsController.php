<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;
use App\Repositories\AdminTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminsController extends Controller
{
    //
    protected $adminRepository;

    protected $adminTypeRepository;

    public function __construct(AdminRepository $adminRepository, AdminTypeRepository $adminTypeRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->adminTypeRepository = $adminTypeRepository;
    }

    public function postAdmin(Request $request){

        $data = $request->all();

        $rules = [
            'username' => 'bail|max:15|unique:admin,username',
            'email' => 'bail|email|unique:admin,email'
        ];

        $messages = [
            'max' => 'Username must be less than 15 characters!',
            'email' => 'Email is invalid!',
            'username.unique' => 'This username has already exists',
            'email.unique' => 'This email has already exists',
        ];

        $request->validate($rules, $messages);

        try{

            DB::beginTransaction();

            $admin = $this->adminRepository->create($data);

            $this->adminTypeRepository->create(['admin_id' => $admin->id]);

            DB::commit();

            return redirect()->back()->with('success', 'Successfully Add New Admin!');

        }catch(\Exception $e){

            DB::rollBack();

            return redirect()->back()->with('error', 'Something went wrong!');
        }

        // return redirect()->back();
    }

    public function getAdmin(){

        $allAdmins = $this->adminRepository->get();
        Alert::error('Add New Admin', 'Something went wrong!');
        // dd($data);

        $admin_id = Auth::guard('admins')->user()->id;

        $admin = $this->adminRepository->getById($admin_id);

        return view('admin.admins.admins', ['data' => $allAdmins, 'admin' => $admin]);
    }
}
