<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Activities;
use Carbon\Carbon;
use DB;

class ActivitiesController extends Controller
{
    //
    public function home()
    {
    	$inputsw = $this->getActivitiesByType( 'input', 5 );

        $outputsw = $this->getActivitiesByType('output', 5 );

        $bpsw = $this->getActivitiesByType('bp', 5 );

        return view('home')->with(compact('inputsw'))->with(compact('outputsw'))->with(compact('bpsw'));
    }

    public function inputForm()
    {
        return view('activities.input');
    }

    public function outputForm()
    {
        return view('activities.output');
    }

    public function bpForm()
    {
        return view('activities.bp');
    }

    public function addInput(Request $request)
    {
        $activity = new Activities;

        $activity->amount1 = $request['amount1'];
        $activity->type = 'input';
        $activity->notes = $request['notes'];
        $activity->saved_at = date('Y-m-d H:i:s');
        if (isset($request['saved_at']) && !empty($request['saved_at'])) {
            $activity->saved_at = date( 'Y-m-d H:i:s', strtotime( $request['saved_at'] ));
        }

        $activity->save();

        return redirect('/')->with('message', 'Created New Input');
    }

    public function addOutput(Request $request)
    {
        $activity = new Activities;

        $activity->amount1 = $request['amount1'];
        $activity->type = 'output';
        $activity->notes = $request['notes'];
        $activity->saved_at = date('Y-m-d H:i:s');
        if (isset($request['saved_at']) && !empty($request['saved_at'])) {
            $activity->saved_at = date( 'Y-m-d H:i:s', strtotime( $request['saved_at'] ));
        }

        $activity->save();

        return redirect('/')->with('message', 'Created New Input');
    }

    public function addBp(Request $request)
    {
        $activity = new Activities;
        
        $activity->type = 'bp';

        $activity->amount1 = $request['amount1'];
        $activity->amount2 = $request['amount2'];
        $activity->notes = $request['notes'];
        $activity->saved_at = date('Y-m-d H:i:s');
        if (isset($request['saved_at']) && !empty($request['saved_at'])) {
            $activity->saved_at = date( 'Y-m-d H:i:s', strtotime( $request['saved_at'] ));
        }

        $activity->save();

        return redirect('/')->with('message', 'Created New Input');
    }

    public function activities()
    {
    	$activities = Activities::all();

        return view('activities.activities', compact('activities'));
    }

    public function editForm(Activities $activity )
    {
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activities $activity)
    {
       // dd($request->all());

        $activity->update( $request->all() );

        return redirect('/')->with('message', 'Activity Updated' );
    }

    public function inputToday()
    {
        $activities = Activities::where('type', 'input')->whereBetween('saved_at', [
                Carbon::now()->startOfDay(),
                Carbon::now()->EndOfDay(),
            ])->get();

        return view('activities.today', compact('activities'));
    }

    public function outputToday()
    {
        $activities = Activities::where('type', 'output')->whereBetween('saved_at', [
                Carbon::now()->startOfDay(),
                Carbon::now()->EndOfDay(),
            ])->get();

        return view('activities.today', compact('activities'));
    }

    public function bpToday()
    {
        $activities = Activities::where('type', 'bp')->whereBetween('saved_at', [
                Carbon::now()->startOfDay(),
                Carbon::now()->EndOfDay(),
            ])->get();

        return view('activities.today', compact('activities'));
    }

    public function allToday()
    {
        $activities = Activities::whereBetween('saved_at', [
                Carbon::now()->startOfDay(),
                Carbon::now()->EndOfDay(),
            ])->orderBy('type')->orderBy('saved_at')->get();

        return view('activities.today', compact('activities'));
    }

    public function activity(Activities $activity )
    {

        return view('activities.activity', compact('activity'));
    }

    public function remove( Activities $activity )
    {
        $activity->delete();

        return redirect('/')->with('message', 'Activity Deleted');
    }

    public function removeFromToday( Activities $activity )
    {
        $activity->delete();

        return back();
    }

    public function type( $type )
    {
        $type = getActivitiesByType( $type );

        return view('activities.activities', compact('type'));
    }

    private function getActivitiesByType( String $type, $limit = null)
    {
        $ret = false;
        
        if ( !is_null($limit) && is_numeric($limit)) {
            $ret = Activities::where('type', $type)->limit($limit)->orderBy('saved_at', 'desc')->get();
        }
        else
        {
            $ret = Activities::where('type', $type)->orderBy('saved_at', 'desc')->get();
        }
        return $ret;
    }
}
