<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    public $timestamps = true;

        public function getHotels() {

            return $this->get();
          }
}
