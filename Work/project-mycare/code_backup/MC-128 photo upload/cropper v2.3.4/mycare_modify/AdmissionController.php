<?php

namespace App\Http\Controllers;

use App\Domains\MyCareTask;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Domains\Facility;
use App\Domains\HubUser;
use App\Domains\Admission;
use App\Domains\Room;
use App\Domains\Location;
use App\Domains\Inquiry;
use App\Utils\RmqHelper;
use App\Domains\Resident;

use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listing(Request $request){
        $facilityId = $request->session()->get('facility');

        // if the user is yet to select a facility, redirect to the view to select a facility
        if($facilityId == '')
            return redirect('facility/show');

        $facility = Facility::find($facilityId);

        $data = Admission::where('Facility.FacilityId', $facilityId)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admission.listing',[
            'facility' => $facility,
            'admissions' => $data
        ]);
    }

    public function add(Request $request){
        $facilityId = $request->session()->get('facility');

        // if the user is yet to select a facility, redirect to the view to select a facility
        if($facilityId == '')
            return redirect('facility/show');

        $facility = Facility::find($facilityId);

        $rooms = Room::where('FacilityID', $facility->FacilityID)
            ->orderBy('RoomName')
            ->get();

        $locations = Location::where('FacilityID', $facility->FacilityID)
            ->orderBy('LocationNameLong')
            ->get();

        // Check if there is data carried from inquiry listing view
        if($request->has("inquiryId")){
            $inquiry_detail = Inquiry::find($request->input("inquiryId"));
        }else{
            $inquiry_detail = NULL;
        }

        return view('admission.add',[
            'facility' => $facility,
            'locations' => $locations,
            'rooms' => $rooms,
            'inquiry_detail' => $inquiry_detail
        ]);
    }

    public function test_upload(Request $request){

        // Option 1 (form post): 
        $data = $request->input('croppedImage');
        $encodedData = substr($data,strpos($data,",")+1);
        $encodedData = str_replace(' ','+',$encodedData);
        $decodedData = base64_decode($encodedData);
        Storage::put('upload_xxx.jpg', $decodedData);
        return response()->json("image stored");
        // End of Option 1


        /*
        // Option 2 (ajax): 
        if ($request->hasFile('croppedImage')) {
            $path = $request->file('croppedImage')->storeAs('resident_photos', 
                    'test_upload.jpeg');
            return response()->json("image stored");
        } 
        return response()->json("image NOT stored");
        // End of Option 2 (ajax): 
        */
    }

    public function store(Request $request){

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'location' => 'required',
            'room' => 'required',
        ]);

        $locationId = Input::get('location');
        $roomId = Input::get('room');

        $location = Location::find($locationId);
        $room = Room::find($roomId);

//        Log::debug('enter store_inquiry');
        $facilityId = $request->session()->get('facility');
        $facility = Facility::find($facilityId);
//
        $user = HubUser::where('SID', Auth::user()->SID)->get()->first();

        $adm = new Admission();
        $adm->Facility = $facility->FacilityObject;
        $adm->CreatedBy = $user->UserObject;
        $adm->data = $request->all();
        $adm->status = 1;
        $adm->Location = $location->Object;
        $adm->Room = $room->Object;
        $adm->CompletionRate = 0;

        $adm->save();

        $adm->process = 'admission';
        $adm->step = 'new';

        RmqHelper::send(env('RMQ_ASSESSMENT_QUEUE'), $adm);

        // resident_photo
        if ($request->hasFile('resident_photo') and $request->file('resident_photo')->isValid()) {
            // filename = AdmissionId.extension (jpeg,png,...)
            $path = $request->file('resident_photo')->storeAs('resident_photos', 
                    'admissionId_' . (string)$adm->_id . '.' . $request->file('resident_photo')->extension());
        } 

        return redirect('admission/listing');
    }

    public function view(Request $request, $admissionId){

        $admission = Admission::find($admissionId);
        $resident = Resident::find($admission->Resident['ResidentId']);

        if($resident == null)
            return redirect('admission/listing');

        $checklists = array();
        if($admission->Checklist != null) {
            foreach ($admission->Checklist as $checklist) {
                $data = array();
                $tasks = MyCareTask::where('Checklist.ChecklistId', $checklist['ChecklistId'])->get();
                foreach ($tasks as $t) {
                    array_push($data, $t->Object);
                }
                $ret = array();
                $ret['Title'] = $checklist['Title'];
                $ret['Tasks'] = $data;
                array_push($checklists, $ret);
            }
        }
        return view('admission.view', [
                'admission' => $admission,
                'checklists' => $checklists,
                'resident' => $resident
            ]
        );
    }
}