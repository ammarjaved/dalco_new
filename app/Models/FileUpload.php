<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;

    protected $table = 'sitesurvey_files';

    protected $fillable = [
        'file_name',
        'description',
        'file_path',
        'site_survey_id',
        'created_by',
        'updated_by',
        'project',
        'area'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function siteSurvey()
    {
        return $this->belongsTo(SiteSurvey::class);
    }

    // Optionally, you can define any relationships if needed
}
