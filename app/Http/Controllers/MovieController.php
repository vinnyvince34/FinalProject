<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movie::all();
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
            if($request->movie_name != NULL && $request->duration != NULL
                && $request->casts != NULL && $request->director != NULL
                && $request->rating != NULL && $request->genre != NULL
                && $request->synopsis != NULL && $request->image_url != NULL
                && $request->trailer_url != NULL) {

                $new = $this->validate($request, [
                    'movie_name' => 'required|min:3|max:50', //type:: 2D, 3D, IMAX, velvet
                    'duration' => 'required|numeric',
                    'casts' => 'required|min:3',
                    'director' => 'required|min:3',
                    'rating' => 'required',
                    'genre' => 'required|min:3'

                ]);

                RoomType::create($new);
            } else {
                throw new \Exception("Don't leave any field empty");
            }
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
        $var = Movie::all();
        return response([$var]);
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
        try{
            $var = Movie::findOrFail($id);

            if ($var->a){}


        } catch (\Exception $e){
            return response([$e]);
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
        //
    }
}
