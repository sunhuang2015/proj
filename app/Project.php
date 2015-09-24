<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    //
    use SoftDeletes;
    protected $table="projects";
    /*
     *   $table->integer('company_id')->unsigned();
            $table->string("req")->unique();
            $table->string('applicant');
            $table->string('phone');
            $table->string('contact');
            $table->string('contact_phone');
            $table->string('subject');
            $table->decimal('network_qty')->default(0);
            $table->decimal('telephone_qty')->default(0);
            $table->text('description');
            $table->string('department');
            $table->string('costcenter');
            $table->integer('step_id')->unsigned()->default(1);
     */

    protected $fillable=[
        'company_id',
        'req',
        'applicant',
        'phone',
        'contact',
        'contact_phone',
        'subject',
        'network_qty',
        'telephone_qty',
        'description',
        'department',
        'costcenter',
        'step_id'
    ];

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function step(){
        return $this->belongsTo('App\Step');
    }

    public function project_file(){
        return $this->hasMany('App\ProjectFile');
    }
}
