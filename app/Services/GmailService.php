<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class GmailService implements MailServiceInterface
{
  public function sendMail($data)
  {
    Mail::send('emailToSent', $data, function ($mail) use ($data) {
      $mail->to($data['email'], 'no-reply')->subject($data['subject']);
      $mail->from('erikfaderik@gmail.com', 'Plasmahero');
    });

    return ['message' => 'Email successfully sent!'];
  }
}
