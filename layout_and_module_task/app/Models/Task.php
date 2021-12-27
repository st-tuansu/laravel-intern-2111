<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\User;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'type', 'status', 'start_date', 'due_date', 'assignee', 'estimate', 'actual'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getStartDateLabelAttribute($value)
    {
        $date = Carbon::parse($value);

        return $date->format('d-m-Y');
    }

    public function getDueDateLabelAttribute($value)
    {
        $date = Carbon::parse($value);

        return $date->format('d-m-Y');
    }

    public function getStatusLabelAttribute()
    {
        return [
            '1' => 'Open',
            '2' => 'In progress',
            '3' => 'Resolved',
            '4' => 'Done',
            '5' => 'Pending',
            '6' => 'Verified',
            '7' => 'Closed',
        ][$this->status];
    }

    public function getTypeLAbelAttribute()
    {
        return [
            '1' => 'Story',
            '2' => 'Task',
            '3' => 'Bug',
        ][$this->type];
    }
}