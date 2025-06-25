<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Resources\PostResource;


class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content','student_id'];

    public function student()
{
    return $this->belongsTo(Student::class);
}
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    static public function posts(){
        $post = PostResource::collection(self::orderBy('created_at', 'desc')->get())->resolve();
        $sorted = collect($post)->sortBy('post')->values();
        return $sorted->all();
    }
}
