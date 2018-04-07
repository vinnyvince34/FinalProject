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
            $new = $this->validate($request, [
                'movie_name' => 'required|min:3|max:50',
                'duration' => 'required|numeric',
                'casts' => 'required|min:3',
                'director' => 'required|min:3',
                'rating' => 'required',
                'genre' => 'required|min:3'
            ]);

            RoomType::create($new);

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

            $var = Movie::findOrFail($id);

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
            $var = Movie::findOrFail($id);

            if($request->movie_name == NULL){
                $request->movie_name = $var->movie_name;
            }
            if($request->duration == NULL){
                $request->duration = $var->duration;
            }
            if($request->casts == NULL){
                $request->casts = $var->casts;
            }
            if($request->director == NULL){
                $request->director = $var->director;
            }
            if($request->rating == NULL){
                $request->rating = $var->rating;
            }
            if($request->genre == NULL){
                $request->genre = $var->genre;
            }
            if($request->synopsis == NULL){
                $request->synopsis = $var->synopsis;
            }
            if($request->image_url == NULL){
                $request->image_url = $var->image_url;
            }
            if($request->trailer_url == NULL){
                $request->trailer_url = $var->trailer_url;
            }
            if($request->status == NULL){
                $request->status = $var->status;
            }

            $var->update([
                'movie_name' => $request->movie_name,
                'duration' => $request->duration,
                'casts' => $request->casts,
                'director' => $request->director,
                'rating' => $request->rating,
                'genre' => $request->genre,
                'synopsis' => $request->synopsis,
                'image_url' => $request->image_url,
                'trailer_url' => $request->trailer_url,
                'status' => $request->status
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
            $var = Movie::findOrFail($id);
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
