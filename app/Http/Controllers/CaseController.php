<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\Court;
use App\Models\Judge;
use App\Models\Subcat;
use App\Models\User;
use App\Models\PS;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class CaseController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        return redirect()->route('cases', ['id' => $request->file_number]);



    }
    public function case($id)
    {
        if (auth()->user()->hasRole(['user|author'])) {
            $cases = auth()->user()->Cases()->where('file_number', $id)->latest()->paginate(5);
            return view('cases.index', compact('cases'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $cases = Cases::where('file_number', $id)->latest()->paginate(5);
            return view('cases.index', compact('cases'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }

    }

    public function excase(Request $request)
    {
        $products = Cases::where('cnic', $request->id)->paginate('10');
        return view('cases.excases', compact('products'));
    }

    public function index(Request $request)
    {
        // Load common data
        $cats = Court::all();
        $subcats = Subcat::all();
        $judges = Judge::all()->sortBy('priority');
        $pss = PS::all();

        // Determine if user is admin or has admin role
        $isAdmin = auth()->user()->hasRole(['Admin', 'user']);

        // Get cases based on user role
        if ($isAdmin) {
            $cases = auth()->user()->Cases()->latest()->get();
        } else {
            $cases = Cases::latest()->get();
        }

        return view('cases.index', compact('cases', 'cats', 'subcats', 'judges', 'pss'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cases.create');
    }

    /**
     * Show the form for creating a new Civil/Family case.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCivil()
    {
        $cats = Court::all();
        $subcats = Subcat::all();
        $judges = Judge::all()->sortBy('priority');
        $pss = PS::all();

        return view('cases.create-civil', compact('cats', 'subcats', 'judges', 'pss'));
    }

    /**
     * Show the form for creating a new Criminal case.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCriminal()
    {
        $cats = Court::all();
        $subcats = Subcat::all();
        $judges = Judge::all()->sortBy('priority');
        $pss = PS::all();

        return view('cases.create-criminal', compact('cats', 'subcats', 'judges', 'pss'));
    }

    /**
     * Show the form for creating a new Misc case.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMisc()
    {
        $cats = Court::all();
        $subcats = Subcat::all();
        $judges = Judge::all()->sortBy('priority');
        $pss = PS::all();

        return view('cases.create-misc', compact('cats', 'subcats', 'judges', 'pss'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = null;

        // Handle base64 webcam capture
        if ($request->image && strpos($request->image, 'base64') !== false) {
            $img = $request->image;

            $image_parts = explode(";base64,", $img);
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';

            // Save directly to public/uploads folder
            $uploadPath = public_path('uploads');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            file_put_contents($uploadPath . '/' . $fileName, $image_base64);
            $file = 'uploads/' . $fileName;
        }
        // Handle uploaded file images
        elseif ($request->hasFile('uploaded_images')) {
            $uploadedFile = $request->file('uploaded_images')[0];
            $fileName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();

            // Save directly to public/uploads folder
            $uploadedFile->move(public_path('uploads'), $fileName);
            $file = 'uploads/' . $fileName;
        }
        // Keep existing image if no new image is uploaded (for edit mode)
        elseif ($request->existing_image) {
            $file = $request->existing_image;
        }
        // Build the data array
        $data = [
            'p1' => $request->p1,
            'p2' => $request->p2,
            'p1_urdu' => $request->p1_urdu,
            'p2_urdu' => $request->p2_urdu,
            'district' => $request->district,
            'tehsil' => $request->tehsil,
            'a_date' => $request->a_date,
            'cno' => $request->cno,
            'caset' => $request->caset,
            'm1' => $request->m1,
            'm2' => $request->m2,
            'cnic' => $request->cnic,
            'i_date' => $request->i_date,
            'i_no' => $request->i_no,
            'cat' => $request->cat,
            'subcat' => $request->subcat,
            'c_type' => $request->c_type,
            'fir_no' => $request->fir_no,
            'fir_year' => $request->fir_year,
            'offence' => $request->offence,
            'jur' => $request->jur,
            'app_against' => $request->app_against,
            'o_date' => $request->o_date,
            'court_name' => $request->court_name,
            'judge_id' => $request->judge_id,
            'ps_id' => $request->ps_id,
            'direction_from' => $request->direction_from,
            'is_juvenile' => $request->has('is_juvenile') ? 1 : 0,
            'is_overseas' => $request->has('is_overseas') ? 1 : 0,
            'is_women_petitioner' => $request->has('is_women_petitioner') ? 1 : 0,
            'is_women_respondent' => $request->has('is_women_respondent') ? 1 : 0,
            'suit_valuation' => $request->suit_valuation,
            'civil_jurisdiction' => $request->civil_jurisdiction,
            'case_status' => $request->case_status ?? 'Pending',
            'next_date' => $request->next_date,
            'case_stage' => $request->case_stage,
            'adjournment_reason' => $request->adjournment_reason,
            'short_order' => $request->short_order,
            'cp_remarks' => $request->cp_remarks,
        ];

        // Only update pic if we have a file
        if ($file) {
            $data['pic'] = $file;
        }

        if ($request->user_id != "") {
            $data['user_id'] = $request->user_id;
            Cases::updateOrCreate(
                ['id' => $request->product_id],
                $data
            );
        } else {
            Auth()->user()->Cases()->updateOrCreate(
                ['id' => $request->product_id],
                $data
            );

        }

        return response()->json(['success' => 'Case saved successfully.']);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Cases $case)
    {
        return view('cases.show', compact('case'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Cases $case)
    {
        return response()->json($case);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cases  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cases $case)
    {


        $case->update($request->all());


        return redirect()->route('cases.index')
            ->with('success', 'Case updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cases $case)
    {
        $case->delete();


        return response()->json(['success' => 'Product deleted successfully.']);
    }

    public function cnic($id)
    {
        $c = Cases::where('cnic', $id)->first();
        if ($c) {
            $r = "found";
            return response()->json($r);
        } else {
            $r = "notfound";
            return response()->json($r);
        }
    }

    public function fir($id)
    {
        $c = Cases::where('i_no', $id)->count();
        if ($c >= 4) {
            $r = "found";
            return response()->json($r);
        } else {
            $r = "notfound";
            return response()->json($r);
        }
    }

    /**
     * Translate English text to Urdu using external API (Server-side proxy to bypass CORS)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function translateToUrdu(Request $request)
    {
        $englishText = $request->input('english_text', '');

        if (empty(trim($englishText))) {
            return response()->json([
                'status' => 'error',
                'message' => 'No text provided',
                'urdu_text' => ''
            ]);
        }

        try {
            // Use cURL to make the request server-side (bypasses CORS)
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://dsj.punjab.gov.pk/admin/caseentries/geturdu');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'english_text' => $englishText
            ]));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json'
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Translation service unavailable',
                    'urdu_text' => ''
                ]);
            }

            $data = json_decode($response, true);

            if ($data && isset($data['status']) && $data['status'] === 'success') {
                return response()->json([
                    'status' => 'success',
                    'urdu_text' => $data['urdu_text'] ?? ''
                ]);
            }

            // If external API fails, return the original text (user can manually edit)
            return response()->json([
                'status' => 'error',
                'message' => 'Translation failed',
                'urdu_text' => ''
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Translation service error',
                'urdu_text' => ''
            ]);
        }
    }


    public function monthly(Request $request)
    {
        $cats = Court::all();
        $products = Cases::select('*')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        $subcats = Subcat::all();
        $judges = Judge::all();
        $pss = PS::all();


        if ($request->ajax()) {
            $data = Cases::select('*')
                ->whereMonth('created_at', Carbon::now()->month)
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                    return $btn;
                })
                ->addColumn('cat', function ($row) {

                    return $row->cname($row->cat);

                })
                ->addColumn('ps', function ($row) {
                    if ($row->ps_id) {
                        return $row->psname($row->ps_id);
                    } else {
                        return "";
                    }

                })
                ->addColumn('subcat', function ($row) {

                    return $row->sname($row->subcat);

                })
                ->addColumn('judge_name', function ($row) {

                    return $row->jname($row->judge_id);

                })

                ->rawColumns(['action', 'cat', 'subcat', 'judge_name', 'ps'])
                ->make(true);
        }

        return view('cases.index1', compact('products', 'cats', 'subcats', 'judges', 'pss'));




    }

    public function criminal(Request $request)
    {
        $cats = Court::all();
        $products = Cases::where('c_type', '!=', '')->get();
        $subcats = Subcat::all();
        $judges = Judge::all();
        $pss = PS::all();


        if ($request->ajax()) {
            $data = Cases::where('c_type', '!=', '')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                    return $btn;
                })
                ->addColumn('cat', function ($row) {

                    return $row->cname($row->cat);

                })
                ->addColumn('ps', function ($row) {
                    if ($row->ps_id) {
                        return $row->psname($row->ps_id);
                    } else {
                        return "";
                    }

                })
                ->addColumn('subcat', function ($row) {

                    return $row->sname($row->subcat);

                })
                ->addColumn('judge_name', function ($row) {

                    return $row->jname($row->judge_id);

                })

                ->rawColumns(['action', 'cat', 'subcat', 'judge_name', 'ps'])
                ->make(true);
        }

        return view('cases.index2', compact('products', 'cats', 'subcats', 'judges', 'pss'));




    }

    public function civil(Request $request)
    {
        $cats = Court::all();
        $products = Cases::where('jur', '!=', '')->get();
        $subcats = Subcat::all();
        $judges = Judge::all();
        $pss = PS::all();


        if ($request->ajax()) {
            $data = Cases::where('jur', '!=', '')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                    return $btn;
                })
                ->addColumn('cat', function ($row) {

                    return $row->cname($row->cat);

                })
                ->addColumn('ps', function ($row) {
                    if ($row->ps_id) {
                        return $row->psname($row->ps_id);
                    } else {
                        return "";
                    }

                })
                ->addColumn('subcat', function ($row) {

                    return $row->sname($row->subcat);

                })
                ->addColumn('judge_name', function ($row) {

                    return $row->jname($row->judge_id);

                })

                ->rawColumns(['action', 'cat', 'subcat', 'judge_name', 'ps'])
                ->make(true);
        }

        return view('cases.index3', compact('products', 'cats', 'subcats', 'judges', 'pss'));




    }
    public function search(Request $request, $f, $t, $type)
    {

        $cats = Court::all();
        if ($type == "all") {
            $products = Cases::where('i_date', '>=', $f)->where('i_date', '<=', $t)->get();
        }
        if ($type == "civil") {
            $products = Cases::where('i_date', '>=', $f)->where('i_date', '<=', $t)->where('jur', '!=', '')->get();
        }
        if ($type == "criminal") {
            $products = Cases::where('i_date', '>=', $f)->where('i_date', '<=', $t)->where('c_type', '!=', '')->get();
        }

        $subcats = Subcat::all();
        $judges = Judge::all();
        $pss = PS::all();


        if ($request->ajax()) {
            $data = $products;

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                    return $btn;
                })
                ->addColumn('cat', function ($row) {

                    return $row->cname($row->cat);

                })
                ->addColumn('ps', function ($row) {
                    if ($row->ps_id) {
                        return $row->psname($row->ps_id);
                    } else {
                        return "";
                    }

                })
                ->addColumn('subcat', function ($row) {

                    return $row->sname($row->subcat);

                })
                ->addColumn('judge_name', function ($row) {

                    return $row->jname($row->judge_id);

                })

                ->rawColumns(['action', 'cat', 'subcat', 'judge_name', 'ps'])
                ->make(true);
        }

        return view('cases.index3', compact('products', 'cats', 'subcats', 'judges', 'pss'));




    }
    public function search1(Request $request)
    {
        $cats = Court::all();
        $products = Cases::where('jur', '!=', '')->get();
        $subcats = Subcat::all();
        $judges = Judge::all();
        $pss = PS::all();
        return view('cases.search', compact('products', 'cats', 'subcats', 'judges', 'pss', 'request'));

    }
}
