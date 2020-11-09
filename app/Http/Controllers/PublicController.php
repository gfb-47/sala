<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;

class PublicController extends BaseController
{
   public function getSchedules($id){
        
        $data = 'Funcionou';    
        return $this->sendResponse($data);
   }
}