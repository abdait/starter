<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Phone;
use App\Models\Service;
use Illuminate\Http\Request;

use App\Models\User;

class RelationController extends Controller
{
    public function has_one(){
        $user = User::where('id',4)->with('phone')->first();

       return response()->json($user);
    }

    public function has_one_revers(){
        $phone = Phone::where('id',1)->with('user')->first();

       return response()->json($phone);
    }

    public function hospital_has_many(){
        $hospital = Hospital::where('id',1)->with('doctor')->get();

       return response()->json($hospital);
    }

    public function hospital_list(){
        $hospital = Hospital::with('doctor')->get();

        return view ('hospitals.hospital')->with('hospitals', $hospital) ;
    }

    public function doctors_list($hospital_id){


        $hospitals = Hospital::where('id',$hospital_id)->with('doctor')->get();

        $doctors = $hospitals[0]->doctor; ;

       return view ('hospitals.doctor')->with('doctors', $doctors) ;
    }


    public function DoctorService(){


        return $doctor = Doctor::with('service')->find(3);

       // return $doctor->service;

    }

    public function list_DoctorService($doctor_id){


        $doctor = Doctor::where('id',$doctor_id)->with('service')->get();

        $service = $doctor[0]->service ;


        $doctors = Doctor::select('id','name')->get();
        $services = Service::select('id','name')->get();

       return view ('hospitals.service')->with('services', $service)->with('doctors', $doctors)->with('servicess', $services) ;
    }

    public function doctor_to_services(Request $request){


        $doctor = Doctor::find($request->doctor_id);
// attach                    //sync
        $doctor->service()->syncWithoutDetaching ($request->service_id);

        return 'success';

    }

}
