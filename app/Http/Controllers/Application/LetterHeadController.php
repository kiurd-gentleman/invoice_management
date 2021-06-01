<?php

namespace App\Http\Controllers\Application;

use App\Models\LetterHead;
use Illuminate\Http\Request;
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
        $query = LetterHead::findByCompany($currentCompany->id)->orderBy('invoice_number');
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
            'invoices' => $letter_heads,
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
        $letter_head_prefix = $currentCompany->getSetting('invoice_prefix');
        $next_letter_head_number = LetterHead::getNextLetterHeadNumber($currentCompany->id, $letter_head_prefix);


        // Create new number model and set letter_head_number and company_id
        // so that we can use them in the form
        $letter_head = new LetterHead();
        $letter_head->letter_head_number = $next_letter_head_number;
        $letter_head->company_id = $currentCompany->id;

        // Also for filling form data and the ui
        $customers = $currentCompany->customers;
//        $products = $currentCompany->products;
//        $tax_per_item = (boolean) $currentCompany->getSetting('tax_per_item');
//        $discount_per_item = (boolean) $currentCompany->getSetting('discount_per_item');
        return view('application.letter_head.create', [
            'letter_head' => $letter_head,
            'customers' => $customers,
//            'products' => $products,
//            'tax_per_item' => $tax_per_item,
//            'discount_per_item' => $discount_per_item,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
