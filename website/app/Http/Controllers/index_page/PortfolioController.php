<?php

namespace App\Http\Controllers\index_page;

use App\Http\Controllers\MainController;
use App\Portfolio;
use App\Portfolio_detail;
use App\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolioCategories = PortfolioCategory::all();
        return view('index_page.portfolio.portfolio', compact('portfolioCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $title = $data['title'];
        $imageDescription = $data['imageDescription'];
        $btnTitle = $data['btnTitle'];
        $btnLink = $data['btnLink'];
        $linkedinLink = $data['linkedinLink'];
        $linkedinIcon = $data['linkedinIcon'];
        $GooglePlusLink = $data['GooglePlusLink'];
        $GooglePlusIcon = $data['GooglePlusIcon'];
        $twitterLink = $data['twitterLink'];
        $twitterIcon = $data['twitterIcon'];
        $facebookLink = $data['facebookLink'];
        $facebookIcon = $data['facebookIcon'];
        $detailDescription = $data['detailDescription'];
        $category_id = $data['category_id'];
        $file = $request->file('image');
        $imageAddress = '';
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/', 770, 619);
        }
        $status = 0;
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $portfolio_detail = Portfolio_detail::create([
            'title' => $title,
            'imageDescription' => $imageDescription,
            'btnTitle' => $btnTitle,
            'btnLink' => $btnLink,
            'linkedinLink' => $linkedinLink,
            'linkedinIcon' => $linkedinIcon,
            'GooglePlusLink' => $GooglePlusLink,
            'GooglePlusIcon' => $GooglePlusIcon,
            'twitterLink' => $twitterLink,
            'twitterIcon' => $twitterIcon,
            'facebookLink' => $facebookLink,
            'facebookIcon' => $facebookIcon,
            'detailDescription' => $detailDescription,
            'status' => $status,
            'image' => $imageAddress,
        ]);
        Portfolio::create([
            'status' => $status,
            'category_id' => $category_id,
            'detail_id' => $portfolio_detail->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
