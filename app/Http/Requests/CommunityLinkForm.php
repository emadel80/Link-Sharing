<?php

namespace App\Http\Requests;

use App\Models\CommunityLink;
use Illuminate\Support\Facades\Auth;

class CommunityLinkForm extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required',
            'url'         => 'required|active_url'
        ];
    }

    /**
     * Persist the community link submission form.
     */
    public function persist()
    {
        CommunityLink::from(Auth::user())->contribute($this->all());
    }
}
