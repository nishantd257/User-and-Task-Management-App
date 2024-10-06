<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'task_detail', 'task_type'];

    //  relationship with the user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

