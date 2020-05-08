<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    public $timestamps = true;

        public function getCities() {
            return $this->get();
          }

        protected $fillable = [
            'name', 'description', 'image',
        ];
       
}
