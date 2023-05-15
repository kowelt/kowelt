<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\News;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::withAll()->get();

        return view('admin.news', [
            'news' => $news,
            'nav' => 'news'
        ]);
    }

    public function create()
    {
        return view('admin.news-create', [
            'nav' => 'news',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        $new = News::create($data);

        foreach ($data['avatar'] as $avatar) {
            Picture::where('path', $avatar)->update(['news_id'=> $new->id]);
        }

        if (isset($data['files'])) {
            foreach ($data['files'] as $language => $file) {
                Document::where('path', $file)->update([
                    'news_id'=> $new->id,
                    'language'=> $language,
                ]);
            }
        }

        return redirect(route('admin.news', $request->language));
    }

    public function edit($language, $id)
    {
        $new = News::withAll()->where('id', $id)->first();

        return view('admin.news-edit', [
            'new' => $new,
            'nav' => 'news'
        ]);
    }

    public function update(Request $request, $language, News $new)
    {
        $data = $this->validator($request->all())->validate();
        $new->update($data);

        foreach ($data['avatar'] as $avatar) {
            Picture::where('path', $avatar)->update(['news_id'=> $new->id]);
        }

        if (isset($data['files'])) {
            foreach ($data['files'] as $language => $file) {
                Document::where('path', $file)->update([
                    'news_id'=> $new->id,
                    'language'=> $language,
                ]);
            }
        }

        return redirect(route('admin.news', $language));
    }

    public function delete($language, News $new)
    {
        if (isset($new->picture)) {
            $this->deleteItemPrivate($new->picture, 'avatars');
        }

        if (isset($new->documents[0])) {
            foreach ($new->documents as $document) {
                $this->deleteItemPrivate($document, 'documents');
            }
        }

        $new->delete();

        return redirect(route('admin.news', $language));
    }

    public function deletePicture($language, Picture $picture)
    {
        $this->deleteItemPrivate($picture, 'avatars');

        return redirect()->back();
    }

    public function deleteDocument($language, Document $document)
    {
        $this->deleteItemPrivate($document, 'documents');

        return redirect()->back();
    }

    private function deleteItemPrivate($item, $folder)
    {
        $folder = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $item->folder);

        $file = $folder . DIRECTORY_SEPARATOR . $item->filename;

        if (unlink($file) && rmdir($folder)) {
            $item->delete();
        }
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'avatar' => 'required|array',
            'title_de' => 'required|string|max:256',
            'title_en' => 'nullable|string|max:256',
            'title_fr' => 'nullable|string|max:256',
            'description_de' => 'required|string|max:256',
            'description_en' => 'nullable|string|max:256',
            'description_fr' => 'nullable|string|max:256',
            'files' => 'nullable|array',
            'active' => 'required|boolean',
        ]);
    }
}
