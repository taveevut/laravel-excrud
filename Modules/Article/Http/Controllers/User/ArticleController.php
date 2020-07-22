<?php

namespace Modules\Article\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Article;
use App\CustomClass\ItopCyberUpload;
use Storage;

class ArticleController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['body'] = [
            'title'     => 'article',
            'name'      => 'article',
            'app_title' => [
                'h1' => 'บทความ',
                'p'  => 'สามารถ เพิ่ม/แก้ไขและลบข้อมูลบทความได้'
            ]
        ];
    }

    private function ctlUpload($file){
        $options = [
            'thumbnail' => [
                'width' => 640,
                'height' => 480,
                'watermark' => "watermark_01"
            ],
            'resize' => [
                'width' => 640,
                'height' => 480,
                'watermark' => "watermark_01"
            ],
            'crop' => [
                'width' => 640,
                'height' => 480,
                'watermark' => "watermark_01"
            ]
        ];
        $result = ItopCyberUpload::upload(public_path('storage/article'), $file, $options);
        
        return $result;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $data = $this->data;
        $data['breadcrumb'] = [
            [
                'label' => 'Dashboard',
                'link'  => route('user.dashboard')
            ],
            [
                'label' => 'บทความ',
                'link'  => ''
            ]
        ];

        $articles = Article::orderBy('id', 'DESC')->paginate(20);

        $data['articles'] = $articles;


        return view('article::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data = $this->data;
        $data['breadcrumb'] = [
            [
                'label' => 'Dashboard',
                'link'  => route('user.dashboard')
            ],
            [
                'label' => 'บทความ',
                'link'  => route('user.article.index')
            ],
            [
                'label' => 'เพิ่มข้อมูล',
                'link'  => ''
            ]
        ];

        return view('article::create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $article->slug = site_string_url($request->input('title'));
        $article->target = $request->input('target');
        $article->date = $request->input('date');
        $article->author = $request->input('author');
        $article->details = $request->input('details');
        if ($request->hasFile('cover')) {
            $article->cover = $this->ctlUpload($_FILES['cover']);
        }
        $article->save();

        return back()->with('message', 'บันทึกข้อมูลได้สำเร็จ');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        $data = $this->data;
        $data['breadcrumb'] = [
            [
                'label' => 'Dashboard',
                'link'  => route('user.dashboard')
            ],
            [
                'label' => 'บทความ',
                'link'  => route('user.article.index')
            ],
            [
                'label' => 'แก้ไขข้อมูล',
                'link'  => ''
            ]
        ];
        $article = Article::where("slug", $slug)->firstOrFail();
        $data['article'] = $article;

        return view('article::show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->data;
        $data['breadcrumb'] = [
            [
                'label' => 'Dashboard',
                'link'  => route('user.dashboard')
            ],
            [
                'label' => 'บทความ',
                'link'  => route('user.article.index')
            ],
            [
                'label' => 'แก้ไขข้อมูล',
                'link'  => ''
            ]
        ];

        $data['article'] = Article::findOrFail($id);

        return view('article::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->url = $request->input('url');
        $article->target = $request->input('target');
        $article->date = $request->input('date');
        $article->author = $request->input('author');
        $article->details = $request->input('details');
        if ($request->hasFile('cover')) {
            $this->storageDelete($article->cover);
            $article->cover = $this->ctlUpload($_FILES['cover']);
        }
        $article->save();

        return redirect()->back()->with('message', 'แก้ไขข้อมูลได้สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $this->storageDelete($article->cover);
        $article->delete();

        return redirect()->back();
    }

    private function storageDelete($file)
    {
        Storage::delete("public/article/$file");
        Storage::delete("public/article/crop/$file");
        Storage::delete("public/article/resize/$file");
    }
}
