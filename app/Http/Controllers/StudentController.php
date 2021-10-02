<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Models\Group;
use App\Http\Models\Message;
use App\Http\Models\Appointment;
use App\Http\Models\Homework;
use App\Http\Models\Book;
use App\Http\Models\Joins;
use App\Http\Models\Joinbooking;
use App\User;

use Illuminate\Support\Facades\View;


class StudentController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');

    }
    */
    public function countMessage()
    {
        $userId = Auth::user()->id;
        $myMessageCount = Message::where('to', '=', $userId)->count();
        View::share('myMessageCount', $myMessageCount);
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $groupId = Auth::user()->group_id;
            $programData = Group::getGroupDataByUserID($groupId);
            return view('/student/student', compact('programData'));
        } else {

            return view('/layouts/404');
        }

    }

    /*
    * Student info show Action
    * @param : no
    * @return: check login and return logined user's info
    */
    public function studentInfoShow()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $userId = Auth::id();
            $user = new User();
            $studentInfo = $user->getUserInfoById($userId);
            return view('/student/studentinfoshow', compact('studentInfo'));
        } else {

            return view('/layouts/404');
        }

    }

    /*
    * Student info update Action
    * @param Posted user Data
    * @return: success or error
    */
    public function studentInfoUpdate(Request $request)
    {
		 
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
		
		
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $userId = Auth::id();
            $user = User::find($userId);
            if ($request->get('newpass') && $request->get('renewpass')) {
                if ($request->get('newpass') == $request->get('renewpass')) {
                    $user->password = bcrypt($request->get('newpass'));
                } else {
                    $error = "New Password must be same Re-Enter Password!";
                    return Redirect::back()->withErrors($error);

                }
            }

            $user->firstname = $request->get('first_name1');
            $user->lastname = $request->get('last_name1');
            $user->name = $request->get('username');
            $user->email = $request->get('email1');
            $user->gender = $request->get('gender');
            $user->language = $request->get('language');
            $user->age = $request->get('age1');
            $user->country = $request->get('country1');
            $user->phone = $request->get('phone1');
            $user->skype = $request->get('skype1');
            $user->status = $request->get('user-status1');
            $user->notes = $request->get('notes1');
            $user->group_id = $request->get('gender');

            $user->whatsapp = $request->get('cwhatsapp');
            $user->soma = $request->get('csoma');
            $user->line = $request->get('cline');
            $user->viber = $request->get('cviber');

            $user->save();
            //return redirect('student/student-info-show');
            return Redirect::back()->withErrors(['Succsssfully Updated!']);
        } else {

            return view('/layouts/404');
        }

    }


    /*
    * Student info show Action
    * @param : no
    * @return: check login and return logined user's info
    */
    public function instructorsShow()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $groupId = Auth::user()->group_id;
            $instructorAppointData = Group:: getInstructorAndAppointDataByGroupId($groupId);

            return view('/student/instructorsshow', compact('instructorAppointData'));
        } else {

            return view('/layouts/404');
        }

    }

    /**************** Appointment Action *************/

    /*
    * appointment Action
    * @param : id- instructor id
    * @return: check login and return available appoint
    */
    public function appointments($id)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $avaliableappointments = Appointment::getAppointmentByInstructorId($id, 10);

            $instructorInfo = Group::getInstructorInfo($id);
            return view('/student/appointments', compact('instructorInfo', 'avaliableappointments'));
        } else {

            return view('/layouts/404');
        }


    }

    /*
    * appointment join Action
    * @param : id- instructor id
    * @return: check login and register join and return status(seccess or error)
    */
    public function appointmentBooking(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
			
			$appointment  = Appointment::find($request->appointmentId);
			if(!isset($appointment))
				 return view('/layouts/404');
			 
			
            $this->countMessage();
            $userId = Auth::id();
            $joinStatus = Book::checkBookingStatusByUserid($userId);
            if ($joinStatus != 0) {
                return Redirect::back()->withErrors(['It is NOT allowed to reserve an appointment untill attend the current reserved or cancel it. ']);
                exit;
            }
            $book = new Book();
            $book->appointment_id = $request->appointmentId;
            $book->student_id = $userId;
            $book->status = 0;
            $book->save();
			
			$appointment  = Appointment::find($book->appointment_id);
			$appointment->status = 1;
			$appointment->save();
			

            return redirect('/student/appointments-history')->withErrors('Joined');
        } else {

            return view('/layouts/404');
        }


    }

    /*
    * appointment cancel Action
    * @param : id- instructor id
    * @return: check login and return available appoint
    */
    public function appointmentCancel(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $bookedId = $request->bookId;
            $book = Book::find($bookedId);
            $book->notes = $request->reason;
            $book->status = 2;
            $book->save();
    
			
		     
            $joinbook = Joinbooking::where('book_id', '=', $bookedId)->update(['jstatus' => 1]);


            return Redirect::back()->withErrors(['The appointment has been Cancelled successfully.']);
        } else {

            return view('/layouts/404');
        }


    }

    /*
    * appointment history Action
    * @param : id- instructor id
    * @return: check login and return available appoint
    */
    public function appointmentHistory(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $userId = Auth::id();
            $afrom = "1990-01-01";
            $ato = "2120-01-01";
            if ($request->afrom) $afrom = $request->afrom;
            if ($request->ato) $ato = $request->ato;

            $bookedHistory = Book::getBookedHistoryByStudentId($userId, $afrom, $ato, 6);

            return view('/student/appointmentshistory', compact('bookedHistory'));
        } else {

            return view('/layouts/404');
        }


    }

    /**************** Homework Action *************/

    /*
    * register Homework Action
    * @param Posted message data, recently bookedid, from-logined
    * @return: success or error
    */
    public function addHomework(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            if ($request->bookedid == "") {
                return Redirect::back()->withErrors(['Appointment must be select!']);
                exit;
            }
            $homework = new Homework();

            if (($request->inputMethod) == 'file') {
                $uploadsong = $request->homework_file;
                if (!$uploadsong) {
                    return Redirect::back()->withErrors(['Homework voice must be upload!']);
                    exit;
                } else {
                    $file_name = time() . '.' . $uploadsong->getClientOriginalExtension();
                    $uploadsong->move(public_path('audio/homework'), $file_name);
                    $homework->homework_data = $file_name;

                }
            } else {
                $homework->homework_data = $request->voicerecordinput;
            }

            $homework->book_id = $request->bookedid;
            $homework->contents = $request->notes;
            $homework->status = 0;

            $homework->save();
            return Redirect::back()->withErrors(['Succsssfully Sent!']);

        } else {

            return view('/layouts/404');
        }

    }


    /*
    * get recently appointment data
    * @param : no
    * @return: check login and return recently appointment data(time:instructor-name)
    */
    public function getAvailableAppointmentDataForAddHomework()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $userId = Auth::id();
            $appointmentData = Book::getAppointmentListForAddHomework($userId);
            return view('/student/homeworkadd', compact('appointmentData'));
        } else {

            return view('/layouts/404');
        }


    }

    /*
    * Homework show Action
    * @param : no
    * @return: check login and return logined user's info
    */
    public function showHomeworkHistory(Request $request)
    {
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $userId = Auth::id();
            $afrom = "1990-01-01";
            $ato = "2120-01-01";
            if ($request->afrom) $afrom = $request->afrom;
            if ($request->ato) $ato = $request->ato;

            $homeworkhistorydata = Homework:: getHomeworkHistoryDataByStudentID($userId, $afrom, $ato, 10);

            return view('student/homeworkhistory', compact('homeworkhistorydata'));
        } else {

            return view('/layouts/404');
        }


    }

    /*
    * Get Homework Audion data by homework_id
    * @param : homework_id
    * @return: check login and return Homework Audio Url
    */
    public function showHomeworkAudio($id)
    {
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $homework = Homework::find($id);
            $audio_data = $homework->homework_data;
            $audio_src = 'audio/homework/' . $audio_data;

            return view('student/showhomeworkaudio', compact('audio_src'));
        } else {

            return view('/layouts/404');
        }


    }

    /**************** Messages Action *************/

    /*
    * register message Action
    * @param Posted message data, to, from-logined
    * @return: success or error
    */
    public function sendMessages(Request $request)
    {
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $from = Auth::id();

            if (!$request->get('receiver')) {
                $error = "Please, select receiver!";
                return Redirect::back()->withErrors($error);
            }

            $message = new Message();
            $message->to = $request->get('receiver');;
            $message->from = $from;

            $msg = $request->get('msg');
            $replacedMsg = str_replace(',', ' ', $msg);
            $title = substr($replacedMsg, 0, 7) . "...";
            $message->contents = $replacedMsg;
            $message->title = $title;

            $message->save();

            return redirect('/student/msgs-history')->withErrors('Succsssfully Sent!');
        } else {

            return view('/layouts/404');
        }


    }

    /*
    * get Recipienter Data = get instructor list
    * @param : no
    * @return: check login and return logined instructor list(id, name)
    */
    public function getRecipienterList()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $userId = Auth::id();
            $recipienterlist = User:: getAvailableInstructorListForSendMessage($userId);

            return view('/student/msgsend', compact('recipienterlist'));
        } else {

            return view('/layouts/404');
        }


    }

    /*
    * Message show Action
    * @param : no
    * @return: check login and return logined user's info
    */
    public function showSendMessageHistory(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $userId = Auth::id();
            $afrom = "1990-01-01";
            $ato = "2120-01-01";
            if ($request->afrom) $afrom = $request->afrom;
            if ($request->ato) $ato = $request->ato;

            $messagehistory = Message::getSendMessageHistoryDataByUserID($userId, $afrom, $ato, 10);

            return view('/student/sendmsgshistory', compact('messagehistory'));
        } else {

            return view('/layouts/404');
        }


    }


    /*
    * Message show Action
    * @param : no
    * @return: check login and return logined user's info
    */
    public function showReceivedMessageHistory(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $userId = Auth::id();
            $afrom = "1990-01-01";
            $ato = "2120-01-01";
            if ($request->afrom) $afrom = $request->afrom;
            if ($request->ato) $ato = $request->ato;


            $messagehistory = Message:: getReceivedMessageHistoryDataByUserID($userId, $afrom, $ato, 10);

            return view('/student/receivemsgshistory', compact('messagehistory'));
        } else {

            return view('/layouts/404');
        }


    }

    /**************** Voice Room Action *************/

    /*
    * Voice Room Action
    * @param : no
    * @return: currently available booked and joined data
    */
    public function voiceRoom()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $userType = Auth::user()->status;
        if ($userType == '0' || $userType == '3') {
            $this->countMessage();
            $userId = Auth::id();
            $currentTime = strtotime(date('Y-m-d H:i:s'));
            $currentDate = date('d/m H:i');
            $voiceroomdata = Joinbooking:: getStudentAvaliableVoiceRoomData($userId);
            $instructorId = Joinbooking::getAvailableInstructorId($userId);

            return view('/student/voiceroom', compact('voiceroomdata', 'currentTime', 'currentDate', 'userId', 'instructorId'));

        } else {

            return view('/layouts/404');
        }

    }

}
