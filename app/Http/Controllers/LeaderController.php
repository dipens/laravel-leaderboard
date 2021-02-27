<?php
namespace App\Http\Controllers;


use App\Models\Leaders;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index()
    {
        return Leaders::all()->sortByDesc('points');
    }

    public function show($id)
    {
        $leader = Leaders::find($id);
        return $leader;
    }

    public function create(Request $request)
    {
        $leader = Leaders::create($request->all());

        return response()->json($leader, 201);
    }

    public function update(Request $request, $id)
    {
        $leader = Leaders::find($id);
        $leader->update($request->all());
        $leader->save();
        return response()->json($leader, 200);
    }


    public function updatePoints(Request $request, $actionType, $id)
    {
        $leader = Leaders::find($id);
        switch($actionType) {
            case 'INCREASE':
                $leader->points += 1;
                break;
            case 'DECREASE':
                $leader->points -= 1;
                if($leader->points < 0) $leader->points = 0; //Assumption that points cannot go negative
                break;
        }
        $leader->save();
        return Leaders::all()->sortByDesc('points');
    }

    public function delete($id)
    {
        $leader = Leaders::find($id);
        $leader->delete();

        return response()->json(null, 204);
    }
}
