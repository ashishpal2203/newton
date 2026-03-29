<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogFrontendController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('category')->where('status', true)->latest('published_at');

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('tags', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->paginate(12);

        return view('pages.blog', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::with('category')->where('slug', $slug)->where('status', true)->firstOrFail();
        
        $relatedBlogs = Blog::where('blog_category_id', $blog->blog_category_id)
            ->where('id', '!=', $blog->id)
            ->where('status', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.create-education-blog', compact('blog', 'relatedBlogs'));
    }
}
