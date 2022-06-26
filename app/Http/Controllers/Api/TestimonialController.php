<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\IndexResponse;
use App\Models\File;
use App\Models\Testimonial;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\TestimonialTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Testimonial::class);

        return ResponseFacade::indexRespond(
            fractal((new IndexResponse(Testimonial::query()))->execute(), new TestimonialTransformer())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TestimonialRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(TestimonialRequest $request)
    {
        $this->authorize('store', Testimonial::class);

        $data = $request->validated();

        $photoFile = array();
        $photoFile['file_name'] = download_file($data['photo'], 'storage/testimonials/images');
        $photoFile['url'] = '/storage/testimonials/images/'.$photoFile['file_name'];
        $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
        $savedPhoto = File::create($photoFile);
        $data['photo_id'] = $savedPhoto->id;

        $testimonial = Testimonial::create($data);

        return ResponseFacade::createRespond(
            fractal(Testimonial::where('id', $testimonial->id)->first(), new TestimonialTransformer())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('show', Testimonial::class);
        return ResponseFacade::showRespond(
            fractal(Testimonial::where('id', $id)->first(), new TestimonialTransformer())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TestimonialRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(TestimonialRequest $request, $id)
    {
        $this->authorize('update', Testimonial::class);

        $data = $request->validated();

        if (key_exists('photo', $data)) {
            $photoFile = array();
            $photoFile['file_name'] = download_file($data['photo'], 'storage/testimonials/images');
            $photoFile['url'] = '/storage/testimonials/images/'.$photoFile['file_name'];
            $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
            $savedPhoto = File::create($photoFile);
            $data['photo_id'] = $savedPhoto->id;
        }

        $testimonial = Testimonial::find($id);

        $testimonial->update($data);

        return ResponseFacade::updateRespond(
            fractal(Testimonial::where('id' , $id)->first(), new TestimonialTransformer())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('destroy', Testimonial::class);

        Testimonial::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
