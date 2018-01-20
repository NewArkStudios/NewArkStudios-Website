<?php

namespace App\Http\Controllers;


use App\Models\Announcement;
use App\User;
use App\Models\Roles;
use App\Models\User_Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{


    /**
    * Display the admin panel, containing special 
    * stuff the admin can do
    */
    public function display_admin_panel() {
        return view('pages.admin_panel');
    }

    public function display_edit_announcement($id) {
        $announcement = Announcement::where('id', $id)->first();
        return view('pages.admin_panel', compact('announcement'));
    }

    // Make annoucement and update database
    public function make_announcement(Request $request) {

        // make announcement
        // note we dont sanitize because ADMINS
        // are trusted with injections including javascript
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'required|image',
            'body' => 'required'
        ]);

        // check if image is valid
        $thumbnail = $request->file('thumbnail');

        if (!($thumbnail->isValid())) {
            return back()->withErrors(
                [
                    "thumbnail" => "There was an error in uploading your image"
                ]
            );
        }

        // store image
        $path = Storage::disk('imageUploads')->putFile('announcements', $request->file('thumbnail') );
        //$path = $request->file('thumbnail')->store('/public/img/announcements');

        $annoucement = new Announcement();
        $annoucement->body = $request['body'];
        $annoucement->title = $request['title'];
        $annoucement->thumbnail = $path;
        $annoucement->save();

        return redirect('/announcements');
    }

    /**
    * Edit existing announcement
    * @param request - request object 
    * id - integer,  announcement id 
    * body - text, edited announcement
    */
    public function edit_announcement(Request $request) {
    
         $announcement = Announcement::where('id', $request['id'])->first();
         $announcement->body = $request['body'];
         $announcement->save();

         return redirect('/announcements');
    }

    /**
    * Get all moderators listed within the database
    */
    public function get_moderators() {

        // get all users who have moderator role
        // https://stackoverflow.com/questions/22487324/get-all-users-with-role-in-laravel
        // https://laravel.com/docs/5.4/eloquent-relationships
        $moderators = User::whereHas(
            'roles', function($q){
                $q->where('name', 'moderator');
            }
        )->get();

        return $moderators;
    }

    /**
    * Delete moderator
    */
    public function delete_moderator(Request $request) {
        
        // code for deleting moderator
        $mod_id = (int)$request['mod_id'];

        $mod_num = Roles::where('name', "moderator")->first()->id;
        $user = User::where('id', $mod_id)->first();

        // https://stackoverflow.com/questions/27330551/laravel-eloquent-orm-many-to-many-delete-pivot-table-values-left-over
        $user->roles()->detach($mod_num);

        return [
            'success' => true
        ];
    }

    /**
    * Make moderator from webpage
    * make sure validation occurs on server side for admin
    * middleware already set that admin must be used to access this route
    */
    public function make_moderator(Request $request) {

        $user = User::where('id', $request['user_id'])->first();
        $success = self::make_role($user, "moderator");

        if ($success)
            return redirect()->back();
        else
            return "error in the admin matrix";// redirect to error
            
    }

    /**
    * Add new role for user
    * @param user, User model object which is the user we will be modifying
    * @param role, String containing the role that we are defining
    */
    public function make_role(User $user, $role){

        $user_id = $user->id;
        $role_id = Roles::where('name', $role)->first()->id;

        $user_role = new User_Roles();
        $user_role->user_id = $user_id;
        $user_role->role_id = $role_id;
        $user_role->save();

        return true;
    }
}
