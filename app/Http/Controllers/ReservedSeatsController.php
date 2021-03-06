<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservedSeats;
use App\Traits\StoreMethods;


class ReservedSeatsController extends Controller
{
    use StoreMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(
            ReservedSeats::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        try{
//            $new = $this->validate($request, [
//                'name' => 'required|min:3|max:50',
//                'description' => 'required|numeric',
//                'value' => 'required|min:3',
//                'image_url' => 'required|min:3'
//            ]);
//
//            ReservedSeats::create($new);
//
//            return response(["Successful!"]);
//
//        } catch(\Exception $e){
//
//            return response([
//                $e->getMessage()
//            ]);
//        }
//    }

    public function store(Request $request){
        if($this->storeReservedSeats($request))
            return response(
                "Successful!", 200
            );

        return response(
            "Failed", 400
        );
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

            $var = ReservedSeats::findOrFail($id);

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
    public function update(Request $request)
    {
        try {
            $var = ReservedSeats::findOrFail($request->id);

            if($request->seat_id == NULL){
                $request->seat_id = $var->seat_id;
            }
            if($request->transaction_id == NULL){
                $request->transaction_id = $var->transaction_id;
            }
            if($request->schedule_id == NULL){
                $request->schedule_id = $var->schedule_id;
            }

            $var->update([
                'seat_id' => $request->seat_id,
                'transaction_id' => $request->transaction_id,
                'schedule_id' => $request->schedule_id
            ]);

            $var->save();

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
            $var = ReservedSeats::findOrFail($id);
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

    public function showSeatMovie(Request $request) {
        $info = ReservedSeats::where('transaction_id', $request->id)->get();

        return $info;
    }
}
