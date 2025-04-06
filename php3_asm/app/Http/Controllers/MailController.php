<?php
namespace App\Http\Controllers;

use App\Mails\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class MailController extends Controller
{

   public function sendMail(Request $request)
   {

       $details = [
           'title' => $request->title,
           'body' => $request->body,
           'name' => $request->name,
           'email' => $request->email,
           'content' => $request->message,
       ];


       // Gửi email
       Mail::to($request->email)->send(new TestMail($details));


       // Trả về phản hồi JSON
       return response()->json(['message' => 'Email sent successfully'], 200);
   }



//    public function build()
//    {
//        return $this->subject('Test Email from Laravel')->view('emails.emails');
//    }

}
