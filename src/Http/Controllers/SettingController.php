<?php

/**
 * @author   Panji Setya Nur Prawira
 */

namespace PanjiNamjaElf\Kaguya\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingController extends Controller
{
    /**
     * Display the settings view.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('kaguya::index');
    }

    /**
     * Store settings to the storage.
     */
    public function store(Request $request)
    {
        if ($request->has('reset') && $request->input('reset') == true) {
            foreach ($this->default() as $key => $value) {
                setting([$key => $value]);
            }

            return redirect()->back()
                ->withStatus(trans('kaguya::messages.reset'));
        }

        $validator = validator($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        foreach ($validator->validated() as $key => $value) {
            setting([$key => $value]);
        }

        return redirect()->back()
            ->withStatus(trans('kaguya::messages.saved'));
    }

    /**
     * Get field validation rules.
     *
     * @return array
     */
    private function rules(): array
    {
        return collect(config('kaguya.settings'))
            ->pluck('fields')
            ->flatten(1)
            ->pluck('rules', 'name')
            ->reject(function ($rules) {
                return blank($rules);
            })
            ->toArray();
    }

    /**
     * Get default fields value.
     *
     * @return array
     */
    private function default(): array
    {
        return collect(config('kaguya.settings'))
            ->pluck('fields')
            ->flatten(1)
            ->pluck('value', 'name')
            ->toArray();
    }
}
