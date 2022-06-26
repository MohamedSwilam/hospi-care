<?php

namespace App\Http\Controllers\Web;

use App\IndexResponse;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Site;
use App\Models\Testimonial;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Transformers\CategoryTransformer;
use App\Transformers\NewsTransformer;
use App\Transformers\ProductTransformer;
use App\Transformers\SiteTransformer;
use App\Transformers\TestimonialTransformer;

class WebsiteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function home()
    {
        $siteData = fractal(Site::where('slug', 'hospicare')->with(['sliders'])->first(), new SiteTransformer())->toArray()['data'];
        if ($siteData) {
            return view('pages.home', [
                'site' => $siteData,
                'sites' => fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())->toArray()['data'],
                'categories' => fractal(Category::where('site_id', $siteData['id'])->get(), new CategoryTransformer())->toArray()['data'],
                'testimonials' => fractal(Testimonial::where('site_id', $siteData['id'])->get(), new TestimonialTransformer())->toArray()['data'],
                'news' => fractal(News::where('site_id', $siteData['id'])->latest()->take(3)->get(), new NewsTransformer())->toArray()['data'],
            ]);
        } else {
            return view('layouts.error', ['site' => 'hospicare']);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function categories()
    {
        $siteData = fractal(Site::where('slug', 'hospicare')->first(), new SiteTransformer())->toArray()['data'];
        if ($siteData) {
            $categories = fractal(Category::where('site_id', $siteData['id'])->get(), new CategoryTransformer())->toArray()['data'];
            return view('pages.categories', [
                'site' => $siteData,
                'sites' => fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())->toArray()['data'],
                'categories' => $categories,
            ]);
        } else {
            return view('layouts.error', ['site' => 'hospicare']);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function categoryProducts($id)
    {
        $siteData = fractal(Site::where('slug', 'hospicare')->first(), new SiteTransformer())->toArray()['data'];
        if ($siteData) {
            $categories = fractal(Category::where('site_id', $siteData['id'])->get(), new CategoryTransformer())->toArray()['data'];
            $category = fractal(Category::where('id', $id)->first(), new CategoryTransformer())->toArray()['data'];
            $products = fractal(Product::where('category_id', $id)->get(), new ProductTransformer())->toArray()['data'];
            return view('pages.category-products', [
                'site' => $siteData,
                'sites' => fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())->toArray()['data'],
                'category' => $category,
                'categories' => $categories,
                'products' => $products,
            ]);
        } else {
            return view('layouts.error', ['site' => 'hospicare']);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function productDetails($category_id, $product_id)
    {
        $siteData = fractal(Site::where('slug', 'hospicare')->first(), new SiteTransformer())->toArray()['data'];
        if ($siteData) {
            $categories = fractal(Category::where('site_id', $siteData['id'])->get(), new CategoryTransformer())->toArray()['data'];
            $category = fractal(Category::where('id', $category_id)->first(), new CategoryTransformer())->toArray()['data'];
            $product = fractal(Product::where('id', $product_id)->first(), new ProductTransformer())->toArray()['data'];
            $relatedProducts = fractal(Product::where('category_id', $category_id)->where('id', '!=', $product_id)->get(), new ProductTransformer())->toArray()['data'];
            return view('pages.product-details', [
                'site' => $siteData,
                'sites' => fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())->toArray()['data'],
                'categories' => $categories,
                'category' => $category,
                'product' => $product,
                'relatedProducts' => $relatedProducts,
            ]);
        } else {
            return view('layouts.error', ['site' => 'hospicare']);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function news()
    {
        $siteData = fractal(Site::where('slug', 'hospicare')->first(), new SiteTransformer())->toArray()['data'];
        if ($siteData) {
            $categories = fractal(Category::where('site_id', $siteData['id'])->get(), new CategoryTransformer())->toArray()['data'];
            $news = fractal(News::where('site_id', $siteData['id'])->get(), new NewsTransformer())->toArray()['data'];
            return view('pages.blog', [
                'site' => $siteData,
                'sites' => fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())->toArray()['data'],
                'categories' => $categories,
                'news' => $news,
            ]);
        } else {
            return view('layouts.error', ['site' => 'hospicare']);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function newsDetails($id)
    {
        $siteData = fractal(Site::where('slug', 'hospicare')->first(), new SiteTransformer())->toArray()['data'];
        if ($siteData) {
            $categories = fractal(Category::where('site_id', $siteData['id'])->get(), new CategoryTransformer())->toArray()['data'];
            $news = fractal(News::where('id', $id)->first(), new NewsTransformer())->toArray()['data'];
            return view('pages.blog-details', [
                'site' => $siteData,
                'sites' => fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())->toArray()['data'],
                'categories' => $categories,
                'news' => $news,
            ]);
        } else {
            return view('layouts.error', ['site' => 'hospicare']);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function aboutUs()
    {
        $siteData = fractal(Site::where('slug', 'hospicare')->first(), new SiteTransformer())->toArray()['data'];
        if ($siteData) {
            $categories = fractal(Category::where('site_id', $siteData['id'])->get(), new CategoryTransformer())->toArray()['data'];
            return view('pages.about', [
                'site' => $siteData,
                'sites' => fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())->toArray()['data'],
                'categories' => $categories,
            ]);
        } else {
            return view('layouts.error', ['site' => 'hospicare']);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contactUs()
    {
        $siteData = fractal(Site::where('slug', 'hospicare')->first(), new SiteTransformer())->toArray()['data'];
        if ($siteData) {
            $categories = fractal(Category::where('site_id', $siteData['id'])->get(), new CategoryTransformer())->toArray()['data'];
            return view('pages.contact', [
                'site' => $siteData,
                'sites' => fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())->toArray()['data'],
                'categories' => $categories,
            ]);
        } else {
            return view('layouts.error', ['site' => 'hospicare']);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function welcome()
    {
        return view('layouts.welcome', [
            'sites' => fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())->toArray()['data'],
        ]);
    }


}
