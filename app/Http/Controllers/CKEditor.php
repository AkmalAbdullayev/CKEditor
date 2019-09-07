<?php

namespace App\Http\Controllers;

use App\Image;
use App\Footer;

class CKEditor extends Controller
{
    //
    public function lnk()
    {
        $images = Image::orderBy('order_id', 'asc')->get();

        return view('ckeditor.image', compact('images'));
    }
    public function footer()
    {
        return view('ckeditor.footer');
    }
    public function imgCreate()
    {
        return view('ckeditor.createimage');
    }
    public function imgStore()
    {
        $input = new Image();

        $input->image = request('image');
        $input->title = request('title');

        $input->save();

        $input->order_id = $input->id;

        $input->save();

        return redirect('/');
    }
    public function accessImage()
    {
        $images = Image::all();
        $foot = Footer::all();

        return view('ckeditor.index', compact('images', 'foot'));
    }
    public function createFooterTitle()
    {
        return view('ckeditor.footer');
    }
    public function footStore()
    {
        $foot = new Footer();
        request()->validate([
            'title' => ['required', 'min:5', 'max:100'],
            'footerTitle' => ['required', 'max: 1000']
        ]);
        $foot->title = request('title');
        $foot->text = request('footerTitle');

        $foot->save();
        return redirect('/');
    }
    public function destroyImage($images)
    {
        Image::findOrFail($images)->delete();
        return redirect('/ckeditor/image');
    }
    public function changeTitle($description)
    {
        $images = Image::findOrFail($description);

        return view('ckeditor.edit', compact('images', $images));
    }
    public function update($title)
    {
        $images = Image::findOrFail($title);

        $images->title = request('title');

        $images->save();

        return redirect('/ckeditor/image');
    }
    public function changeContent()
    {
        $content = Footer::all();

        return view('ckeditor.editContent', compact('content', $content));
    }
    public function updateContent($con)
    {
        $content = Footer::findOrFail($con);

        $content->text = request('text');

        $content->save();

        return redirect('/');
    }
    public function alterFooter()
    {
        $editFooter = Footer::all();

        return view('ckeditor.alterFooter', compact('editFooter', $editFooter));
    }
    public function editFooter($foot)
    {
        $footer = Footer::findOrFail($foot);

        return view('ckeditor.editFooter', compact('footer', $footer));
    }
    public function updateFooter($foot)
    {
        $footer = Footer::findOrFail($foot);

        $footer->title = request('title');
        $footer->text = request('textarea');

        $footer->save();

        return redirect('/ckeditor/alterFooter');
    }
    public function destroyFooter($foot)
    {
        Footer::findOrFail($foot)->delete();

        return redirect('/ckeditor/alterFooter');
    }
    public function move($id, $move)
    {
        $firstImage = Image::findOrFail($id);

        if ($move == 1) {
            $secondImage = Image::orderBy('order_id', 'desc')->where('order_id', '<', $firstImage->order_id)->first();
        } else {
            $secondImage = Image::orderBy('order_id', 'asc')->where('order_id', '>', $firstImage->order_id)->first();
        }

        $oldId = $firstImage->order_id;
        $firstImage->order_id = $secondImage->order_id;
        $secondImage->order_id = $oldId;

        if ($firstImage->save() && $secondImage->save())
            return redirect()->route('image');
        else
            dd('false');
    }
}
