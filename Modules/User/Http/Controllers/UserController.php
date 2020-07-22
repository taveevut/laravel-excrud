<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['body'] = [
            'title'     => 'Dashboard',
            'name'      => 'dasboard',
            'app_title' => [
                'h1' => 'Dashboard',
                'p'  => 'ภาพรวมของระบบ'
            ]
        ];
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = $this->data;

        return view('user::dashboard', $data);
    }

}
