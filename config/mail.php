<?php
return [
  "driver" => "smtp",
  "host" => "smtp.mailtrap.io",
  "port" => 2525,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "55e3d2254aa71f",
  "password" => "6336f99bcbeaef",
  "sendmail" => "/usr/sbin/sendmail -bs"
];
