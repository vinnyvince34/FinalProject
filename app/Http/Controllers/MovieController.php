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
        return response([
            Movie::all()
            ], 200);
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
                'movie_name' => 'required|max:50',
                'duration' => 'required|numeric',
                'casts' => 'required',
                'director' => 'required',
                'rating' => 'required',
                'genre' => 'required',
                'synopsis' => 'required',
                'image_url' => 'required',
                'trailer_url' => 'required',
                'status' => 'required'
            ]);

            Movie::create($new);

            return response(["Successful!"], 200);

        } catch(\Exception $e){

            return response([
                $e->getMessage()
            ], 400);
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

    public function carousel(){
        try{
            $var = Movie::where('status', '=', 'np')
                        ->limit('5');

            return response(
                [$var],200
            );

        }catch(\Exception $e){
            return response(
                $e->getMessage(), 400
            );
        }
    }

    public function nowPlaying(){
        try{
            $var = Movie::where('status', '=', 'np');

            return response(
                [$var],200
            );

        }catch(\Exception $e){
            return response(
                $e->getMessage(), 400
            );
        }
    }

    public function comingSoon(){
        try{
            $var = Movie::where('status', '=', 'cs');

            return response(
                [$var],200
            );

        }catch(\Exception $e){
            return response(
                $e->getMessage(), 400
            );
        }
    }
}
