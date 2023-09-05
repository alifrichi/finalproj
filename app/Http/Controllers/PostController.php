<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
// Use the Post Model
use App\Models\Post;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        // ดึงข้อมูลผู้ใช้ที่ล็อกอินอยู่
        $user = Auth::user();

        // ดึงโพสต์ของผู้ใช้นี้โดยใช้ ID
        $posts = Post::where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->view('posts.index', [
            'posts' => $posts,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        // Validate the request data
        $validated = $request->validated();

        // Get genre, category, and user_id from the request
        $genre = $request->input('genre');
        $category = $request->input('category');
        $user_id = auth()->user()->id;

        // Handle the featured image file upload
        if ($request->hasFile('featured_image')) {
            // Store the image in the public storage
            $filePath = $request->file('featured_image')->store('images/books/featured-images', 'public');
            $validated['featured_image'] = $filePath;
        }

        // Create a new Post record with the validated data
        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'featured_image' => $validated['featured_image'],
            'genre' => $genre,
            'category' => $category,
            'user_id' => $user_id,
            'price_per_month' => $validated['price_per_month'], // Add price_per_month
            'price_per_week' => $validated['price_per_week'], // Add price_per_week
        ]);

        if ($post) {
            // Add flash for the success notification
            session()->flash('notif.success', 'Book created successfully!');
            return redirect()->route('posts.index');
        } else {
            // Handle the case where post creation failed
            return abort(500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('posts.show', [
            'post' => Post::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('posts.form', [
            'post' => Post::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            // delete existing image
            Storage::disk('public')->delete($post->featured_image);

            // upload and update the new image
            $filePath = Storage::disk('public')->put('images/books/featured-images', request()->file('featured_image'), 'public');
            $validated['featured_image'] = $filePath;
        }

        // Update the Post with 'user_id'
        $post->update($validated);

        session()->flash('notif.success', 'book updated successfully!');
        return redirect()->route('posts.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);

        Storage::disk('public')->delete($post->featured_image);

        $delete = $post->delete($id);

        if ($delete) {
            session()->flash('notif.success', 'Post deleted successfully!');
            return redirect()->route('posts.index');
        }

        return abort(500);
    }
}
