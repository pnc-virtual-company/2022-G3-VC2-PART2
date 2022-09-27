<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\VerifyCode;
use App\Mail\AccountRegistration;
use App\Mail\AccountAcceptance;
use App\Mail\AlumniInvitation;
use App\Mail\EroInvitation;

class MailController extends Controller
{
    private $myEmail = "seyhasoeurn007@gmail.com";


    public function sendVerifyCode($data)
    {
        try {
            Mail::to($data['email'])->send(new VerifyCode($data)); 
            return response()->json(['message' => 'verif code sent']);
        } catch (Exception $th) {
            return response()->json(['message' => 'something went wrong']);
        }
    }

    public function sendRegistrationEmail($data)
    {
        try {
            Mail::to($this->myEmail)->send(new AccountRegistration($data)); 
            return response()->json(['message' => 'registration request sent']);
        } catch (Exception $th) {
            return response()->json(['message' => 'something went wrong']);
        }
    }
    
    public function sendAcceptanceMail($data)
    {
        try {
            Mail::to($data['email'])->send(new AccountAcceptance($data)); 
            return response()->json(['message' => 'request is accepted']);
        } catch (Exception $th) {
            return response()->json(['message' => 'something went wrong']);
        }
    }
    
    public function sendAlumniInvitation($data)
    {
        try {
            Mail::to($data['email'])->send(new AlumniInvitation($data)); 
            return response()->json(['message' => 'invitation sent']);
        } catch (Exception $th) {
            return response()->json(['message' => 'something went wrong']);
        }
    }
    
    public function sendEroInvitation($data)
    {
        try {
            Mail::to($data['email'])->send(new EroInvitation($data)); 
            return response()->json(['message' => 'invitation sent']);
        } catch (Exception $th) {
            return response()->json(['message' => 'something went wrong']);
        }
    }
}
