<?php

namespace App\Http\Controllers;

use App\Group;

class GroupController extends Controller
{
    public function index()
    {
        return Group::all();
    }

    public function show(Group $group)
    {
        return $group;
    }
}
