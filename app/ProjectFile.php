<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    //
    protected $table="project_files";
    protected $fillable=['project_id','step_id','project_file'];

}
