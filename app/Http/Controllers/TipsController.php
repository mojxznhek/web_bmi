<?php

namespace App\Http\Controllers;
use app\Models\HealthTips;
use Illuminate\Http\Request;

class TipsController extends Controller
{
    public function showSuggestions(Request $request)
    {
        dd('Hi hello');
        $query = $request->get('query');
        if ($request->ajax()) {
            $data = HealthTips::where('content', 'LIKE', $query . '%')
                ->limit(10)
                ->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<ul class="list-group">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item">' . $row->content . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }
            return $output;
        }
        $tips = HealthTips::where('content', 'LIKE', '%' . $query . '%')
            ->simplePaginate(10);
        return view('welcome', compact('tips'));
    }
}