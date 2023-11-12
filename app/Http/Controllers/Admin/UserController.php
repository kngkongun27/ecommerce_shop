<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Ultilities\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;

class UserController extends Controller
{
    private $userService;

   public function __construct(UserServiceInterface $userService) 
   {
        $this->userService = $userService;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userService->searchAndPaginate('name', $request->get('search'));

      
        //return $users;

        return view('admin.user.index', [
            'users' => $users,
        ]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if ($request-> get('password') != $request->get('password_confirmation')) {
                return back() ->with('notification', 'Lỗi: Mật khẩu xác nhận không trùng khớp');
            }

            $data = $request->all();
            $data['password'] = bcrypt($request->get('password'));

            // Xử lý file 
            if ( $request->hasFile('image')) {
                $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');
            }

            $user = $this->userService->create($data);



            return redirect('admin/user/' .$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        // Xử lý mật khẩu
        if ($request->get('password') != null) {
            if ( $request->get('password') != $request->get('password_confirmation')) {
                return back()
                ->with('notification', 'Mật khẩu xác nhận không khớp!');
            }

            $data['password'] = bcrypt($request->get('password'));
        } else {
            unset($data['password']);
        }

        // Xử lý khi cập nhật file ảnh
        if ($request->hasFile('image')) {
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');

            // Xóa file cũ 
            $file_name_old = $request->get('image_old');
            if($file_name_old != '') {
                unlink('front/img/user/' . $file_name_old);
            }
        }
        // Update Data
        $this->userService->update($data, $user->id);

        return redirect('admin/user/' .$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user->id);

        // Delete File
        $file_name = $user->avatar;
        if( $file_name != '') {
            unlink('front/img/user' .$file_name);
        }

        return  redirect('admin/user');
    }


  
}
