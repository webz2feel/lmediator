<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\CreatePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page\Page;
use App\Repository\Backend\Page\PagesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{

    /**
     * @var \App\Repository\Backend\Page\PagesInterface
     */
    private $pageRepository;

    public function __construct(PagesInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @return mixed
     */
    public function getDataTable()
    {
        return $this->pageRepository->getForDataTable();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page();
        return view('backend.pages.create')
            ->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Page\CreatePageRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePageRequest $request)
    {
        $pageData = [
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'contents' => $request->body,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'crawlable' => 0,
        ];
        if($request->has('crawlable')){
            $pageData['crawlable'] = 1;
        }
        $this->pageRepository->create($pageData);
//        event(new NewCustomerHasRegisteredEvent($customer));
        return redirect()->route('admin.page.index')->with('success', 'Page created successfully');
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
        $page = $this->pageRepository->getById($id);
        return view('backend.pages.edit')
            ->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Page\UpdatePageRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $pageData = [
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'contents' => $request->body,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'crawlable' => 0,
        ];
        if($request->has('crawlable')){
            $pageData['crawlable'] = 1;
        }
        $this->pageRepository->update($id, $pageData);
//        event(new NewCustomerHasRegisteredEvent($customer));
        return redirect()->route('admin.page.index')->with('success', 'Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->pageRepository->delete($id);
        return redirect()->route('admin.page.index')->with('success', 'Page deleted successfully');
    }
}
