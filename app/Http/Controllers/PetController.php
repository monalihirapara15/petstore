<?php

namespace App\Http\Controllers;
use DB;
use App\Pet;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class PetController extends Controller
{

    public function showAllPets()
    {
		$petDetail= Pet::with('category')->with('tag')->get();
		return response()->json($petDetail);
    }

    public function showOnePet($id)
    {
		$this->validate($request, [
            'id' => 'required',
        ]);
		
		return $petDetail= Pet::with('category')->with('tag')->find($id);
    }
	

    public function create(Request $request)
    {
		 $this->validate($request, [
            'name' => 'required',
            
        ]);
		$category = Category::create([
            'name' => $request['category'],
            
        ]);

		$tag = Tag::create([
            'name' => $request['tag'],
            
        ]);
		$pet = Pet::create([
            'name' => $request['name'],
            'cat_id' => $category['id'],
            'tag_id' => $tag['id'],
            'status' => $request['status'],
            'photourl' => $request['photourl'],
            
        ]);

        return response()->json($pet, 201);
    }

    public function update($id, Request $request)
    {
		$this->validate($request, [
            'id' => 'required',
            
        ]);
        $pet = Pet::findOrFail($id);
        $pet->update($request->all());

        return response()->json($pet, 200);
    }

    public function delete($id)
    {
        Pet::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}