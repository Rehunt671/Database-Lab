<?php

namespace App\Http\Controllers;

use App\Models\Emotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConflictController extends Controller
{
    public function index()
    {
        $conflictDiaryEntries = Auth::user()->diaryEntries()
            ->join('diary_entry_emotions', 'diary_entries.id', '=', 'diary_entry_emotions.diary_entry_id')
            ->join('emotions', 'diary_entry_emotions.emotion_id', '=', 'emotions.id')
            ->where('emotions.name', 'Sad')
            ->where('diary_entries.user_id', Auth::id()) // Ensure it's tied to the authenticated user
            ->where('diary_entries.content', 'like', '%happy%') // Case-insensitive search for 'happy'
            ->select('diary_entries.*','diary_entry_emotions.intensity', 'emotions.name as emotion_name')
            ->get();
    
        return  view('conflict.index', compact('conflictDiaryEntries'));
    }
}
