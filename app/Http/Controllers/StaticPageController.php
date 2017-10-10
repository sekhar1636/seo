<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaticPage;
class StaticPageController extends Controller
{
    protected function index($slug)
    {
        $find_page = StaticPage::where('slug',$slug)->get();
        foreach($find_page as $val)
        {
            $desc = $val['page_description'];
            $title = $val['page_title'];
            $status = $val['status'];
        }

        $active='';
        if($slug=="actor" || $slug=="howitworks" || $slug=="instructions" || $slug=="auditiontypes" || $slug=="criteria" || $slug=="headshot" || $slug=="resumeadvice")
        {
            $active = 'actoractive';
        }
        if($slug=="theater" || $slug=="theaterintro" || $slug=="auditionschedule" || $slug=="theaterregistrationfees" || $slug=="theatercompanies")
        {
            $active = 'theateractive';
        }

        if($slug=="staff")
        {
            $active = 'staffactive';
        }

        if($slug=="aboutstrawhat" || $slug=="kristijaybios")
        {
            $active = 'moreactive';
        }

        return view('staticpage.content')->with([
            'description' => $desc,
            'title' => $title,
            'status' => $status,
            'divactive' => 'active',
            'staticactive' => $active
        ]);
    }

    protected function edit($slug)
    {
        if(\Auth::user()->role=="admin")
        {
            $find_page = StaticPage::where('slug', $slug)->get();
            foreach ($find_page as $val) {
                $desc = $val['page_description'];
                $title = $val['page_title'];
                $status = $val['status'];
                $id = $val['id'];
            }
            return view('staticpage.content_edit')->with([
                'description' => $desc,
                'title' => $title,
                'status' => $status,
                'slug' => $slug,
                'id' => $id
            ]);
        }
        else
        {
            return view('staticpage.content_edit')->with([
                'nonedit' => "nonedit"
            ]);
        }


    }

    protected function update($slug, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'status' => 'required',
        ]);

        $find_slug_page = StaticPage::findorfail($request->id);
        $find_slug_page->page_title = $request->title;
        $find_slug_page->page_description = $request->description;
        $find_slug_page->status = $request->status;
        $find_slug_page->slug = $slug;
        $find_slug_page->save();

        return redirect()->back()->with('success_message', 'Updated Pages Successfully');
    }

}
