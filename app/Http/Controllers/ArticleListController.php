<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleListRequest;
use App\Http\Requests\UpdateArticleListRequest;
use App\Models\ArticleList;

class ArticleListController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleList  $articleList
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleList $articleList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleList  $articleList
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleList $articleList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleListRequest  $request
     * @param  \App\Models\ArticleList  $articleList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleListRequest $request, ArticleList $articleList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleList  $articleList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleList $articleList)
    {
        //
    }
}
