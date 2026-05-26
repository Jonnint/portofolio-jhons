<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\Gallery;
use App\Models\Social;
use App\Models\Guestbook;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio main page.
     */
    public function index()
    {
        $profile = Profile::first();
        
        // Group skills by category
        $skills = Skill::all()->groupBy('category');
        
        $portfolios = Portfolio::orderBy('featured', 'desc')->orderBy('created_at', 'desc')->get();
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        $socials = Social::where('is_active', true)->get();
        $comments = Guestbook::orderBy('created_at', 'desc')->paginate(5);

        return view('home', compact('profile', 'skills', 'portfolios', 'galleries', 'socials', 'comments'));
    }

    /**
     * Handle AJAX contact form submission.
     */
    public function submitContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda berhasil terkirim! Terima kasih telah menghubungi saya.'
        ]);
    }

    /**
     * Handle AJAX guestbook form submission.
     */
    public function submitGuestbook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'c_name' => 'required|string|max:255',
            'c_message' => 'required|string',
            'c_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $photoPath = null;
        if ($request->hasFile('c_photo')) {
            $file = $request->file('c_photo');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $photoPath = 'uploads/' . $fileName;
        }

        Guestbook::create([
            'name' => $request->c_name,
            'message' => $request->c_message,
            'photo' => $photoPath,
            'is_approved' => false, // Default requires moderation
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Komentar berhasil dikirim! Menunggu persetujuan admin.'
        ]);
    }
}
