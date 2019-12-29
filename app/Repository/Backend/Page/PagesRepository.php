<?php


namespace App\Repository\Backend\Page;


use App\Models\Page\Page;
use Yajra\DataTables\Facades\DataTables;

class PagesRepository implements PagesInterface
{

    /**
     * @var \App\Models\Page\Page
     */
    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        return $this->page->latest()->get();
    }

    /**
     * @param  int  $id
     *
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->page->findOrFail($id);
    }


    /**
     * @param  array  $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->page->create($attributes);
    }


    /**
     * @param  int  $id
     * @param  array  $attributes
     *
     * @return mixed
     */
    public function update(int $id, array $attributes)
    {
        $page = $this->getById($id);
        $page->update($attributes);
        return $page;
    }


    /**
     * @param  int  $id
     *
     * @return mixed|void
     */
    public function delete(int $id)
    {
        $this->getById($id)->delete();
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getForDataTable()
    {
        return Datatables::of($this->getAll())
            ->escapeColumns(['title','slug'])
            ->addColumn('status', function ($page) {
                    return $page->status ? '<span class="badge bg-success">Published</span>' : '<span class="badge bg-warning">Pending</span>';
            })
            ->addColumn('updated_at', function ($page) {
                if ($page->updated_at) {
                    return $page->updated_at->format('j M Y');
                }
            })
            ->addColumn('actions', function ($page) {
                return $page->action_buttons;
            })
            ->make(true);
    }
}
