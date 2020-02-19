<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPhoto\DestroyUserPhotoRequest;
use App\Http\Requests\UserPhoto\UpdateUserPhotoRequest;
use App\User;
use Illuminate\Http\Request;

class UserPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return currentUser()->photo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user->photo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserPhoto\UpdateUserPhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPhotoRequest $request)
    {
        $request->persist();

        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\UserPhoto\DestroyUserPhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyUserPhotoRequest $request)
    {
        $user = $request->persist();

        return redirect()->route('users.edit', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCurrentUserPhoto(UpdateUserPhotoRequest $request)
    {
        $request->persist();

        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\UserPhoto\DestroyUserPhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyCurrentUserPhoto(DestroyUserPhotoRequest $request)
    {
        $request->persist();

        return response()->json([]);
    }
}
