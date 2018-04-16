<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllSeats;
use Illuminate\Support\Facades\DB;

class AllSeatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AllSeats::all();
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
                'seat_number' => 'required',
                'theatre_id' => 'required'
            ]);

            AllSeats::create($new);

            return response(
                'Created', 201
            );
        } catch(\Exception $e){

            return response(
                $e->getMessage(),400
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // i dont think we need this thou
        try{

            $var = AllSeats::all();

            return response([$var], 200);

        } catch (\Exception $e) {

            return response("Seat not found.", 400);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $var = AllSeats::findOrFail($request->id);

            if($request->seat_number == NULL){
                $request->seat_number = $var->seat_number;
            }
            if($request->theatre_id == NULL){
                $request->theatre_id = $var->theatre_id;
            }

            $var->update([
                'seat_number' => $request->seat_number,
                'theatre_id' => $request->theatre_id
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
            $var = RoomType::findOrFail($id);
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

    public function bySchedule($id){
        try{
            $var = AllSeats::select('seats.id as seat_id', 'seats.seat_number as seat_number') //ni gw udah opernya cuman seat_id sm seat_numbernya
                    ->join('theatres', 'theatres.id', '=', 'all_seats.theatre_id')
                    ->where('theatres.id', '=', DB::raw("SELECT theatre_id FROM schedules WHERE id = \"{$id}\";"))
                    ->whereNotIn('seats.id', DB::raw("SELECT rs.seat_id FROM reserved_seats as rs, schedules as sc WHERE sc.schedule_id = \" {$id} \";"))
                    ->get();
                return response(
                    $var,200
                );

        }catch(\Exception $e){
            return response(
                $e->getMessage(), 400
            );
        }
    }
}
