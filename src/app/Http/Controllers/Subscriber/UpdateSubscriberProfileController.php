<?php

namespace App\Http\Controllers\Subscriber;

use App\Http\Controllers\Controller;
use App\SubscriberAbout;
use App\SubscriberEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateSubscriberProfileController extends Controller
{
    public $b_validate = [
        'educ_level_id' => 'required',
        'from_date' => 'required',
        'educ_inst_id' => 'required',
        'country_id' => 'required',
        'supporting_doc' => 'required|image|mimes:pdf|max:2048'

    ];


    public function updateAbout(Request $request)
    {
        //Do Server side validation

        $about = new SubscriberAbout();
        $about->subscriber_id = BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session());
        $about->job_title_id = $request->get('job_title_id');
        $about->about = $request->get('about');

        if ($about->save()) {
            $data = array(
                'code' => 200,
                'status' => 'success',
                'message' => 'About Successfully saved',
            );
        } else {
            $data = array(
                'code' => 402,
                'status' => 'failed',
                'message' => 'Oops! Something went wrong',
            );
        }

        return response()->json($data, $data['code']);
    }

    public function editCV()
    {
        return view('subscriber.pages.profile.edit');
    }

    public function editEducation1(Request $request)
    {

    }

    public function editEducation(Request $request)
    {

        $validatedData = $request->validate($this->b_validate);

        $doc_name = time().'.'.request()->supporting_doc->getClientOriginalExtension();
        request()->supporting_doc->move(storage_path('app/public/images'), $doc_name);

        $education = new SubscriberEducation();
        $education->level_id = $request->educ_level_id;
        $education->from_date = $request->educ_level_id;
        $education->institution_id = $request->educ_level_id;
        $education->country_id = 82;
        $education->supporting_doc = $doc_name;

        //return $request;

        if(!$education->save()){
            alert()->warning('Educational Detail Failed', 'New Record Creation Failed!');
            return redirect()->back();
        }

        alert()->info('Educational Detail Added', 'New Record Created!');
        return redirect()->back();
    }

    public function saveEduc(Request $request)
    {
        $photos = [];
        foreach ($request->photos as $photo) {
            $filename = $photo->store('photos');
            $education_photo = SubscriberEducation::create([
                'supporting_doc' => $filename,
                'level_id' => $request->level_id,
                'from_date' => $request->from_date,
                'date_date' => $request->date_date,
                'institution_id' => $request->institution_id,
                'country_id' => $request->country_id,
            ]);

            $photo_object = new \stdClass();
            $photo_object->name = str_replace('photos/', '', $photo->getClientOriginalName());
            $photo_object->size = round(Storage::size($filename) / 1024, 2);
            $photo_object->fileID = $education_photo->id;
            $photos[] = $photo_object;
        }

        return redirect()->back()->with('success','Educational history saved!');

       // return response()->json(array('files' => $photos), 200);
    }

    public function editWorkExperience()
    {
        return view('subscriber.pages.profile.edit');
    }

    public function editWorkSkill()
    {
        return view('subscriber.pages.profile.edit');
    }
}
