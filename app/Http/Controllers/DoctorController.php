<?php

namespace App\Http\Controllers;

use App\Models\AvailableAppointment;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.doctors.index', ['doctors' => Doctor::with('specialty')->where('status', 1)->get()]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        // dd($request->doctor);
        $doctors = Doctor::where(function ($query) use ($request) {
            if ($request->city_id) $query->where('city_id', $request->city_id);
            if ($request->specialty_id) $query->where('specialty_id', $request->specialty_id);
            if ($request->doctor) $query->whereLike('name', "%$request->doctor%");
        })->where('status', 1)->get();
        return view('home.doctors.search', ['doctors' => $doctors]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        $appointments = AvailableAppointment::where('date', '>', date('Y-m-d h:i'))->where('doctor_id', $doctor->id)->orderBy('date')->get();
        $appt = $appointments->groupBy(function ($appt) {
            return $appt->date->format('Y-m-d'); // Group by full date
        });
        return view('home.doctors.show', ['doctor' => $doctor->with('hospital')->where('status', 1)->first(), 'appt' => $appt]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function hospital(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Store a newly created appointment range in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming request data
        $request->validate([
            'selectedDate' => 'required|date',
            'startHour' => 'required|integer|min:0|max:23',
            'endHour' => 'required|integer|min:0|max:23|gte:startHour',
        ]);

        // 2. Retrieve data from the request
        $date = $request->input('selectedDate');
        $startHour = (int) $request->input('startHour');
        $endHour = (int) $request->input('endHour');

        $records = [];

        for ($hour = $startHour; $hour <= $endHour; $hour++) {
            $appointmentDateTime = Carbon::parse($date)->hour($hour)->minute(0)->second(0);

            $records[] = [
                'date' => $appointmentDateTime,
                'doctor_id' => session()->get('doctor')->id,
                'status' => 0,
            ];
        }

        try {
            DB::table('available_appointments')->upsert($records, ['date', 'doctor_id']);
            return redirect()->back()->with('success', 'تم الحفظ بنجاح .');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء حفظ البيانات .');
        }
    }

    /**
     * show doctor dashboard
     *
     * @param Doctor $doctor
     * @return void
     */
    public function dashboard()
    {
        return view('home.doctors.dashboard', ['doctor' => session()->get('doctor')]);
    }
    /**
     * display login form view after loading the specialties
     *
     * @return void
     */
    public function login()
    {
        return view('home.doctors.login');
    }
    /**
     * check doctor cridintials and login
     *
     * @param Request $request
     * @return void
     */
    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:doctors,email',
            'password' => 'required'
        ]);
        $doctor = Doctor::where('email', $request->email)->first();
        if (Hash::check($request->password, $doctor->password)) {
            $request->session()->put('doctor', $doctor);
            return redirect()->route('doctor.dashboard');
        } else {
            return redirect()->back()->with('error', __('كلمة المرور غير صحيحة'));
        }
    }
    /**
     * logout the doctor and clear session
     */
    public function logout(Request $request)
    {
        $request->session()->forget('doctor');
        return redirect()->route('doctor.login');
    }

    /**
     * display register form view after loading the specialties
     *
     * @return void
     */
    public function register()
    {
        return view('home.doctors.register', [
            'specialties' => Specialty::where('status', 1)->get(['name', 'id']),
            'hospitals' => Hospital::where('status', 1)->get(['name', 'id']),
            'cities' => City::where('status', 1)->get(['name', 'id']),
        ]);
    }
    /**
     * create new doctor
     *
     * @param Request $request
     * @return void
     */
    public function signup(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:doctors,email',
            'password' => 'required|min:6',
            'city_id' => 'required',
            'hospital_id' => 'required',
            'specialty_id' => 'required',
            'certifications' => 'nullable'
        ]);
        $data = $request->input();
        $data['password'] = Hash::make($request->password);
        $data['status'] = 0;
        if ($request->hasfile('image')) {
            $data['image'] = 'image_' . rand(1000, 9999) . '.' . $request->file('image')->extension();
            $request->file('image')->move(storage_path() . '/app/public/images/doctors/', $data['image']);
        }
        if (Doctor::create($data)) {
            return redirect()->back()->with('success',  __('تم انشاء الحساب بنجاح'));
        } else {
            return redirect()->back()->with('error',  __('حدث خطأ ما من فضلك حاول مرة اخري'));
        }
    }


    /**
     * display appointment form view after loading the specialties
     *
     * @return void
     */
    public function appointment()
    {
        $appointments = AvailableAppointment::where('date', '>', date('Y-m-d h:i'))->where('doctor_id', session()->get('doctor')->id)->orderBy('date')->get();
        $appointmentsByDate = $appointments->groupBy(function ($appt) {
            return $appt->date->format('Y-m-d'); // Group by full date
        });
        return view('home.doctors.appointment', ['doctor' => session()->get('doctor'), 'appointments' => $appointments, 'appointmentsByDate' => $appointmentsByDate]);
    }
}
