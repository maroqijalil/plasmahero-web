<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailTrapExample;

class MailTrapService implements MailServiceInterface
{
  public function sendMail($data)
  {
    Mail::to('allamtaju4@gmail.com')->send(new MailtrapExample()); 
    return ['message' => 'Email successfully sent!'];
  }
}
