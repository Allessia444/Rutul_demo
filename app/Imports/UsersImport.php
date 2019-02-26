<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use App\UserProfile;
use App\Designation;
use App\Department;
use Carbon\Carbon;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {
       if(Designation::where('name','=',$row['designation'])->count() >0)
       {
        $designation = Designation::where('name','=',$row['designation'])->first();
    }
    else
    {
        $designation = new Designation();
        $designation->name = $row['designation'];
        $designation->save();
    }

    if(Department::where('name','=',$row['department'])->count() >0)
    {
        $department = Department::where('name','=',$row['department'])->first();
    }
    else
    {
        $department = new Department();
        $department->name = $row['department'];
        $department->save();
    }

    $user = new User();
    $user->fname = $row['name'];
    $user->lname =$row['lastname'];
    $user->email = $row['email'];
    $user->designation_id = $designation->id;
    $user->department_id = $department->id;
    $user->password = Hash::make(str_random(8));
    $user->role = 'user';
    $user->save();

    return new UserProfile([
        'phone' => $row['phone'],
        'address1' => $row['address1'],
        'address2' => $row['address2'],
        'city' => $row['city'],
        'state' => $row['state'],
        'country' => $row['country'],
        'dob' => null,
        'gender' => $row['gender'],
        'management_level' => $row['managementlevel'],
        'uid' => $user->id,

    ]);
}
}
