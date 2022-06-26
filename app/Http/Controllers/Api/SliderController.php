<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\IndexResponse;
use App\Models\File;
use App\Models\Slider;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\SliderTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Slider::class);

        return ResponseFacade::indexRespond(
            fractal((new IndexResponse(Slider::query()))->execute(), new SliderTransformer())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SliderRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(SliderRequest $request)
    {
        $this->authorize('store', Slider::class);

        $data = $request->validated();

        $photoFile = array();
        $photoFile['file_name'] = download_file($data['photo'], 'storage/sliders/images');
        $photoFile['url'] = '/storage/sliders/images/'.$photoFile['file_name'];
        $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
        $savedPhoto = File::create($photoFile);
        $data['photo_id'] = $savedPhoto->id;

        $slider = Slider::create($data);

        return ResponseFacade::createRespond(
            fractal(Slider::where('id', $slider->id)->first(), new SliderTransformer())
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
        $this->authorize('show', Slider::class);
        return ResponseFacade::showRespond(
            fractal(Slider::where('id', $id)->first(), new SliderTransformer())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SliderRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(SliderRequest $request, $id)
    {
        $this->authorize('update', Slider::class);

        $data = $request->validated();

        if (key_exists('photo', $data)) {
            $photoFile = array();
            $photoFile['file_name'] = download_file($data['photo'], 'storage/sliders/images');
            $photoFile['url'] = '/storage/sliders/images/'.$photoFile['file_name'];
            $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
            $savedPhoto = File::create($photoFile);
            $data['photo_id'] = $savedPhoto->id;
        }

        $slider = Slider::find($id);

        $slider->update($data);

        return ResponseFacade::updateRespond(
            fractal(Slider::where('id' , $id)->first(), new SliderTransformer())
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
        $this->authorize('destroy', Slider::class);

        Slider::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
