<?php

namespace App\Common\Services;

use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

class MailTrapService implements MailServiceInterface
{
  public function sendMail($data)
  {
    Mail::to('allamtaju4@gmail.com')->send(new MailtrapExample()); 
    return ['message' => 'Email successfully sent!'];
  }
}
