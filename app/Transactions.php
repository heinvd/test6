<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    public function addTransaction($data){
        $this->id_user = $data['id_user'];
        $this->trans_type = $data['trans_type'];
        $this->trans_value = $data['trans_value'];
        $this->trans_description = $data['trans_description'];
        $this->save();
        return 1;
    }



}
