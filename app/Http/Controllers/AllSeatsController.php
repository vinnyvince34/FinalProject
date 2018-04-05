<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllSeats;

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

            $new = $this->validate($request->all(), [
                'seat_number' => 'required|digits:8|unique:credit_cards,id',
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
    public function show($id)
    {
        // i dont think we need this thou
        try{

            $var = AllSeats::findOrFail($id);

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
            $var = AllSeats::findOrFail($id);

            if ( isset($var)){
                
            }


        } catch (\Exception $e) {

            return response([
               $e
            ]);

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
}
