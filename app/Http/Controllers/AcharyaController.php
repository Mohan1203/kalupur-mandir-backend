<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acharya;
use Illuminate\Support\Facades\Validator;

class AcharyaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $acharyas = Acharya::orderBy('created_at', 'desc')->get();
        return view('admin.acharya.acharya',compact('acharyas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,svg,webp",
        ]);
        $acharya = new Acharya();
        $acharya->name = $request->name;
        $acharya->description = $request->description;

        $acharya->is_current_acharya = $request->isCurrentAcharya == "true" ? true :false;
        if($request->hasFile('image')){
            $imageName ='acharya' . time() . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $imageName);
            $acharya->image = 'images/' . $imageName;
        }
        $acharya->save();
        return redirect()->back()->with('success','Saved succefully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $acharya = Acharya::all();
            $acharya = $acharya->map(function ($item){
                return[
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'image' => asset(env('APP_URL').'/'.'images/'.$item->image),
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ];
            });

            $data = [
               'success' => true,
                'data'=>[
                    'acharyas' => $acharya,
                ]
            ];
            return response()->json($data);
        }catch(\Exception $e){
            $data = [
                'success' => false,
                'message' => $e->getMessage(),
            ];
            return response()->json($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $acharya = Acharya::where('id',$id)->first();

        return view('admin.acharya.editacharya',compact('acharya'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $acharya = Acharya::where('id',$id)->first();
        $acharya->name = $request->name;
        $acharya->description = $request->description;
        $acharya->is_current_acharya = $request->isCurrentAcharya == "1" ? true :false;
        if($request->hasFile('image')){
            if ($acharya->image && file_exists(public_path($acharya->image))) {
                unlink(public_path($acharya->image));
            }
            $imageName ='acharya' . time() . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $imageName);
            $acharya->image = 'images/' . $imageName;
        }
        $acharya->save();
        return redirect('/acharya')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Acharya::destroy($id);
        return redirect('/acharya');
    }

    /**
     * Update the current acharya status - only one can be current at a time.
     */
    public function updateCurrentAcharya(Request $request)
    {
        try {
            $acharyaId = $request->input('acharya_id');
            
            // Set all acharyas to not current
            Acharya::query()->update(['is_current_acharya' => false]);
            
            // Set the selected acharya as current
            Acharya::where('id', $acharyaId)->update(['is_current_acharya' => true]);
            
            return response()->json([
                'success' => true,
                'message' => 'Current acharya updated successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating current acharya: ' . $e->getMessage()
            ], 500);
        }
    }
}
