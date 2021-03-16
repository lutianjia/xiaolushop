<?php

namespace App\Models;

class M3Result {

  public $status;
  public $message;
  public $pId;
  public $url;
  public $id;
  public $data;
  public function toJson()
  {
    return json_encode($this, JSON_UNESCAPED_UNICODE);
  }

}
