<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Cinema;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Schedule::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $new = $this->validate($request, [
                'movie_id' => 'required',
                'theatre_id' => 'required',
                'time' => 'required'
            ]);

            Schedule::create($new);

            return response(["Successful!"]);

        } catch(\Exception $e){

            return response([
                $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{

            $var = Schedule::findOrFail($id);

            return response([$var], 200);

        } catch (\Exception $e) {

            return response("Movie not found.", 400);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $var = Schedule::findOrFail($id);

            if($request->movie_id == NULL){
                $request->movie_id = $var->movie_id;
            }
            if($request->theatre_id == NULL){
                $request->theatre_id = $var->theatre_id;
            }
            if($request->time == NULL){
                $request->time = $var->time;
            }

            $var->update([
                'movie_id' => $request->movie_id,
                'theatre_id' => $request->theatre_id,
                'time' => $request->time
            ]);

        } catch (\Exception $e) {

            return response([
                $e
            ], 400);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $var = Schedule::findOrFail($id);
            if(isset($var)){
                $var -> delete();
                return response(
                    "Successful",200
                );
            }
        }catch(\Exception $e){
            return response(
                $e->getMessage(), 400
            );
        }
    }

    // public function byCity($id){
    //     try{
    //         $var = Schedule::where('movie_id', '=', $id)
    //             ->leftJoin('theatres', 'theatres.id', '=', 'schedules.theatre_id')
    //             ->leftJoin('cinemas', 'cinemas.id', '=', 'cinemas.cinema_id')
    //             //->where('cinemas.city', '=', $cityID)
    //             ->leftJoin('room_types', 'room_types.id', '=', 'theatres.room_id')
    //             ->orderBy('cinemas.cinema_name', 'asc')
    //             ->orderBy('theatres.theatre_name', 'asc')
    //             ->get();

    //         return response(
    //                 $var,200
    //         );
            
    //     }catch(\Exception $e){
    //         return response(
    //             $e->getMessage(), 400
    //         );
    //     }
    // }

    public function getSchedule(Request $request){
        $result = array();
        $cinemas = Cinema::where('city',$request->city)->get();
        foreach($cinemas as $cinema){
            $cnt=0;
            foreach($cinema->theatre as $t){
                $schedules = Schedule::where('theatre_id',$t->id)
                                    ->where('movie_id',$request->id)
                                    ->get();
                
                if(count($schedules)==0) continue;
               
                foreach($schedules as $schedule){
                    $schedule['cinemas'] = $cinema->cinema_name;
                }
                array_push($result,$schedule);
            }
        }
        return $result;
    }
}
