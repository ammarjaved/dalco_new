<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;



use App\Models\material;
use App\Models\ProjectMaterial;
use Illuminate\Http\Request;
use App\Models\SiteSurvey;
use Illuminate\Support\Facades\DB;
use Exception;




class MaterialSelectionController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the Site Survey
        $siteSurvey = SiteSurvey::find($request->id);
    
        // Fetch the materials data
        $data = DB::select(DB::raw("
            WITH foo AS (SELECT * FROM project_material)
            SELECT a.id, c.nama_pe, mat_desc, mat_code, bun, a.quantity, a.remarks
            FROM material b
            JOIN foo a ON a.material_id = b.id
            JOIN tbl_site_survey c ON a.site_survey_id = c.id
            WHERE c.id = ?
        "), [$request->id]);
    
        
    
        // Pass both siteSurvey and data to the view
        return view('material-selection.index', compact('siteSurvey', 'data'));
    }
    
    // public function index(Request $request)
    // {
    //  //   return $request->id;
    //     $siteSurvey = SiteSurvey::find($request->id);
    //         return view('material-selection.index',compact('siteSurvey'));
    // }


    public function searchMaterial(Request $request)
    {
        $query = Material::query();
    
        if ($request->has('query')) {
            $search = $request->input('query');
            $query->where(function($q) use ($search) {
                $q->where('mat_code', 'LIKE', "%{$search}%")
                  ->orWhere('mat_desc', 'LIKE', "%{$search}%");
            });
        }
    
        // Fetch materials
        $results = $query->orderBy('mat_code')
                         ->inRandomOrder()
                         ->limit(100)
                         ->get(['mat_code', 'mat_desc']); // Get both fields
    
        // Log and return for debugging purposes
        // Log to the Laravel log for checking
        return response()->json($results);
    }
    


    public function materialData(Request $request){
        $query = Material::query();
        if ($request->has('desc')) {
            $search = $request->input('desc');
            $query->where(function($q) use ($search) {
                $q->where('mat_code', 'LIKE', "%{$search}%")
                  ->orWhere('mat_desc', 'LIKE', "%{$search}%");
            });
        }
        
        return $materials = $query->get();
    }

    // public function searchResult(Request $request)
    // {
    //     $siteSurvey = SiteSurvey::find($request->id);
    
    //     // Handle the case where SiteSurvey is not found
    //     if (!$siteSurvey) {
    //         return redirect()->route('material-selection.index')->with('error', 'Site Survey not found.');
    //     }
    
    //     $query = material::query();
    
    //     if ($request->has('search')) {
    //         $search = $request->input('search');
    //         $query->where('mat_code', 'LIKE', "%{$search}%")
    //               ->orWhere('mat_desc', 'LIKE', "%{$search}%");
    //     }
    
    //     $materials = $query->get();
    
    //     return view('material-selection.index', compact('materials', 'siteSurvey'));
    // }


    // app/Http/Controllers/MaterialSelectionController.php

public function format()
{
    $surveys = SiteSurvey::all(); // Adjust the query as needed to fetch the required data
    return view('material-selection.format', compact('surveys'));
}

    

public function showData($id)
{
    $data = DB::select(DB::raw("
        WITH foo AS (SELECT * FROM project_material)
        SELECT a.id, c.nama_pe, mat_desc, mat_code, bun, a.quantity
        FROM material b
        JOIN foo a ON a.material_id = b.id
        JOIN tbl_site_survey c ON a.site_survey_id = c.id
        WHERE c.id = ?
    "), [$id]);
    
    return view('material-selection.data-table', ['data' => $data]);
}

    
    

    public function saveSelections(Request $request, $id)
    {
        $siteSurvey = SiteSurvey::find($id);

       // return $request->data;
    
        if (!$siteSurvey) {
            return redirect()->route('material-selection.index')->with('error', 'Site Survey not found.');
        }
    
        $selections = $request->data;
    
        foreach ($selections as $row) {
           // if ($quantity > 0) {
                $username = Auth::user()->name;

                $exist = ProjectMaterial::where('material_id',$row['id'])->exists();
                if($exist){
                $record = ProjectMaterial::where('material_id',$row['id']);    
                $record->delete();
                }
                ProjectMaterial::create(
                    [
                        'material_id' =>$row['id'],
                        'site_survey_id' => $id,
                        'quantity' => $row['quantity'],
                        'remarks' => $row['remarks'] ?? '', // Save remarks
                        'created_by' => $username
                    ]
                );
           // }
        }
    
        return redirect()->route('material-selection.index', ['id' => $id])->with('success', 'Selections saved successfully.');
    }

    public function destroy($id)
    {
        try {
            
            $materialCount = DB::table('project_material')
                ->where('id', $id)
                ->delete();
    
            
            return redirect()->back()->with('success', "$materialCount Material(s) successfully deleted.");
        } catch (Exception $e) {
            
            return redirect()->back()->with('failed', 'Failed to delete material: ' . $e->getMessage());
        }
    }
    
    public function deleteAll($siteSurveyId)
    {
        try {
            // Check if site survey exists (optional)
            $siteSurvey = SiteSurvey::find($siteSurveyId);
    
            if (!$siteSurvey) {
                return redirect()->back()->with('failed', 'Site Survey not found.');
            }
    
            // Delete all records associated with the given site_survey_id
            $deletedCount = ProjectMaterial::where('site_survey_id', $siteSurveyId)->delete();
    
            return redirect()->back()->with('success', "{$deletedCount} Material(s) successfully deleted.");
        } catch (Exception $e) {
            return redirect()->back()->with('failed', 'Failed to delete materials: ' . $e->getMessage());
        }
    }
    
    
    
    
    



    


    
}