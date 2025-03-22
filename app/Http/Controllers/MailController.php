<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\TestMail;

class MailController extends Controller {
   public function basic_email() {
      $data = array('name'=>"Virat Gandhi");
   
    /*  Mail::send('mail', $data, function($message) {
         $message->to('aschalew38@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('business@abajifartech.com','Virat Gandhi');
      });*/
      
  mail("aschalew38@gmail.com","My subject","message");
     
      
        /*       $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
           
        Mail::to("aschalew38@gmail.com")->send(new TestMail(str_replace("\xE2\x80\x8B", "",$mailData))); */
             
        dd("Email is sent successfully.");
      
      echo "Basic Email Sent. Check your inbox.";
   }
   public function html_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('aschalew38@gmail.com', $data, function($message) {
         $message->to('aschalew38@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('aschalewfogi48@gmail.com','aschalew laravel testing');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('aschalew38@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('aschalewfogi48@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}