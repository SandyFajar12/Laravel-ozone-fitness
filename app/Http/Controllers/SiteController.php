<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Facility;
use App\Models\GymClass;
use App\Models\HeroSlide;
use App\Models\ServiceBenefit;
use App\Models\ServicePlan;
use App\Models\SiteSetting;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Fluent;

class SiteController extends Controller
{
    private function settings(): Fluent
    {
        return new Fluent(SiteSetting::allAsArray());
    }

    public function about()
    {
        return view('pages.about', [
            's'        => $this->settings(),
            'slides'   => HeroSlide::where('aktif', true)->orderBy('urutan')->get(),
            'benefits' => Benefit::where('aktif', true)->orderBy('urutan')->get(),
            'trainers' => Trainer::where('aktif', true)->orderBy('urutan')->get(),
        ]);
    }

    public function facilities()
    {
        return view('pages.facilities', [
            's'          => $this->settings(),
            'facilities' => Facility::where('aktif', true)->orderBy('urutan')->get(),
            'classes'    => GymClass::where('aktif', true)->orderBy('urutan')->get(),
        ]);
    }

    public function services()
    {
        return view('pages.services', [
            's'        => $this->settings(),
            'benefits' => ServiceBenefit::where('aktif', true)->orderBy('urutan')->get()->groupBy('type'),
            'plans'    => ServicePlan::where('aktif', true)->orderBy('urutan')->get()->groupBy('type'),
        ]);
    }

    public function blog(Request $request)
    {
        $categories = BlogCategory::orderBy('urutan')->get();
        $active = $categories->firstWhere('slug', $request->query('kategori'));

        $posts = BlogPost::with('category')
            ->where('is_published', true)
            ->when($active, fn ($q) => $q->where('blog_category_id', $active->id))
            ->orderByDesc('published_at')
            ->get();

        return view('pages.blog', [
            's'          => $this->settings(),
            'categories' => $categories,
            'active'     => $active,
            'posts'      => $posts,
        ]);
    }

    public function article(string $slug)
    {
        $post = BlogPost::with('category')
            ->where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.article', [
            's'    => $this->settings(),
            'post' => $post,
        ]);
    }

    public function contact()
    {
        return view('pages.contact', ['s' => $this->settings()]);
    }

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:50'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ], [
            'required' => ':attribute wajib diisi.',
            'email'    => 'Format :attribute tidak valid.',
            'max'      => ':attribute terlalu panjang.',
        ], [
            'name'    => 'Nama',
            'email'   => 'Email',
            'phone'   => 'Nomor telepon',
            'subject' => 'Subjek',
            'message' => 'Pesan',
        ]);

        $back = route('contact') . '#form-kirim';

        if ($validator->fails()) {
            return redirect($back)->withErrors($validator)->withInput();
        }

        // Kolom tersembunyi "website": manusia tidak mengisinya, bot biasanya mengisi
        if ($request->filled('website')) {
            return redirect($back)->with('sent', true);
        }

        ContactMessage::create($validator->validated());

        return redirect($back)->with('sent', true);
    }
}