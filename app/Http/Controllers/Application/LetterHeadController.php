<?php

namespace App\Http\Controllers\Application;

use App\Models\LetterHead;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;



class LetterHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Query LetterHeads by Company and Tab
        $query = LetterHead::findByCompany($currentCompany->id)->orderBy('letter_head_number');
//        if($request->tab == 'all') {
//            $query = LetterHead::findByCompany($currentCompany->id)->orderBy('invoice_number');
//            $tab = 'all';
//        } else if($request->tab == 'due') {
//            $query = LetterHead::findByCompany($currentCompany->id)->active()->orderBy('due_date');
//            $tab = 'due';
//        } else {
//            $query = LetterHead::findByCompany($currentCompany->id)->drafts()->orderBy('invoice_number');
//            $tab = 'drafts';
//        }

        // Apply Filters and Paginate
        $letter_heads = QueryBuilder::for($query)
            ->allowedFilters([
                AllowedFilter::partial('letter_head_number'),
                AllowedFilter::scope('from'),
                AllowedFilter::scope('to'),
            ])
            ->paginate()
            ->appends(request()->query());

        return view('application.letter_head.index', [
            'letter_heads' => $letter_heads,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Get next LetterHead number if the auto generation option is enabled
//        $letter_head_prefix = $currentCompany->getSetting('invoice_prefix');
//        $next_letter_head_number = LetterHead::getNextLetterHeadNumber($currentCompany->id, $letter_head_prefix);


        // Create new number model and set letter_head_number and company_id
        // so that we can use them in the form
//        $letter_head = new LetterHead();
//        $letter_head->letter_head_number = $next_letter_head_number;
//        $letter_head->company_id = $currentCompany->id;

        // Also for filling form data and the ui
//        $customers = $currentCompany->customers;
//        $products = $currentCompany->products;
//        $tax_per_item = (boolean) $currentCompany->getSetting('tax_per_item');
//        $discount_per_item = (boolean) $currentCompany->getSetting('discount_per_item');
        return view('application.letter_head.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();
        $letter_head_prefix = $currentCompany->getSetting('Letter_head_prefix');
        $next_invoice_number = LetterHead::getNextLetterHeadNumber($currentCompany->id, $letter_head_prefix);

        dd($next_invoice_number);
        $insert = new LetterHead();
        $insert->uid = Str::random(10);
        $insert->customer_id = auth()->id();
        $insert->company_id = $currentCompany->id;
        $insert->status = LetterHead::STATUS_DRAFT;
        $insert->letter_head_number = $next_invoice_number;
//        $insert->letter_head_date = Date('Y-m-d');
//        $insert->letter_head_date = Date('Y-m-d');

        //upload header image
        if ($request->header_image) {
            $request->validate(['header_image' => 'required|image|mimes:png,jpg,jpeg,JPEG,JPG|max:2048']);
            $header_image_path = 'header_image-'. $user->id .'.'.$request->header_image->getClientOriginalExtension();
            $path = $request->header_image->storeAs('header_images', $header_image_path , 'public_dir');
//            $user->setSetting('header_image', '/uploads/'.$path);
        }
        //upload footer image
        if ($request->footer_image) {
            $request->validate(['footer_image' => 'required|image|mimes:png,jpg,jpeg,JPEG,JPG|max:2048']);
            $footer_image_path = 'footer_image-'. $user->id .'.'.$request->footer_image->getClientOriginalExtension();
            $path = $request->footer_image->storeAs('footer_images', $footer_image_path , 'public_dir');
//            $user->setSetting('footer_image', '/uploads/'.$path);
        }
        $insert->header_image = 'uploads/header_images/'.$header_image_path;
        $insert->footer_image = 'uploads/footer_images/'.$footer_image_path;
        $insert->text = $request->text;
        $insert->save();
        return redirect()->to(route('letter-head',$currentCompany->uid));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $letter_head = LetterHead::where('uid' , $request->letter_head)->firstOrFail();
//        dd($letter_head);
        return view('application.letter_head.details', [
            'letter_head' => $letter_head,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Query LetterHeads by Company and Tab
        $query = LetterHead::findOrFail($request->letter_head);
//        $query = LetterHead::findByCompany($currentCompany->id)->orderBy('letter_head_number');
//        if($request->tab == 'all') {
//            $query = LetterHead::findByCompany($currentCompany->id)->orderBy('invoice_number');
//            $tab = 'all';
//        } else if($request->tab == 'due') {
//            $query = LetterHead::findByCompany($currentCompany->id)->active()->orderBy('due_date');
//            $tab = 'due';
//        } else {
//            $query = LetterHead::findByCompany($currentCompany->id)->drafts()->orderBy('invoice_number');
//            $tab = 'drafts';
//        }
        return view('application.letter_head.edit', [
            'letter_head' => $query,
        ]);
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
        //
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
